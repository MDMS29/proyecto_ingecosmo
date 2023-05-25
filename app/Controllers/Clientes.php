<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\TercerosModel;
use App\Models\ParamModel;


class Clientes extends BaseController
{

    protected $clientes;
    protected $param;
    public function __construct()
    {
        $this->clientes = new TercerosModel();
        $this->param = new ParamModel();
    }

    public function obtenerClientes()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->clientes->obtenerClientes($estado);
        return json_encode($res);
    }
    public function index()
    {
        $tipoDoc = $this->param->obtenerTipoDoc();
        $tipoTel = $this->param->obtenerTipoTel(); 
        $data = [ 'tipoDoc' => $tipoDoc, 'tipoTele' => $tipoTel];
        echo view('/principal/sidebar');
        echo view('/clientes/clientes', $data);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $idCLiente = $this->request->getPost('id');
        $nombre_p= $this->request->getPost('nombreP');
        $nombre_s = $this->request->getPost('nombreS');
        $apellido_p = $this->request->getPost('apellidoP');
        $apellido_s = $this->request->getPost('apellidoS');
        $nIdenti = $this->request->getPost('nIdenti');
        $direccion = $this->request->getPost('direccion');
        $telefono = $this->request->getPost('telefono');
        $email = $this->request->getPost('email');
        $tipoTercero = 5;
        $tipoDocumento = 1;
        $usuarioCrea = session('id');


        if ($tp == 2) {
            //Actualizar datos
            $clienteUpdate = [
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombre_p,
                'nombre_s' => $nombre_s,
                'apellido_p' => $apellido_p,
                'apellido_s' => $apellido_s,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'tipo_tercero' => $tipoTercero,
                'tipo_doc' => $tipoDocumento,
                'usuario_crea' => $usuarioCrea
            ];
            $this->clientes->update($idCLiente, $clienteUpdate);
            return $idCLiente;
        } else {
            //Insertar datos
            //Si la respuesta esta vacia - guardar
            $clienteSave = [
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombre_p,
                'nombre_s' => $nombre_s,
                'apellido_p' => $apellido_p,
                'apellido_s' => $apellido_s,
                'direccion' => $direccion,
                'telefono' => $telefono,
                'email' => $email,
                'tipo_tercero' => $tipoTercero,
                'tipo_doc' => $tipoDocumento,
                'usuario_crea' => $usuarioCrea
                
            ];
            $this->clientes->save($clienteSave);
            return json_encode($this->clientes->getInsertID());
        }
    }
    public function buscarCliente($id,  $nIdenti)
    {
        $array = array();
        if ($id != 0) {
            $data = $this->clientes->buscarCliente($id, 0);
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nIdenti != 0) {
            $data = $this->clientes->buscarCliente(0, $nIdenti);
            array_push($array, $data);
            return json_encode($array);

        } else if ($id != 0 && $nIdenti != 0) {
            $data = $this->clientes->buscarCliente($id, $nIdenti);
            array_push($array, $data);
            return json_encode($array);
        }
    }

    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        if ($this->clientes->update($id, ['estado' => $estado])) {
            if($estado == 'A'){
                return '¡Se ha reestablecido el Cliente!';
            }else{
                return '¡Se ha eliminado el Cliente!';
            }
        }
    }
    public function eliminados()
    {
        $clientes = $this->clientes->select('*')->where('estado', 'I')->where('tipo_tercero', '5')->findAll();

        $data = ['clientes' => $clientes];
        echo view('/principal/sidebar');
        echo view('/clientes/eliminados', $data);
    }

}
