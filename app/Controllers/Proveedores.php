<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\TercerosModel;

class Proveedores extends BaseController
{
    protected $proveedores;
    public function __construct()
    {
        $this->proveedores = new TercerosModel();
    }
    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/proveedores/proveedores');
    }

    public function obtenerProveedores()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->proveedores->obtenerProveedores($estado);
        return json_encode($res);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $tipoTercero = 8;
        $tipoDocumento = 2;
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->proveedores->save([
                    'razon_social' => $this->request->getPost('RazonSocial'),
                    'n_identificacion' => $this->request->getPost('nit'),
                    'direccion' => $this->request->getPost('direccion'),
                    'tipo_tercero' => $tipoTercero,
                    'tipo_doc' => $tipoDocumento
                ]);
            } else {
                $this->proveedores->update(
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

    public function buscarProveedor($id, $razonSocial)
    {
        $returnData = array();
        $proveedores_ = $this->proveedores->traerProveedor($id,$razonSocial);
        if (!empty($proveedores_)) {
            array_push($returnData, $proveedores_);
        }
        echo json_encode($returnData);
    }

    
    public function eliminados(){
        $proveedores = $this->proveedores->select('*')->where('estado', 'I')->where('tipo_tercero', '8')->findAll();
        $data = ['proveedores' => $proveedores];
        echo view('/principal/sidebar');
        echo view('/proveedores/eliminados', $data);
    }

    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        if ($this->proveedores->update($id, ['estado' => $estado])) {
            if($estado == 'A'){
                return '¡Se ha reestablecido el Proveedor!';
            }else{
                return '¡Se ha eliminado el Proveedor!';
            }
        }
    }
}
