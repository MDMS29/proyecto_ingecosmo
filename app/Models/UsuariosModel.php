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

    protected $allowedFields = ['id_rol', 'tipo_doc', 'n_identificacion', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_s', 'contrasena', 'estado', 'foto', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerUsuarios($estado)
    {
        $this->select('usuarios.*, param_detalle.resumen as doc_res, roles.nombre as nombre_rol');
        $this->join('roles', 'roles.id_rol = usuarios.id_rol');
        $this->join('param_detalle', 'param_detalle.id_param_det = usuarios.tipo_doc');
        $this->orderBy('id_usuario', 'asc');
        $this->where('usuarios.estado', $estado);
        $data = $this->findAll();
        return $data;
    }


    public function buscarUsuario($id, $nIdenti)
    {
        if ($id != 0) {
            $this->select('usuarios.*, roles.nombre as nombre_rol, param_detalle.nombre as tipo_Documento');
            $this->where('id_usuario', $id);
            $this->join('roles', 'roles.id_rol = usuarios.id_rol');
            $this->join('param_detalle', 'param_detalle.id_param_det = usuarios.tipo_doc');
        } elseif ($nIdenti != 0) {
            $this->select("usuarios.*, concat(usuarios.nombre_p,' ', usuarios.nombre_s, ' ',usuarios.apellido_p, ' ', usuarios.apellido_s) as nomCompleto, roles.nombre as nombre_rol, roles.id_rol as idRol");
            $this->where('n_identificacion', $nIdenti);
            $this->where('usuarios.estado', 'A');
            $this->join('roles', 'roles.id_rol = usuarios.id_rol');
        } elseif ($id != 0 && $nIdenti != 0) {

            $this->select('usuarios.*');
            $this->where('id_usuario', $id);
            $this->where('n_identificacion', $nIdenti);
        }
        $data = $this->first();
        return $data;
    }
    public function contadorUsuarios($id)
    {
        $this->select('count(id_usuario) as n_usuario');
        $this->where('estado', 'A');
        if ($id != 0) {
            $this->where('usuarios.id_rol', $id);
        }
        $data = $this->first();
        return $data;
    }
}
