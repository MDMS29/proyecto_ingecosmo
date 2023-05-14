<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class MoviEncModel extends Model
{

    protected $table = 'movimiento_enc'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_movimientoenc';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_tercero', 'id_vehiculo', 'id_trabajador', 'fecha_movimiento', 'tipo_movimiento', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function historialVehiculos()
    {
        $this->select('*');
        $this->where('tipo_movimiento', '57');
        $this->orWhere('tipo_movimiento', '58');
        $this->orWhere('tipo_movimiento', '59');
        $data = $this->findAll();
        return $data;
    }
}
