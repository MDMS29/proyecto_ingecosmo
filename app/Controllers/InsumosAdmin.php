<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\EstanteriaModel;

class InsumosAdmin extends BaseController
{
    protected $insumos;
    protected $placa;
    protected $razonSocial;
    protected $estantes;

    public function __construct()
    {
        $this->insumos = new MaterialesModel();
        $this->placa = new VehiculosModel();
        $this->razonSocial = new TercerosModel();
        $this->estantes = new EstanteriaModel();

    }
    public function index()
    {
        $estantes = $this->estantes->traerEstantes();
        $data = ['estantes' => $estantes];
        echo view('/principal/sidebar');
        echo view('/materiales/insumosAdmin', $data);
    }

    public function obtenerInsumos()
    {
        $estado = $this->request->getPost('estado');
        $insumos = $this->insumos->obtenerInsumoAdmin($estado);
        echo json_encode($insumos);
    }
    public function buscarInsumo()
    {
        $id = $this->request->getPost('id');
        
        $res = $this->insumos->buscarInsumo($id, '');
        return json_encode($res);
    }

    public function insertar()
    {
        
    }

    // public function editarMaterial($id)
    // {
    //     $returnData = array();
    //     $insumosAdmin_ = $this->insumosAdmin->traerEditar($id);
    //     if (!empty($materiales_)) {
    //         array_push($returnData, $insumosAdmin_);
    //     }
    //     echo json_encode($returnData);
    // }
    

    // public function insertar()
    // {
    //     $tp = $this->request->getPost('tp');
    //     $usuCrea = session('id');
    //     if ($this->request->getMethod() == "post") {
    //         if ($tp == 1) {
    //             $this->insumosAdmin->save([
    //                 'nombre' => $this->request->getPost('nombre'),
    //                 'cantidad_actual' => $this->request->getPost('existencia'),
    //                 'placa' => $this->request->getPost('placa'),
    //                 'precio_venta' => $this->request->getPost('precio'),
    //                 'razon_social' => $this->request->getPost('proveedores'),
    //                 'usuario_crea' => $usuCrea 

    //             ]);
    //         } else {
    //             $this->insumosAdmin->update(
    //                 $this->request->getPost('id'),
    //                 [
    //                 'nombre' => $this->request->getPost('nombre'),
    //                 'cantidad_actual' => $this->request->getPost('existencia'),
    //                 'placa' => $this->request->getPost('placa'),
    //                 'precio_venta' => $this->request->getPost('precio'),
    //                 'razon_social' => $this->request->getPost('proveedores'),
    //                 'usuario_crea' => $usuCrea 

    //                 ]
    //             );
    //         }
    //     }
    // }

  
}
