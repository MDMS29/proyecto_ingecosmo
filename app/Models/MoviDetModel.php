<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class MoviDetModel extends Model
{

   protected $table = 'movimiento_det'; /* nombre de la tabla modelada/*/
   protected $primaryKey = 'id_movimientodet';

   protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

   protected $returnType = 'array'; /* forma en que se retornan los datos */
   protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

   protected $allowedFields = ['id_movimientoenc', 'id_material', 'item', 'cantidad', 'costo', 'observacion', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

   protected $useTimestamps = true; /*tipo de tiempo a utilizar */
   protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
   protected $updatedField = ''; /*fecha automatica para la edicion */
   protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

   protected $validationRules = [];
   protected $validationMessages = [];
   protected $skipValidation = false;

   public function buscarDetallesOrden($id)
   {
      $this->select("*");
      $this->where('id_movimientoenc', $id);
      $data = $this->findAll();
      return $data;
   }
   public function buscarDetalles($id)
   {
      $this->select("*");
      $this->where('id_movimientodet', $id);
      $data = $this->first();
      return $data;
   }
}
