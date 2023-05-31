<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\MoviEncModel;

class Historial extends BaseController
{
    protected $historial;
    public function __construct()
    {
        $this->historial = new MoviEncModel();
    }

    public function obtenerHistorialVehiculos()
    {
        $res = $this->historial->historialVehiculos();
        return json_encode($res);
    }

    public function vehiculos()
    {
        echo view('principal/sidebar');
        echo view('historial/historialVehiculos');
    }
    public function materiales()
    {
        echo view('principal/sidebar');
        echo view('historial/historialMateriales');
    }

    public function obtenerMovimientoEnc()
    {
        $res = $this->historial->historialMateriales();
        return json_encode($res);
    }
}