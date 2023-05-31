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

    protected $allowedFields = ['n_orden', 'id_vehiculo', 'estado', 'fecha_entrada', 'fecha_salida', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerOrdenes()
    {
        $this->select("id_orden, n_orden, vehiculos.placa, vehiculos.modelo, marca_vehiculo.nombre as marca, vehiculos.color, vehiculos.kms, vehiculos.n_combustible as combustible, fecha_entrada, fecha_salida, ordenes_servicio.estado as proceso, terceros.nombre_p, terceros.nombre_s,terceros.apellido_p,terceros.apellido_s, concat(terceros.nombre_p,' ', terceros.nombre_s, ' ', terceros.apellido_p, ' ', terceros.apellido_s) as cliente, terceros.razon_social");

        $this->join('vehiculos', 'vehiculos.id_vehiculo = ordenes_servicio.id_orden', 'left');
        $this->join('marca_vehiculo', 'marca_vehiculo.id_marca = vehiculos.id_marca', 'left');
        $this->join('propietarios', 'propietarios.id_vehiculo = vehiculos.id_vehiculo', 'left');
        $this->join('terceros', 'terceros.id_tercero = propietarios.id_tercero', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = propietarios.tipo_propietario', 'left');
        $data = $this->findAll();
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
}
