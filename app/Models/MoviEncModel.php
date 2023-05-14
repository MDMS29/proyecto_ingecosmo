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
        $this->select("id_movimientoenc, terceros.id_tercero, terceros.razon_social,  concat(terceros.nombre_p , ' ' , terceros.nombre_s , ' ' , terceros.apellido_p , ' ' , terceros.apellido_s) as cliente, terceros.tipo_tercero, vw_param_det2.nombre as nom_tipo_terce,  vehiculos.id_vehiculo, vehiculos.placa, param_detalle.nombre as tipo_movimiento, movimiento_enc.tipo_movimiento as id_tipo_mov, vw_param_det.nombre as estado");
        $this->join('terceros', 'terceros.id_tercero = movimiento_enc.id_tercero');
        $this->join('vehiculos', 'vehiculos.id_vehiculo = movimiento_enc.id_vehiculo');
        $this->join('param_detalle', 'param_detalle.id_param_det = movimiento_enc.tipo_movimiento');
        $this->join('vw_param_det', 'vw_param_det.id_param_det = movimiento_enc.estado');
        $this->join('vw_param_det2', 'vw_param_det2.id_param_det = terceros.tipo_tercero');
        $this->where('movimiento_enc.tipo_movimiento', '57');
        $this->orWhere('movimiento_enc.tipo_movimiento', '58');
        $this->orWhere('movimiento_enc.tipo_movimiento', '59');
        $data = $this->findAll();
        return $data;
    }
}
