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
        $proveedores = $this->proveedores->obtenerProveedores();

        $data = ['proveedores' => $proveedores];
        echo view('/principal/sidebar');
        echo view('/proveedores/proveedores', $data);
    }

    public function insertar()
        {
            $tp=$this->request->getPost('tp');
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
                    $this->proveedores->update($this->request->getPost('id'),
                    [                    
                        'razon_social' => $this->request->getPost('RazonSocial'),
                        'n_identificacion' => $this->request->getPost('nit'),
                        'direccion' => $this->request->getPost('direccion'),
                        'tipo_tercero' => $tipoTercero,
                        'tipo_doc' => $tipoDocumento
                    ]);
                }
                return redirect()->to(base_url('/proveedores'));
            }
        
    }

    public function buscarProveedor($id)
    {
        $returnData = array();
        $proveedores_ = $this->proveedores->traerProveedor($id);
        if (!empty($proveedores_)) {
            array_push($returnData, $proveedores_);
        }
        echo json_encode($returnData);
    }

    public function eliminar($id, $estado)
    {
        $proveedores_ = $this->proveedores->eliminaProveedor($id, $estado);
        return redirect()->to(base_url('/proveedores'));
    }

    public function eliminados(){
        $proveedores = $this->proveedores->where('estado', 'E')->findAll();
        
        $data = ['proveedores' => $proveedores];
        echo view('/principal/sidebar');
        echo view('/proveedores/eliminados', $data);
    }


}
