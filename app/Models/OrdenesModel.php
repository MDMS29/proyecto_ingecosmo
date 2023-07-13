<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class OrdenesModel extends Model
{

    protected $table = 'ordenes_servicio'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_orden';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['n_orden', 'id_vehiculo', 'kms', 'n_combustible', 'nombres', 'apellidos', 'n_identificacion', 'llaves', 'documentos', 'grua', 'estado', 'fecha_entrada', 'fecha_salida', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerOrdenes()
    {
        $this->select("id_orden, n_orden, vehiculos.placa, vehiculos.modelo, tipo_marca.nombre as marca, vehiculos.color, ordenes_servicio.kms, vw_param_det2.nombre as combustible, fecha_entrada, fecha_salida, vw_param_det.nombre as proceso, terceros.nombre_p, terceros.nombre_s,terceros.apellido_p,terceros.apellido_s, concat(terceros.nombre_p,' ', terceros.nombre_s, ' ', terceros.apellido_p, ' ', terceros.apellido_s) as cliente, terceros.tipo_tercero, terceros.razon_social, concat(ordenes_servicio.nombres, ' ', ordenes_servicio.apellidos) as nombreAliado, terceros.id_tercero");
        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_vehiculo', 'left');
        $this->join('tipo_marca', 'tipo_marca.id_marca = vehiculos.id_marca', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('terceros', 'terceros.id_tercero = propietarios.id_tercero', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = propietarios.tipo_propietario', 'left');
        $this->join('vw_param_det', 'vw_param_det.id_param_det = ordenes_servicio.estado', 'left');
        $this->join('vw_param_det2', 'vw_param_det2.id_param_det = ordenes_servicio.n_combustible', 'left');
        $data = $this->findAll();
        return $data;
    }
    public function buscarOrden($nOrden, $placa, $id)
    {
        $this->select("ordenes_servicio.id_orden, n_orden, vehiculos.id_vehiculo,vehiculos.placa, vehiculos.modelo, tipo_marca.id_marca, tipo_marca.nombre as marca, marca_vehiculo.nombre as nombreMarca, vehiculos.color, ordenes_servicio.kms, ordenes_servicio.n_combustible as combustible, fecha_entrada, fecha_salida, ordenes_servicio.estado as proceso, concat(terceros.nombre_p,' ', terceros.nombre_s, ' ', terceros.apellido_p, ' ', terceros.apellido_s) as nomCliente, terceros.razon_social, terceros.n_identificacion as idenCliente, terceros.direccion, propietarios.tipo_propietario, propietarios.id_tercero as cliente, ordenes_servicio.nombres as nomRespon, ordenes_servicio.apellidos as apeRespon, ordenes_servicio.n_identificacion, concat(ordenes_servicio.nombres, ' ', ordenes_servicio.apellidos) as nomAliado, ordenes_servicio.fecha_entrada, ordenes_servicio.fecha_salida");

        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_vehiculo', 'left');
        $this->join('tipo_marca', 'tipo_marca.id_marca = vehiculos.id_marca', 'left');
        $this->join('marca_vehiculo', 'marca_vehiculo.id_marca = tipo_marca.marca', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('terceros', 'terceros.id_tercero = propietarios.id_tercero', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = propietarios.tipo_propietario', 'left');

        if ($nOrden != '') {
            $this->where('n_orden', $nOrden);
        } else if ($placa != '') {
            $this->where('placa', $placa);
        } else if ($id != 0) {
            $this->where('ordenes_servicio.id_orden', $id);
        }
        $data = $this->first();
        return $data;
    }

    public function obtenerUltimaOrden()
    {
        $this->select('n_orden, vehiculos.placa');
        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_vehiculo', 'left');
        $this->orderBy('n_orden', 'desc');
        $this->limit(1);
        $data = $this->first();
        return $data;
    }

    public function ordenesInsumos()
    {
        $this->select("id_trabajador, concat(nombre_p,' ',nombre_s,' ',apellido_p,' ',apellido_s) as nombre");
        $this->where("estado", "A");
        $data = $this->findAll();
        return $data;
    }
    public function contadorOrdenes($id)
    {
        $this->select('count(id_orden) as n_ordenes, vehiculos.placa');
        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_vehiculo', 'left');
        if ($id != 0) {
            $this->where('ordenes_servicio.estado', $id);
        }
        $data = $this->first();
        return $data;
    }
}
