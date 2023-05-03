<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilasModel;

class Filas extends BaseController
{
    protected $filas;
    public function __construct()
    {
        $this->filas = new FilasModel();
    }
    public function index()
    {
        $filas = $this->filas->obtenerFilas();
        $data = ['data' => $filas];
        echo view('/principal/sidebar');
        echo view('/estanteria/filas', $data);
        
    }

    public  function mostrarFila($id, $nombre, $icon)
    {
        $filas = $this->filas->obtenerFilas($id);
        $data = ['data' => $filas, 'nombreFila' => $nombre, 'icono' => $icon];
        echo view('/principal/sidebar');
        echo view('/materiales/materiales', $data);
    }
}