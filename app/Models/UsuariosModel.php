<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class UsuariosModel extends Model
{
    protected $table = 'usuarios'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_usuario';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_rol', 'tipo_doc', 'n_identificacion', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_S', 'contrasena', 'estado', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fechaCrea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerUsuarios()
    {
        $this->select('usuarios.*, param_detalle.resumen as doc_res, roles.nombre as nombre_rol');
        $this->join('roles', 'roles.id_rol = usuarios.id_rol');
        $this->join('param_detalle', 'param_detalle.id_param_det = usuarios.tipo_doc');
        $this->orderBy('id_usuario', 'asc');
        $data = $this->findAll();
        return $data;
    }
}
