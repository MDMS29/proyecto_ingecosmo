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
        $idUser = $this->request->getPost('id');
        $nombreP = $this->request->getPost('nombreP');
        $nombreS = $this->request->getPost('nombreS');
        $apellidoP = $this->request->getPost('apellidoP');
        $apellidoS = $this->request->getPost('apellidoS');
        $tipoDoc = $this->request->getPost('tipoDoc');
        $nIdenti = $this->request->getPost('nIdenti');
        $rol = $this->request->getVar('rol');
        $contra = $this->request->getVar('contra');

        if ($tp == 2) {
            //Actualizar datos
            $usuarioUpdate = [
                'id_rol' => $rol,
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombreP,
                'nombre_s' => $nombreS,
                'apellido_p' => $apellidoP,
                'apellido_s' => $apellidoS
            ];
            $this->usuarios->update($idUser, $usuarioUpdate);
            return $idUser;
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
            return json_encode($this->usuarios->getInsertID());
        }
    }
    public function login()
    {
        $nIdenti = $this->request->getPost('usuario');
        $contrasena = $this->request->getVar('contrasena');
        $datos = $this->usuarios->buscarUsuario(0, $nIdenti);
        $textoAlerta="<div class='alerta'> <i class='bi bi-exclamation-circle-fill'></i> Usuario o Contraseña Incorrecta </div>";
        if (!empty($datos) && password_verify($contrasena, $datos['contrasena'])) {
            $data = [
                "id" => $datos['id_usuario'],
                "nombre" => $datos['nombre_p'],
                "apellido" => $datos['apellido_p'],
                "rol" => $datos['nombre_rol']
            ];
            $session = session();
            $session->set($data); 
            return redirect()->to(base_url('/home'));
        } else {
            return redirect()->to(base_url('/'))->with('mensaje', $textoAlerta);
        }
    }
    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
}