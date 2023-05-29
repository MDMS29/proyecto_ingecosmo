<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\InsumosAdminModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;

class InsumosAdmin extends BaseController
{
    protected $insumosAdmin;
    protected $placa;
    protected $razonSocial;

    public function __construct()
    {
        $this->insumosAdmin = new InsumosAdminModel();
        $this->placa = new VehiculosModel();
        $this->razonSocial = new TercerosModel();

    }
    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/materiales/insumosAdmin');
    }

    public function ObtenerDetallesInsumos()
    {
        $returnData = array();
        $insumosAdmin_ = $this->insumosAdmin->ObtenerDetallesInsumos();
        if (!empty($materiales_)) {
            array_push($returnData, $insumosAdmin_);
        }
        echo json_encode($returnData);
    }

    public function editarMaterial($id)
    {
        $returnData = array();
        $insumosAdmin_ = $this->insumosAdmin->traerEditar($id);
        if (!empty($materiales_)) {
            array_push($returnData, $insumosAdmin_);
        }
        echo json_encode($returnData);
    }
    

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
