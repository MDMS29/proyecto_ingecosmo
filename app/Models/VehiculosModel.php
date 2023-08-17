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

    protected $allowedFields = ['id_marca', 'placa', 'modelo', 'color', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerVehiculos()
    {
        $this->select("vehiculos.id_vehiculo, vehiculos.id_marca, marca_vehiculo.nombre as marca, tipo_marca.nombre as tipo, placa,  modelo, color,  terceros.id_tercero, terceros.razon_social, concat(terceros.nombre_p , ' ' , terceros.nombre_s , ' ' , terceros.apellido_p , ' ' , terceros.apellido_s) as cliente, terceros.tipo_tercero, terceros.estado as estadoTercer, vw_param_det2.nombre as tipo_propietario");
        $this->join('tipo_marca', 'tipo_marca.id_marca = vehiculos.id_marca', 'left');
        $this->join('marca_vehiculo', 'marca_vehiculo.id_marca = tipo_marca.marca', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('terceros', 'terceros.id_tercero = propietarios.id_tercero', 'left');
        $this->join('vw_param_det2', 'vw_param_det2.id_param_det = propietarios.tipo_propietario', 'left');
        $data = $this->findAll();
        return $data;
    }
    public function buscarVehiculo($orden, $placa, $id)
    {
        $this->select("vehiculos.id_vehiculo as id, propietarios.id_tercero as cliente, placa, vehiculos.id_marca, tipo_marca.nombre as marca, modelo, color, propietarios.tipo_propietario, concat(terceros.nombre_p , ' ' , terceros.nombre_s , ' ' , terceros.apellido_p , ' ' , terceros.apellido_s) as nomCliente, terceros.tipo_tercero, terceros.razon_social, terceros.n_identificacion as identificacion, terceros.direccion");
        $this->join('tipo_marca', 'tipo_marca.id_marca = vehiculos.id_marca', 'left');

        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('terceros', 'terceros.id_tercero = propietarios.id_tercero', 'left');

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
    public function obtenerUltimaOrden()
    {
        $this->select('n_orden');
        $this->orderBy('n_orden', 'desc');
        $this->limit(1);
        $data = $this->first();
        return $data;
    }

    public function vehiculosInsumos()
    {
        $this->select("id_vehiculo, placa");
        $this->where("estado", "37");
        $this->orWhere("estado", "39");
        $this->orWhere("estado", "40");
        $this->orWhere("estado", "44");
        $this->orWhere("estado", "45");
        $data = $this->findAll();
        return $data;
    }

    public function contadorVehiculos($id)
    {
        $this->select('COUNT(id_vehiculo) AS n_vehi');
        $this->where('estado', 'A');
        if($id != 0) {
            $this->where('vehiculos.id_marca', $id);
        }
        $data = $this->first();
        return $data;
    }
}