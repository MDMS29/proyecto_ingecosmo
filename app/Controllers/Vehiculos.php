<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\MarcasModel;
use App\Models\ParamModel;
use App\Models\PropietariosModel;

class Vehiculos extends BaseController
{
    protected $vehiculos;
    protected $clientes;
    protected $marcas;
    protected $param;
    protected $propietario;
    public function __construct()
    {
        $this->vehiculos = new VehiculosModel();
        $this->clientes = new TercerosModel();
        $this->marcas = new MarcasModel();
        $this->param = new ParamModel();
        $this->propietario = new PropietariosModel();
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
        $idVechiculo = $this->request->getPost('id');
        $orden = $this->request->getPost('orden');
        $cliente = $this->request->getPost('cliente');
        $placa = $this->request->getPost('placa');
        $marca = $this->request->getPost('marca');
        $nFabrica = $this->request->getPost('nFabrica');
        $color = $this->request->getPost('color');
        $kms = $this->request->getPost('kms');
        $combustible = $this->request->getPost('combustible');
        $estado = $this->request->getPost('estado');
        $fechaEntrada = $this->request->getPost('fechaEntrada');
        $usuarioCrea = session('id');

        $data = [
            'n_orden' => $orden,
            'id_marca' => $marca,
            'placa' => $placa,
            'linea' => '',
            'modelo' => $nFabrica,
            'color' => $color,
            'kms' => $kms,
            'n_combustible' => $combustible,
            'estado' => $estado,
            'fecha_entrada' => $fechaEntrada,
            'usuario_crea' => $usuarioCrea
        ];

        if ($tp == 2) {
            if ($this->vehiculos->update($idVechiculo, $data)) {
                $res = $this->propietario->obtenerPropietario($idVechiculo);
                $dataPropie = [
                    'id_vehiculo' => $idVechiculo,
                    'id_tercero' => $cliente
                ];
                if (empty($res)) {
                    if ($this->propietario->save($dataPropie)) {
                        return json_encode(1);
                    } else {
                        return json_encode(2);
                    }
                } else {
                    if ($this->propietario->update($res['id_propietario'], $dataPropie)) {
                        return json_encode(1);
                    } else {
                        return json_encode(2);
                    }
                }
            }
        } else {
            if ($this->vehiculos->save($data)) {
                $idVechiulo = $this->vehiculos->getInsertID();
                $dataPropie = [
                    'id_vehiculo' => $idVechiulo,
                    'id_tercero' => $cliente
                ];
                if ($this->propietario->save($dataPropie)) {
                    return json_encode(1);
                }
            } else {
                return json_encode(2);
            }
        }
    }
}
