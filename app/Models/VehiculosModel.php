<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class VehiculosModel extends Model
{

    protected $table = 'vehiculos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_vehiculo';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['n_orden', 'id_marca', 'placa', 'modelo', 'color', 'kms', 'n_combustible', 'estado', 'fecha_entrada', 'fecha_salida','fecha_crea','usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerVehiculos()
    {
        $this->select("vehiculos.id_vehiculo, n_orden, vehiculos.id_marca, marca_vehiculo.nombre as marca, placa,  modelo, color, kms, param_detalle.nombre as combustible, vw_param_det.nombre as estado, vehiculos.fecha_entrada, vehiculos.fecha_salida, terceros.id_tercero, terceros.razon_social, concat(terceros.nombre_p , ' ' , terceros.nombre_s , ' ' , terceros.apellido_p , ' ' , terceros.apellido_s) as cliente, terceros.tipo_tercero");
        $this->join('param_detalle', 'param_detalle.id_param_det = vehiculos.n_combustible', 'left');
        $this->join('vw_param_det', 'vw_param_det.id_param_det = vehiculos.estado', 'left');
        $this->join('marca_vehiculo', 'marca_vehiculo.id_marca = vehiculos.id_marca', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('terceros', 'terceros.id_tercero = propietarios.id_tercero', 'left');
        $data = $this->findAll();
        return $data;
    }
    public function buscarVehiculo($orden, $placa, $id)
    {
        $this->select("vehiculos.id_vehiculo as id, n_orden, propietarios.id_tercero as cliente, placa, id_marca, modelo, color, kms, param_detalle.id_param_det as combustible, vw_param_det.id_param_det as estado, fecha_entrada, vehiculos.fecha_salida, propietarios.tipo_propietario");
        $this->join('param_detalle', 'param_detalle.id_param_det = vehiculos.n_combustible', 'left');
        $this->join('vw_param_det', 'vw_param_det.id_param_det = vehiculos.estado', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');

        if ($orden != '') {
            $this->where('n_orden', $orden);
        } else if ($placa != '') {
            $this->where('placa', $placa);
        } else if ($id != 0) {
            $this->where('vehiculos.id_vehiculo', $id);
        }
        $data = $this->first();
        return $data;
    }
}
