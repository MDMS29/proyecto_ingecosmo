<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class MarcasModel extends Model
{
    protected $table = 'tipo_marca'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_marca';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['nombre', 'marca', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerMarcas($estado)
    {
        $this->select('tipo_marca.id_marca, tipo_marca.nombre, tipo_marca.marca, marca_vehiculo.nombre as nomMarca');
        $this->join("marca_vehiculo", "marca_vehiculo.id_marca = tipo_marca.marca");
        $this->where('tipo_marca.estado', $estado);
        $data = $this->findAll();
        return $data;
    }
}
