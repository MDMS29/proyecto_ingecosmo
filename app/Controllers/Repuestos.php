<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParamModel;
use App\Models\MaterialesModel;
use App\Models\EstanteriaModel;

class Repuestos extends BaseController
{
    protected $materiales;
    protected $categorias;
    protected $estanteria;


    public function __construct()
    {
        $this->categorias = new ParamModel();
        $this->estanteria = new EstanteriaModel();
        $this->materiales = new MaterialesModel();
    }
    public function index()
    {
        $bodega = $this->estanteria->obtenerBodega();
        $data = ['data' => $bodega];
        echo view('/principal/sidebar');
        echo view('/categorias/categoriaRepuesto', $data);
        
    }

    public  function mostrarBodega($id, $nombre, $icon)
    {
        $repuestos = $this->materiales->obtenerRepuestoBodega($id);
        $data = ['data' => $repuestos, 'nombreBodega' => $nombre, 'icono' => $icon];
        echo view('/principal/sidebar');
        
        echo view('/materiales/repuestos', $data);
    }
}