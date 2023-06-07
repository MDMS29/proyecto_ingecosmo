<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\EstanteriaModel;
use App\Models\ParamModel;
use App\Models\OrdenesModel;

class RepuestosAdmin extends BaseController
{
    protected $respuestosAdmin;
    protected $vehiculo;
    protected $proveedor;
    protected $bodegas;
    protected $param;
    protected $ordenes;

    public function __construct()
    {
        $this->respuestosAdmin = new MaterialesModel();
        $this->vehiculo = new VehiculosModel();
        $this->proveedor = new TercerosModel();
        $this->bodegas = new EstanteriaModel();
        $this->param = new ParamModel();
        $this->ordenes = new OrdenesModel();

    }
    public function index()
    {
        $proveedores = $this->proveedor->obtenerProveedores('A');
        $bodegas = $this->bodegas->obtenerBodega();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $data = ["ordenes" => $ordenes, "bodegas" => $bodegas, "proveedores" => $proveedores];
        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdmin', $data);
    }
    public function obtenerRepuestos()
    {
        
        $estado = $this->request->getPost('estado');
        $res = $this->respuestosAdmin->obtenerRepuestos($estado);
        return json_encode($res);
    }

    public function buscarRepuesto($id)
    {
        // $id = $this->request->getPost('id');
        $res = $this->respuestosAdmin->buscarRepuesto($id);
        return json_encode($res);
    
    }

    

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $usuCrea = session('id');
        if ($this->request->getMethod() == "post") {
            if ($tp == 1) {
                $this->respuestosAdmin->save([
                    'nombre' => $this->request->getPost('nombre'),
                    'cantidad_actual' => $this->request->getPost('existencia'),
                    'placa' => $this->request->getPost('placa'),
                    'precio_venta' => $this->request->getPost('precio'),
                    'razon_social' => $this->request->getPost('proveedores'),
                    'usuario_crea' => $usuCrea 

                ]);
            } else {
                $this->respuestosAdmin->update(
                    $this->request->getPost('id'),
                    [
                    'nombre' => $this->request->getPost('nombre'),
                    'cantidad_actual' => $this->request->getPost('existencia'),
                    'placa' => $this->request->getPost('placa'),
                    'precio_venta' => $this->request->getPost('precio'),
                    'razon_social' => $this->request->getPost('proveedores'),
                    'usuario_crea' => $usuCrea 

                    ]
                );
            }
        }
    }

    public function eliminados()
    {
        $proveedores = $this->proveedor->obtenerProveedores('A');
        $bodegas = $this->bodegas->obtenerBodega();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $data = ["ordenes" => $ordenes, "bodegas" => $bodegas, "proveedores" => $proveedores];
        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdminEliminados', $data);
    }

  
}
