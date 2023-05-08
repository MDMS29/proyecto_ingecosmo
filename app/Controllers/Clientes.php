<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\TercerosModel;
use App\Models\TelefonosModel;
use App\Models\EmailModel;
use App\Models\ParamModel;


class Clientes extends BaseController
{

    protected $telefonos;
    protected $param;
    protected $correos;
    protected $clientes;
    public function __construct()
    {
        $this->clientes = new TercerosModel();
        $this->param = new ParamModel();
        $this->telefonos = new TelefonosModel();
        $this->correos = new EmailModel();
    }

    public function obtenerCLientes()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->clientes->obtenerCLientes($estado);
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
        $nombre_p = $this->request->getPost('nombreP');
        $nombre_s = $this->request->getPost('nombreS');
        $apellido_p = $this->request->getPost('apellidoP');
        $apellido_s = $this->request->getPost('apellidoS');
        $n_identificacion = $this->request->getPost('Nidentificacion');
        $direccion = $this->request->getPost('direccion');
        $numero = $this->request->getPost('numero');
        $correo = $this->request->getPost('correo');
        $tipoTercero = 5;
        $tipoDocumento = 1;

            if ($tp == 2) {
               
            $res = $this->clientes->buscarCliente($idCLiente, 0);
            $clienteUpdate = [
                    'nombre_p' =>$nombre_p,
                    'nombre_s' =>$nombre_s,
                    'apellido_p' =>$apellido_p,
                    'apellido_s' =>$apellido_s,
                    'n_identificacion' =>$n_identificacion,
                    'direccion' =>$direccion,
                    'numero' => $numero,
                    'correo' =>$correo,
                    'tipo_tercero' => $tipoTercero,
                    'tipo_doc' => $tipoDocumento
            ];
            $this->clientes->update($idCLiente, $clienteUpdate);
            return $idCLiente;

            } else {
                $clienteSave = [
                    'nombre_p' =>$nombre_p,
                    'nombre_s' =>$nombre_s,
                    'apellido_p' =>$apellido_p,
                    'apellido_s' =>$apellido_s,
                    'n_identificacion' =>$n_identificacion,
                    'direccion' =>$direccion,
                    'numero' => $numero,
                    'correo' =>$correo,
                    'tipo_tercero' => $tipoTercero,
                    'tipo_doc' => $tipoDocumento
                ];
                $this->clientes->save($clienteSave);
                return json_encode($this->clientes->getInsertID());
            }
            return redirect()->to(base_url('/clientes'));
        
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
    public function cambiarEstado($id, $estado)
    {
        if ($this->clientes->update($id, ['estado' => $estado])) {
            if($estado == 'A'){
                return redirect()->to(base_url('clientes/eliminados'));
            }else{
                return redirect()->to(base_url('clientes'));
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
