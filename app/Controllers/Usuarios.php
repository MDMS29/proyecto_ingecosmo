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
    public function login()
    {
        $nIdenti = $this->request->getPost('usuario');
        $contrasena = $this->request->getVar('contrasena');
        $datos = $this->usuarios->buscarUsuario(0, $nIdenti);
        // $Usuario = new Usuarios();
        if (!empty($datos) && password_verify($contrasena, $datos['contrasena'])) {
            //Aqui puedes meter toda la info del user que aparcera en el home
            $data = [
                "id" => $datos['id_usuario'],
                "nombre" => $datos['nombre_p'],
                "apellido" => $datos['apellido_p'],
                "idRol" => $datos['idRol'],
                "rol" => $datos['nombre_rol']
            ];
            $session = session();
            $session->set($data); //agregamos los datos obtenidos del usuario
            return redirect()->to(base_url('/home'));
        } else {
            return redirect()->to(base_url('/'));
        }
    }
    public function index()
    {
        $usuarios = $this->usuarios->obtenerUsuarios('A');
        $param = $this->param->obtenerTipoDoc();
        $roles = $this->roles->obtenerRoles();

        $data = ['usuarios' => $usuarios, 'tipoDoc' => $param, 'roles' => $roles];

        echo view('/principal/sidebar');
        echo view('/usuarios/usuarios', $data);
    }
    public function salir()
    {
        $session = session();
        $session->destroy();
        return redirect()->to(base_url('/'));
    }
    public function perfil($id)
    {
        $usuarios = $this->usuarios->buscarUsuario($id, 0);
        $data = ['usuarios' => $usuarios];
        echo view('principal/sidebar');
        echo view('usuarios/perfil', $data);
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
            $res = $this->usuarios->buscarUsuario($idUser, 0);
            //Si la contraseña esta vacia no se actualiza
            if ($contra != '') {
                //Verifica que no sea la misma de antes
                $contraHash = password_verify($contra, $res['contrasena']);
                if (!$contraHash) {
                    $contra = password_hash($contra, PASSWORD_DEFAULT); //Hasheo nuevo
                }
            } else {
                $contra = $res['contrasena'];
            }
            $usuarioUpdate = [
                'id_rol' => $rol,
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombreP,
                'nombre_s' => $nombreS,
                'apellido_p' => $apellidoP,
                'apellido_s' => $apellidoS,
                'contrasena' => $contra
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
    public function buscarUsuario($id, $nIdenti)
    {
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
    public function cambiarEstado()
    {
        $nIdenti = $this->request->getPost('usuario');
        $contrasena = $this->request->getVar('contrasena');
        $datos = $this->usuarios->buscarUsuario(0, $nIdenti);
        // $Usuario = new Usuarios();
        if (!empty($datos) && password_verify($contrasena, $datos['contrasena'])) {
            //Aqui puedes meter toda la info del user que aparcera en el home
            $data = [
                "id" => $datos['id_usuario'],
                "nombre" => $datos['nombre_p'],
                "apellido" => $datos['apellido_p'],
                "idRol" => $datos['idRol'],
                "rol" => $datos['nombre_rol']
            ];
            $session = session();
            $session->set($data); //agregamos los datos obtenidos del usuario
            return redirect()->to(base_url('/home'));
        } else {
            return redirect()->to(base_url('/'));
        }
    }
    public function eliminados()
    {
        $usuarios = $this->usuarios->obtenerUsuarios('I');
        $param = $this->param->obtenerTipoDoc();
        $roles = $this->roles->obtenerRoles();
        $data = ['usuarios' => $usuarios, 'tipoDoc' => $param, 'roles' => $roles];
        echo view('principal/sidebar');
        echo view('usuarios/eliminados', $data);
    }
}
