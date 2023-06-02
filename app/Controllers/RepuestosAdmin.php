<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;

class RepuestosAdmin extends BaseController
{
    protected $respuestosAdmin;
    protected $vehiculo;
    protected $proveedor;

    public function __construct()
    {
        $this->respuestosAdmin = new MaterialesModel();
        $this->vehiculo = new VehiculosModel();
        $this->proveedor = new TercerosModel();

    }
    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdmin');
    }
    public function obtenerRepuestos()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->respuestosAdmin->obtenerRepuestos($estado);
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

  
}
