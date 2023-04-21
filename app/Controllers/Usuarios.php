<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\ParamModel;
use App\Models\RolesModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $param;
    protected $roles;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->param = new ParamModel();
        $this->roles = new RolesModel();
        helper('sistema');
    }
    public function index()
    {
        $usuarios = $this->usuarios->obtenerUsuarios();
        $param = $this->param->obtenerTipoDoc();
        $roles = $this->roles->obtenerRoles();

        $data = ['usuarios' => $usuarios, 'tipoDoc' => $param, 'roles' => $roles];

        echo view('/principal/sidebar');
        echo view('/usuarios/usuarios', $data);
    }
    public function insertar()
    {
        $nombreP = $this->request->getPost('nombre_p');
        $nombreS = $this->request->getPost('nombre_s');
        $apellidoP = $this->request->getPost('apellido_p');
        $apellidoS = $this->request->getPost('apellido_s');
        $tipoDoc = $this->request->getPost('tipoDoc');
        $nIdenti = $this->request->getPost('nIdenti');
        $rol = $this->request->getPost('rol');
        $contra = $this->request->getVar('contra');
    }

    public function buscarUsuario($id)
    {
        $array = array();
        $data = $this->usuarios->buscarUsuario($id);
        if (!empty($data)) {
            array_push($array, $data);
            return json_encode($array);
        }
    }
}
