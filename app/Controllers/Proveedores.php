<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\ProveedoresModel;

class Proveedores extends BaseController
{
    protected $proveedores;
    public function __construct()
    {
        $this->proveedores = new ProveedoresModel();
    }
    public function index()
    {
        $proveedores = $this->proveedores->obtenerProveedores();

        echo view('/principal/sidebar');
        echo view('/proveedores/proveedores');
    }

}
