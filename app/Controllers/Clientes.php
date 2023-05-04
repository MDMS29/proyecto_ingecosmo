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
    public function index()
    {
        $clientes = $this->clientes->obtenerClientes();
        $tipoDoc = $this->param->obtenerTipoDoc();
        $telefonos = $this->telefonos->obtenerTelefonoCLiente();
        $correos = $this->correos->obtenerEmailCLiente();

        $data = ['clientes' => $clientes];
        echo view('/principal/sidebar');
        echo view('/clientes/clientes', $data);
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $tipoTercero = 5;
        $tipoDocumento = 1;
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->clientes->save([
                    'nombre_p' => $this->request->getPost('nombreP'),
                    'nombre_s' => $this->request->getPost('nombreS'),
                    'apellido_p' => $this->request->getPost('apellidoP'),
                    'apellido_s' => $this->request->getPost('apellidoS'),
                    'n_identificacion' => $this->request->getPost('Nidentificacion'),
                    'direccion' => $this->request->getPost('direccion'),
                    'tipo_tercero' => $tipoTercero,
                    'tipo_doc' => $tipoDocumento
                ]);
            } else {
                $this->clientes->update(
                    $this->request->getPost('id'),
                    [
                        'nombre_p' => $this->request->getPost('nombreP'),
                        'nombre_s' => $this->request->getPost('nombreS'),
                        'apellido_p' => $this->request->getPost('apellidoP'),
                        'apellido_s' => $this->request->getPost('apellidoS'),
                        'n_identificacion' => $this->request->getPost('Nidentificacion'),
                        'direccion' => $this->request->getPost('direccion'),
                        'tipo_tercero' => $tipoTercero,
                        'tipo_doc' => $tipoDocumento
                    ]
                );
            }
            return redirect()->to(base_url('/clientes'));
        }
    }

    public function buscarCliente($id)
    {
        $returnData = array();
        $clientes_ = $this->clientes->traerCliente($id);
        if (!empty($clientes_)) {
            array_push($returnData, $clientes_);
        }
        echo json_encode($returnData);
    }

    public function eliminar($id, $estado)
    {
        $clientes_ = $this->clientes->eliminaCliente($id, $estado);
        return redirect()->to(base_url('/clientes'));
    }

    public function eliminados()
    {
        $clientes = $this->clientes->select('*')->where('estado', 'I')->where('tipo_tercero', '5')->findAll();

        $data = ['clientes' => $clientes];
        echo view('/principal/sidebar');
        echo view('/clientes/eliminados', $data);
    }

   
}
