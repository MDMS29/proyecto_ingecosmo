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
        echo view('/principal/header');
        echo view('/materiales/materiales', $data);
    }
}
