<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\TercerosModel;

class Aliados extends BaseController
{
    protected $aliados;
    public function __construct()
    {
        $this->aliados = new TercerosModel();
    }
    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/aliados/aliados');
    }

    public function obtenerAliadosdores()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->aliados->obtenerAliados($estado);
        return json_encode($res);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $tipoTercero = 8;
        $tipoDocumento = 2;
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->aliados->save([
                    'razon_social' => $this->request->getPost('RazonSocial'),
                    'n_identificacion' => $this->request->getPost('nit'),
                    'direccion' => $this->request->getPost('direccion'),
                    'tipo_tercero' => $tipoTercero,
                    'tipo_doc' => $tipoDocumento
                ]);
            } else {
                $this->aliados->update(
                    $this->request->getPost('id'),
                    [
                        'razon_social' => $this->request->getPost('RazonSocial'),
                        'n_identificacion' => $this->request->getPost('nit'),
                        'direccion' => $this->request->getPost('direccion'),
                        'tipo_tercero' => $tipoTercero,
                        'tipo_doc' => $tipoDocumento
                    ]
                );
            }
        }
    }

    public function buscarAliados($id, $razonSocial)
    {
        $returnData = array();
        $aliados_ = $this->aliados->traerAliado($id,$razonSocial);
        if (!empty($aliados_)) {
            array_push($returnData, $aliados_);
        }
        echo json_encode($returnData);
    }

    public function eliminar($id, $estado)
    {
        $proveedores_ = $this->aliados->eliminaAliados($id, $estado);
        return redirect()->to(base_url('/aliados'));
    }
    public function eliminados(){
        $aliados = $this->aliados->select('*')->where('estado', 'I')->where('tipo_tercero', '8')->findAll();
        $data = ['proveedores' => $aliados];
        echo view('/principal/sidebar');
        echo view('/aliados/eliminados', $data);
    }
}
