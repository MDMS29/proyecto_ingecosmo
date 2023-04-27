<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\CategoriaModel;
use App\Models\ParamModel;
use App\Models\MaterialesModel;

class Insumos extends BaseController
{
    protected $categorias;
    protected $materiales;
    public function __construct()
    {
        $this->categorias = new ParamModel();
        $this->materiales = new MaterialesModel();
    }
    public function index()
    {
        $categorias = $this->categorias->obtenerCategorias();
        $data = ['data' => $categorias];
        echo view('/principal/sidebar');
        echo view('/categorias/categoriaInsumo', $data);
    }

    public  function mostrarInsumo($id, $nombre, $icon)
    {
        $materiales = $this->materiales->obtenerInsumo($id);
        $data = ['data' => $materiales, 'nombreCategoria' => $nombre, 'icono' => $icon];
        echo view('/principal/sidebar');
        echo view('/materiales/materiales', $data);
    }
}
