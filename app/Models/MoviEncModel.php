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

    protected $allowedFields = ['id_tercero', 'id_vehiculo', 'id_trabajador', 'fecha_movimiento', 'tipo_movimiento', 'estado', 'fecha_crea', 'usuario_crea', 'id_material']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function historialVehiculos()
    {
        $this->select("id_movimientoenc, terceros.id_tercero, terceros.razon_social, fecha_movimiento, concat(terceros.nombre_p , ' ' , terceros.nombre_s , ' ' , terceros.apellido_p , ' ' , terceros.apellido_s) as cliente, terceros.tipo_tercero, vw_param_det2.nombre as nom_tipo_terce,  ordenes_servicio.id_vehiculo, vehiculos.placa, param_detalle.nombre as tipo_movimiento, movimiento_enc.tipo_movimiento as id_tipo_mov, vw_param_det.nombre as estado, ordenes_servicio.n_orden, concat(ordenes_servicio.nombres, ' ', ordenes_servicio.apellidos) as nombreAliado");
        $this->join('terceros', 'terceros.id_tercero = movimiento_enc.id_tercero');
        $this->join('ordenes_servicio', 'ordenes_servicio.id_orden = movimiento_enc.id_vehiculo', 'left');
        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_vehiculo', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = movimiento_enc.tipo_movimiento', 'left');
        $this->join('vw_param_det', 'vw_param_det.id_param_det = movimiento_enc.estado', 'left');
        $this->join('vw_param_det2', 'vw_param_det2.id_param_det = terceros.tipo_tercero', 'left');
        $this->where('movimiento_enc.tipo_movimiento', '57');
        $this->orWhere('movimiento_enc.tipo_movimiento', '58');
        $this->orWhere('movimiento_enc.tipo_movimiento', '59');
        // $this->orderBy('id_movimientoenc', ' desc'); 
        $this->groupBy('id_movimientoenc');
        $data = $this->findAll();
        return $data;
    }


    public function historialMateriales()
    {
        $this->select("movimiento_enc.id_movimientoenc, concat(trabajadores.nombre_p , ' ' , trabajadores.nombre_s , ' ' , trabajadores.apellido_p , ' ' , trabajadores.apellido_s) as nombreTrabajador, materiales.nombre as nombreMate , materiales.precio_compra as subtotal, movimiento_enc.fecha_movimiento, movimiento_det.cantidad, param_detalle.nombre as tipo_movimiento,ordenes_servicio.n_orden as nombreOrden");
        $this->join('param_detalle', 'param_detalle.id_param_det = movimiento_enc.tipo_movimiento');
        $this->join('movimiento_det', 'movimiento_det.id_movimientoenc = movimiento_enc.id_movimientoenc', 'left');
        $this->join('materiales', 'materiales.id_material = movimiento_det.id_material', 'left');
        $this->join('ordenes_servicio', 'ordenes_servicio.id_orden = movimiento_enc.id_vehiculo', 'left');
        $this->join('trabajadores', 'trabajadores.id_trabajador = movimiento_enc.id_trabajador', 'left');
        $this->where('movimiento_enc.tipo_movimiento', '11');
        $this->orWhere('movimiento_enc.tipo_movimiento', '12');
        $this->orWhere('movimiento_enc.tipo_movimiento', '67');
        $this->groupBy('movimiento_enc.id_movimientoenc');
        $this->orderBy('movimiento_enc.fecha_crea', 'desc');
        $data = $this->findAll();
        return $data;
    }

    public function ordenesEntrega()
    {
        $this->select("movimiento_enc.id_movimientoenc, concat(trabajadores.nombre_p , ' ' , trabajadores.nombre_s , ' ' , trabajadores.apellido_p , ' ' , trabajadores.apellido_s) as nombreTrabajador, materiales.nombre as nombreMate , materiales.precio_compra as subtotal, movimiento_enc.fecha_movimiento, movimiento_det.cantidad, param_detalle.nombre as tipo_movimiento,ordenes_servicio.n_orden as nombreOrden, vehiculos.placa");
        $this->join('param_detalle', 'param_detalle.id_param_det = movimiento_enc.tipo_movimiento');
        $this->join('movimiento_det', 'movimiento_det.id_movimientoenc = movimiento_enc.id_movimientoenc');
        $this->join('materiales', 'materiales.id_material = movimiento_det.id_material');
        $this->join('ordenes_servicio', 'ordenes_servicio.id_orden = movimiento_enc.id_vehiculo', 'left');
        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_vehiculo', 'left');
        $this->join('trabajadores', 'trabajadores.id_trabajador = movimiento_enc.id_trabajador', 'left');
        $this->where('movimiento_enc.tipo_movimiento', '68');
        $this->orderBy('movimiento_enc.id_movimientoenc', 'desc');
        $this->groupBy('movimiento_enc.id_vehiculo');
        // $this->where('movimiento_enc.id_movimientoenc', $id);
        $data = $this->findAll();
        return $data;
    }

    public function buscarOrden($id)
    {
        $this->select("trabajadores.id_trabajador, ordenes_servicio.id_orden");

        $this->join('ordenes_servicio', 'ordenes_servicio.id_orden = movimiento_enc.id_vehiculo', 'left');
        $this->join('trabajadores', 'trabajadores.id_trabajador = movimiento_enc.id_trabajador', 'left');
;
        $this->where('movimiento_enc.id_movimientoenc', $id);
        $data = $this->first();
        return $data;
    }

    public function buscarDetEnc($id)
    {
        $this->select('materiales.nombre, movimiento_det.cantidad, materiales.precio_venta, movimiento_enc.fecha_movimiento');
        $this->join('movimiento_det', 'movimiento_det.id_movimientoenc = movimiento_enc.id_movimientoenc', 'left');
        $this->join('materiales', 'materiales.id_material = movimiento_det.id_material', 'left');
        $this->where('movimiento_enc.tipo_movimiento', '68');
        $this->where('movimiento_enc.id_vehiculo', $id);
        // $this->groupBy('movimiento_enc.id_movimientoenc');
        $data = $this->findAll();
        return $data;
    }
    public function buscarTrabajEnc($id)
    {
        $this->select('concat(trabajadores.nombre_p," ", trabajadores.nombre_s, " ", trabajadores.apellido_p, " ", trabajadores.apellido_s) as nombre_trabajador,  SUM(movimiento_det.cantidad*materiales.precio_venta) as suma, movimiento_det.cantidad, materiales.precio_venta, movimiento_enc.fecha_movimiento');
        $this->join('movimiento_det', 'movimiento_det.id_movimientoenc = movimiento_enc.id_movimientoenc', 'left');
        $this->join('materiales', 'materiales.id_material = movimiento_det.id_material', 'left');
        $this->join('trabajadores', 'trabajadores.id_trabajador = movimiento_enc.id_trabajador', 'left');
        $this->where('movimiento_enc.tipo_movimiento', '68');
        $this->where('movimiento_enc.id_vehiculo', $id);
        $this->groupBy('movimiento_enc.id_trabajador');
        $data = $this->findAll();
        return $data;
    }



    public function traerDetalles()
    {
        $this->select('movimiento_enc.* ,ordenes_servicio.n_orden as orden');
        $this->join('ordenes_servicio', 'ordenes_servicio.id_vehiculo = movimiento_enc.id_vehiculo');
        $datos = $this->first();
        return $datos;
    }
}
