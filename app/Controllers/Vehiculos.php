<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\MarcasModel;
use App\Models\ParamModel;
use App\Models\PropietariosModel;
use App\Models\MoviEncModel;

class Vehiculos extends BaseController
{
    protected $vehiculos;
    protected $clientes;
    protected $marcas;
    protected $param;
    protected $propietario;
    protected $movimiento;

    public function __construct()
    {
        $this->vehiculos = new VehiculosModel();
        $this->clientes = new TercerosModel();
        $this->marcas = new MarcasModel();
        $this->param = new ParamModel();
        $this->propietario = new PropietariosModel();
        $this->movimiento = new MoviEncModel();
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
        $tipoCliente = $this->param->obtenerAliadoClientes();
        $combustible = $this->param->obtenerCombustibleVehi('A');
        $data = [
            'clientes' => $clientes, 'marcas' => $marcas,
            'estadosVehi' => $estados, 'combustible' => $combustible,
            'tipoClientes' => $tipoCliente
        ];
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
        $tipoCliente = $this->request->getPost('tipoCliente');
        $cliente = $this->request->getPost('cliente');
        $placa = $this->request->getPost('placa');
        $marca = $this->request->getPost('marca');
        $nFabrica = $this->request->getPost('nFabrica');
        $color = $this->request->getPost('color');
        $kms = $this->request->getPost('kms');
        $combustible = $this->request->getPost('combustible');
        $estado = $this->request->getPost('estado');
        $usuarioCrea = session('id');
        $data = [
            'id_marca' => $marca,
            'placa' => $placa,
            'linea' => '',
            'modelo' => $nFabrica,
            'color' => $color,
            'kms' => $kms,
            'n_combustible' => $combustible,
            'estado' => $estado,
            'usuario_crea' => $usuarioCrea
        ];
        if ($tp == 2) {
            if ($this->vehiculos->update($idVechiculo, $data)) {
                $res = $this->propietario->obtenerPropietario($idVechiculo);
                //Propietario
                $dataPropie = [
                    'id_vehiculo' => $idVechiculo,
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente,
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
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente
                ];
                if ($this->propietario->save($dataPropie)) {
                    return json_encode(1);
                }
            } else {
                return json_encode(2);
            }
        }
    }
    public function buscarResponsable()
    {
        $tipo = $this->request->getPost('idTipo');
        $res = $this->clientes->obtenerTipoTercero($tipo, 0);
        return json_encode($res);
    }
}
