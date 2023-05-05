<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculosModel;

class Vehiculos extends BaseController
{
    protected $vehiculos;
    public function __construct()
    {
        $this->vehiculos = new VehiculosModel();
        helper('sistema');
    }

    public function index()
    {
        echo view ('principal/sidebar');
        echo view ('vehiculos/vehiculos');
    }
    public function obtenerVehiculos()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->vehiculos->obtenerVehiculos($estado);
        return json_encode($res);
    }
}
