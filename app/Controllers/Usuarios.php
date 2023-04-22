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

        $tp = $this->request->getPost('tp');
        $id = $this->request->getPost('id');
        $nombreP = $this->request->getPost('nombre_p');
        $nombreS = $this->request->getPost('nombre_s');
        $apellidoP = $this->request->getPost('apellido_p');
        $apellidoS = $this->request->getPost('apellido_s');
        $tipoDoc = $this->request->getPost('tipoDoc');
        $nIdenti = $this->request->getPost('nIdenti');
        $rol = $this->request->getPost('rol');
        $contra = $this->request->getVar('contra');



        if ($tp == 2) {
            //Actualizar datos

        } else {
            //Insertar datos
            //Si la respuesta esta vacia - guardar
            $usuarioSave = [
                'id_rol' => $rol,
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombreP,
                'nombre_s' => $nombreS,
                'apellido_p' => $apellidoP,
                'apellido_s' => $apellidoS,
                'contrasena' => password_hash($contra, PASSWORD_DEFAULT)
            ];
            $this->usuarios->save($usuarioSave);
            return redirect()->to(base_url('usuarios'));
        }
    }

    public function buscarUsuario($id, $nIdenti)
    {
        // echo $nIdenti;
        $array = array();

        if ($id != 0) {
            $data = $this->usuarios->buscarUsuario($id, 0);
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nIdenti != 0) {
            $data = $this->usuarios->buscarUsuario(0, $nIdenti);
            array_push($array, $data);
            return json_encode($array);
        } else if ($id != 0 && $nIdenti != 0) {
            $data = $this->usuarios->buscarUsuario($id, $nIdenti);
            array_push($array, $data);
            return json_encode($array);
        }
    }
}
