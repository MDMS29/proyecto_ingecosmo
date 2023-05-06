<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\MarcasModel;
use App\Models\ParamModel;

class Vehiculos extends BaseController
{
    protected $vehiculos;
    protected $clientes;
    protected $marcas;
    protected $param;
    public function __construct()
    {
        $this->vehiculos = new VehiculosModel();
        $this->clientes = new TercerosModel();
        $this->marcas = new MarcasModel();
        $this->param = new ParamModel();
        helper('sistema');
    }
    public function obtenerVehiculos()
    {
        $res = $this->vehiculos->obtenerVehiculos();
        return json_encode($res);
    }
    public function index()
    {
        $clientes = $this->clientes->obtenerClientes('A');
        $marcas = $this->marcas->obtenerMarcas('A');
        $estados = $this->param->obtenerEstadosVehi('A');
        $combustible = $this->param->obtenerCombustibleVehi('A');
        $data = ['clientes' => $clientes, 'marcas' => $marcas, 'estadosVehi' => $estados, 'combustible' => $combustible];
        echo view('principal/sidebar');
        echo view('vehiculos/vehiculos', $data);
    }
    public function buscarVehiculo()
    {
        $orden = $this->request->getPost('orden');
        $placa = $this->request->getPost('placa');
        $id = $this->request->getPost('id');
        if ($orden != '') {
            $res = $this->vehiculos->buscarVehiculo($orden, '', 0);
            return json_encode($res);
        } else if ($placa != '') {
            $res = $this->vehiculos->buscarVehiculo('', $placa, 0);
            return json_encode($res);
        } else if ($id != 0) {
            $res = $this->vehiculos->buscarVehiculo('', '', $id);
            return json_encode($res);
        }
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $tp = $this->request->getPost('tp');
    }
}
