<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;


class Materiales extends BaseController
{
    protected $materiales;
    public function __construct()
    {
        $this->materiales = new MaterialesModel();
    }
    public function index()
    {
        $materiales = $this->materiales->obtenerInsumos();
        $data = ['data' => $materiales];
        echo view('/principal/sidebar');
        echo view('/materiales/materiales', $data);
    }

    public function detallesMaterial($id)
    {
        $returnData = array();
        $materiales_ = $this->materiales->traerDetalles($id);
        if (!empty($materiales_)) {
            array_push($returnData, $materiales_);
        }
        echo json_encode($returnData);
    }

    public function editarMaterial($id)
    {
        $returnData = array();
        $materiales_ = $this->materiales->traerEditar($id);
        if (!empty($materiales_)) {
            array_push($returnData, $materiales_);
        }
        echo json_encode($returnData);
    }

    
    public function usarMaterial($id)
    {
        $returnData = array();
        $materiales_ = $this->materiales->usarInsumo($id);
        if (!empty($materiales_)) {
            array_push($returnData, $materiales_);
        }
        echo json_encode($returnData);
    }

    


    // public function agregarMaterial($id_material)
    // {
    //     $returnData = array();
    //     $materiales_ = $this->materiales->traerMateriales($id_material);
    //     if (!empty($materiales_)) {
    //         array_push($returnData, $materiales_);
    //     }
    //     echo json_encode($returnData);
    // }

}
