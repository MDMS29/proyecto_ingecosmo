<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class ParamModel extends Model
{
    protected $table = 'param_detalle'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_param_det';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_param_enc', 'nombre', 'resumen', 'estado', 'fecha_crea', 'usuario_crea', 'n_iconos']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerTipoDoc()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_enc', '1');
        $data = $this->findAll();
        return $data;
    }
    public function obtenerCategorias()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_enc', '10');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerCategoriasOrdenes()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_enc', '10');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerTipoMat()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_det', '9');
        $this->orWhere('id_param_det', '10');
        $datos = $this->findAll();
        return $datos;
    }
    public function obtenerFilas()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_enc', '10');
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerTipoEstante()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_enc', '14');
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerTipoTel()
    {
        $this->select('id_param_det as id, nombre');
        $this->where('id_param_enc', '2');
        $data = $this->findAll();
        return $data;
    }
    public function obtenerEstadosVehi($estado)
    {
        $this->select('id_param_det as id, nombre');
        $this->where('id_param_enc', '12');
        $this->where('estado', $estado);
        $data = $this->findAll();
        return $data;
    }
    
    
    public function obtenerCombustibleVehi($estado)
    {
        $this->select('id_param_det as id, nombre');
        $this->where('id_param_enc', '11');
        $this->where('estado', $estado);
        $data = $this->findAll();
        return $data;
    }
    public function obtenerAliadoClientes()
    {
        $this->select('id_param_det as id, nombre');
        $this->where('id_param_det', '5');
        $this->orWhere('id_param_det', '56');
        $this->where('estado', 'A');
        $data = $this->findAll();
        return $data;
    }
    public function obtenerTipoValidacion()
    {
        $this->select('param_detalle.*');
        $this->where('id_param_enc', '15');
        $data = $this->findAll();
        return $data;
    }
}
