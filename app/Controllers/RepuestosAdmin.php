<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\EstanteriaModel;
use App\Models\ParamModel;

class RepuestosAdmin extends BaseController
{
    protected $respuestosAdmin;
    protected $vehiculo;
    protected $proveedor;
    protected $estantes;
    protected $param;

    public function __construct()
    {
        $this->respuestosAdmin = new MaterialesModel();
        $this->vehiculo = new VehiculosModel();
        $this->proveedor = new TercerosModel();
        $this->estantes = new EstanteriaModel();
        $this->param = new ParamModel();

    }
    public function index()
    {
        
        $categorias = $this->param->obtenerCategorias();
        $estantes = $this->estantes->traerEstantes();
        $data = ['estantes' => $estantes, 'categorias' => $categorias];
        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdmin', $data);
    }
    public function obtenerRepuestos()
    {
        
        $estado = $this->request->getPost('estado');
        $res = $this->respuestosAdmin->obtenerRepuestos($estado);
        return json_encode($res);
    }

    public function buscarRepuesto()
    {
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');

        $res = $this->respuestosAdmin->buscarRepuesto($id, $nombre);
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
