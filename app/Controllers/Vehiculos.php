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
    public function pdf()
    {
        //TODO: CAMBIAR AUTOLOAD AL MONTAR EN HOSTING
        $mrg_tp = 5;
        $mrg_lf = 5;
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(5, 10, 5);
        $pdf->SetY(5);
        $pdf->SetX(35);
        $pdf->image(base_url() . 'img/logo_empresa.png', 10, 5, 18, 18, 'png');
        $pdf->SetY(24);
        $pdf->SetX(3);
        $pdf->SetFont('Arial', 'B', 9);
        $pdf->Cell(10, 5, utf8_decode('a'), 0, 1, 'L');
        $pdf->Rect($mrg_lf - 3, $mrg_tp, 212, $mrg_tp + 19, '');
        $pdf->line($mrg_lf + 35, $mrg_tp, $mrg_lf + 35, $mrg_tp + 24);
        $pdf->SetTitle(utf8_decode('Cotización'));
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->SetY(5);
        $pdf->SetX(60);
        $pdf->Cell(10, 25, 'FORMATO DE COTIZACION A CLIENTE   ', 0, 1, 'L');
        $pdf->line(165, $mrg_tp, 165, $mrg_tp + 24);
        $pdf->SetFont('Arial', '', 12);
        $pdf->SetY($mrg_tp + 2);
        $pdf->SetX(167);
        $pdf->Cell(10, 5, utf8_decode('Código: FO-COT-02'), 0, 1, 'L');
        $pdf->SetY($mrg_tp);
        $pdf->SetX(167);
        $pdf->Cell(10, 24, utf8_decode('Versión: 02'), 0, 1, 'L');
        $pdf->SetY(5);
        $pdf->SetX(167);
        $pdf->Cell(10, 40, utf8_decode('Fecha: '), 0, 1, 'L');
        $pdf->SetFillColor(15, 221, 62);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetY(31);
        $pdf->SetX(3);
        $pdf->Cell(210, 5, utf8_decode('Descripción de la Cotización'), 1, 1, 'C', 1);
        $pdf->Rect(2, 38, 120, 26, '');
        $pdf->Rect(124, 38, 90, 26, '');
        $pdf->SetY(40);
        $pdf->SetX(3);
        $pdf->Cell(25, 5, utf8_decode('Cliente'), 1, 1, 'L', 1);

        $pdf->SetY(46);
        $pdf->SetX(3);
        $pdf->Cell(25, 5, utf8_decode('Nit o C.C'), 1, 1, 'L', 1);

        $pdf->SetY(52);
        $pdf->SetX(3);
        $pdf->Cell(25, 5, utf8_decode('Dirección'), 1, 1, 'L', 1);

        $pdf->SetY(58);
        $pdf->SetX(3);
        $pdf->Cell(25, 5, utf8_decode('Teléfonos'), 1, 1, 'L', 1);

        $pdf->SetY(41);
        $pdf->SetX(30);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, utf8_decode('sadasd'), 0, 1, 'L');

        $pdf->SetY(47);
        $pdf->SetX(30);
        $pdf->Cell(25, 5, utf8_decode('waos'), 0, 1, 'L');

        $pdf->SetY(53);
        $pdf->SetX(30);
        $pdf->Cell(25, 5, utf8_decode('waos'), 0, 1, 'L');

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetY(40);
        $pdf->SetX(127);
        $pdf->Cell(30, 5, utf8_decode('Cotización Nro.'), 1, 1, 'L', 1);
        $pdf->SetY(46);
        $pdf->SetX(127);
        $pdf->Cell(30, 5, utf8_decode('Fecha'), 1, 1, 'L', 1);
        //$pdf->SetY(52);
        //$pdf->SetX(127);
        //$pdf->Cell(30, 5, utf8_decode('Proyecto'), 1, 1, 'L', 1);

        $pdf->SetY(40);
        $pdf->SetX(159);
        $pdf->SetTextColor(252, 10, 10);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(25, 5, utf8_decode('COT' . 'waos' . ' -'), 0, 1, 'L');

        $pdf->SetY(40);
        $pdf->SetX(177);
        $pdf->SetTextColor(252, 10, 10);
        $pdf->SetFont('Arial', 'B', 14);
        $pdf->Cell(25, 5, utf8_decode('waos'), 0, 1, 'L');

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetTextColor(0, 0, 0);
        $pdf->SetY(47);
        $pdf->SetX(159);
        $pdf->Cell(25, 5, utf8_decode('waos'), 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 8);
        $pdf->SetFillColor(255, 255, 255);
        $pdf->SetY(54);
        $pdf->SetX(127);
        $pdf->multiCell(82, 5, utf8_decode('waos'), 0, 1, 'L');

        $pdf->SetFillColor(15, 221, 62);
        $pdf->SetTextColor(0, 0, 0);

        $pdf->SetY(66);
        $pdf->SetX(2);
        $pdf->Cell(10, 5, 'Item', 1, 0, 'C', 1);
        $pdf->Cell(120, 5, utf8_decode('Descripción'), 1, 0, 'C', 1);
        $pdf->Cell(15, 5, 'U.Med', 1, 0, 'C', 1);
        $pdf->Cell(15, 5, 'Cnt', 1, 0, 'C', 1);
        $pdf->Cell(26, 5, utf8_decode('Vr.Unitario'), 1, 0, 'C', 1);
        $pdf->Cell(26, 5, 'SubTotal', 1, 0, 'C', 1);
        $pdf->SetFont('Arial', '', 8);

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output("pdf/cotizaciones/cotizacion_V-.pdf", "F");
        $pdf->Output("cotizacion_.pdf", "I");
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
        $orden = $this->request->getPost('orden');
        $placa = $this->request->getPost('placa');
        $marca = $this->request->getPost('marca');
        $nFabrica = $this->request->getPost('nFabrica');
        $color = $this->request->getPost('color');
        $kms = $this->request->getPost('kms');
        $combustible = $this->request->getPost('combustible');
        $estado = $this->request->getPost('estado');
        $fechaEntrada = $this->request->getPost('fechaEntrada');
        $fechaSalida = $this->request->getPost('fechaSalida');
        $usuarioCrea = session('id');
        $fechaActual = date('Y-m-d');
        $tipoMov = 0;

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
            'fecha_salida' => $fechaSalida,
            'usuario_crea' => $usuarioCrea
        ];

        $estado == 38 ? $tipoMov = 58 : $tipoMov = 0;

        $dataMovimiento = [
            'id_tercero' => $cliente,
        ];


        if ($tp == 2) {
            if ($this->vehiculos->update($idVechiculo, $data)) {
                $this->movimiento->save($dataMovimiento); //Movimiento

                $res = $this->propietario->obtenerPropietario($idVechiculo);
                array_push($dataMovimiento, [
                    'estado' => $estado,
                    'id_vehiculo' => $idVechiculo,
                    'fecha_movimiento' => $fechaActual,
                    'tipo_movimiento' => $tipoMov
                ]);
                //Propietario
                $dataPropie = [
                    'id_vehiculo' => $idVechiculo,
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente
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

                $dataMovimiento = [
                    'id_tercero' => $cliente,
                    'id_vehiculo' => $idVechiulo,
                    'fecha_movimiento' => $fechaActual,
                    'estado' => $estado,
                    'tipo_movimiento' => 57,
                    'usuario_crea' => $usuarioCrea
                ];
                $dataPropie = [
                    'id_vehiculo' => $idVechiulo,
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente
                ];
                $this->movimiento->save($dataMovimiento); //Movimiento
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
    public function obtenerUltimaOrden()
    {
        $res = $this->vehiculos->obtenerUltimaOrden();
        return json_encode($res);
    }
    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        $res = $this->propietario->obtenerPropietario($id);

        $dataMovimiento = [
            'id_tercero' => $res['id_tercero'],
            'id_vehiculo' => $id,
            'estado' => $estado,
            'fecha_movimiento' => date('Y-m-d'),
            'tipo_movimiento' => $estado == 38 ? 58 : 59
        ];


        if ($this->vehiculos->update($id, ['estado' => $estado])) {
            $this->movimiento->save($dataMovimiento); //Movimiento
            return json_encode(1);
        } else {
            return json_encode(2);
        }
    }
}
