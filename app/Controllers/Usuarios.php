<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UsuariosModel;
use App\Models\ParamModel;
use App\Models\RolesModel;
use App\Models\TelefonosModel;
use App\Models\EmailModel;

class Usuarios extends BaseController
{
    protected $usuarios;
    protected $param;
    protected $roles;
    protected $telefonos;
    protected $correos;
    public function __construct()
    {
        $this->usuarios = new UsuariosModel();
        $this->param = new ParamModel();
        $this->roles = new RolesModel();
        $this->telefonos = new TelefonosModel();
        $this->correos = new EmailModel();
        helper('sistema');
    }

    // public function guardarFoto(){ pruebitas jijijiji
    //     $uploads='upload';
    //     $config['upload_path']="uploads/";
    //     $config['file_name']="nombre_archivo";
    //     $config['allowed_types']="jpg|png|jpeg|gif";
    //     $config['max_size']="5000";
    //     $config['max_width']="2000";
    //     $config['max_height']="2000";

    //     $this->load->library('uploads', $config);

    //     if (!$this->upload->do_upload($uploads)) {
    //         // $data['uploadError']=$this->upload->display_errors();
    //         echo $this->upload->display_errors();
    //         return;
    //     }
    //     var_dump($this->upload->data());
    // }

    public function login()
    {
        $usuario = $this->request->getPost('usuario');
        $contra = $this->request->getVar('contrasena');
        if (!empty($usuario) && !empty($contra)) {
            $nIdenti = $usuario;
            $contrasena = $contra;
            $datos = $this->usuarios->buscarUsuario(0, $nIdenti);
            if (!empty($datos) && password_verify($contra, $datos['contrasena'])) {
                $data = [
                    "id" => $datos['id_usuario'],
                    "nombre" => $datos['nombre_p'],
                    "apellido" => $datos['apellido_p'],
                    "idRol" => $datos['idRol'],
                    "rol" => $datos['nombre_rol']
                ];
                $session = session();
                $session->set($data);
                return json_encode(1);
            } else {
                return json_encode(2);
            }
        } else {
            $nIdenti = $this->request->getPost('usuario');
            $contrasena = $this->request->getVar('contrasena');
            $datos = $this->usuarios->buscarUsuario(0, $nIdenti);
            if (!empty($datos) && password_verify($contrasena, $datos['contrasena'])) {
                $data = [
                    "id" => $datos['id_usuario'],
                    "nombre" => $datos['nombre_p'],
                    "apellido" => $datos['apellido_p'],
                    "idRol" => $datos['idRol'],
                    "rol" => $datos['nombre_rol']
                ];
                $session = session();
                $session->set($data);
                return json_encode(1);
            } else {
                return json_encode(2);
            }
        }
    }

    public function salir()
    {
        $session = session();
        $session->destroy();
        return json_encode(1);
    }
    public function obtenerUsuarios()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->usuarios->obtenerUsuarios($estado);
        return json_encode($res);
    }
    public function index()
    {
        $tipoDoc = $this->param->obtenerTipoDoc();
        $roles = $this->roles->obtenerRoles();
        $tipoTel = $this->param->obtenerTipoTel();

        $data = ['tipoDoc' => $tipoDoc, 'roles' => $roles, 'tipoTele' => $tipoTel];

        echo view('/principal/sidebar');
        echo view('/usuarios/usuarios', $data);
    }

    public function perfil($id)
    {
        $usuarios = $this->usuarios->buscarUsuario($id, 0);
        $telefonos = $this->telefonos->obtenerTelefonoUser($id, 7);
        $correos = $this->correos->obtenerEmailUser($id, 7);
        $data = ['usuario' => $usuarios, 'telefonos' => $telefonos, 'correos' => $correos];
        echo view('principal/sidebar');
        echo view('usuarios/perfil', $data);
    }
    public function mostrarImagen($id)
    {
        $res = $this->usuarios->buscarUsuario($id, 0);
        $rutaImagen = '/uploads/' . $res['foto'];
        $rutaCompleta = WRITEPATH . $rutaImagen;

        $fp = fopen($rutaCompleta, 'rb');

        header("Content-Type: image/png");
        header("Content-Length: " . filesize($rutaCompleta));
        fpassthru($fp);
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

        $foto = $this->request->getFile('foto');

        if ($foto->isValid() && !$foto->hasMoved()) {
            $newName = $idUser . $nombreP . '.png'; //Nombre de imagen

            $uploadPath = 'fotoUser';

            // Verificar si el directorio existe, si no, crearlo
            if (!is_dir($uploadPath)) {
                mkdir($uploadPath, 0777, true);
            }


            $foto->store($uploadPath, $newName); // Guardar el archivo en el directorio


            $rutaImagen = 'fotoUser/' . $foto->getName(); // Obtener la ruta de la imagen guardada

            if ($tp == 2) {
                //Actualizar datos
                $res = $this->usuarios->buscarUsuario($idUser, 0);
                $contra = $res['contrasena'];
                $usuarioUpdate = [
                    'id_rol' => $rol,
                    'tipo_doc' => $tipoDoc,
                    'n_identificacion' => $nIdenti,
                    'nombre_p' => $nombreP,
                    'nombre_s' => $nombreS,
                    'apellido_p' => $apellidoP,
                    'apellido_s' => $apellidoS,
                    'foto' => $rutaImagen,
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
                    'foto' => $rutaImagen,
                    'contrasena' => password_hash($contra, PASSWORD_DEFAULT)
                ];
                $this->usuarios->save($usuarioSave);
                return json_encode($this->usuarios->getInsertID());
            }
        }
    }
    public function cambiarContrasena()
    {
        $idUser = $this->request->getPost('idUsuario');
        $contra = $this->request->getVar('contra');
        $contrConfir = $this->request->getVar('contraConfir');

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
        if ($this->usuarios->update($idUser, ['contrasena' => $contra])) {
            return json_encode(1);
        } else {
            return json_encode(2);
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
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        if ($this->usuarios->update($id, ['estado' => $estado])) {
            if ($estado == 'A') {
                return '¡Se ha reestablecido el usuario!';
            } else {
                return '¡Se ha eliminado el usuario!';
            }
        }
    }
    public function eliminados()
    {
        $param = $this->param->obtenerTipoDoc();
        $roles = $this->roles->obtenerRoles();
        $data = ['tipoDoc' => $param, 'roles' => $roles];
        echo view('principal/sidebar');
        echo view('usuarios/eliminados', $data);
    }
}
