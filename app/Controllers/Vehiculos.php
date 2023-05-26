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
    public function pdf($id)
    {
        $res = $this->vehiculos->buscarVehiculo('', '', $id);
        //TODO: CAMBIAR AUTOLOAD AL MONTAR EN HOSTING
        $mrg_tp = 5;
        $mrg_lf = 5;
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(5, 10, 5);
        $pdf->SetTitle(utf8_decode('Ordén de Trabajo - ' . $res['n_orden']));
        $pdf->SetY(5);
        $pdf->SetX(35);
        $pdf->image(base_url() . 'img/logo_empresa.png', 2, $mrg_lf, 50, 18, 'png');

        $pdf->SetFont('Arial', 'B', 5);
        $pdf->SetY(23);
        $pdf->SetX(18);
        // $pdf->SetXY(18, 23);
        $pdf->Cell(10, 0, 'NIT: 802.001.848 - 2 ', 0, 1, 'L');

        $pdf->SetY(25);
        $pdf->SetX(8);
        $pdf->Cell(10, 0, 'Cra 52 No. 70 - 110 Tels: 3585445 * Fax: 3583180', 0, 1, 'L');

        $pdf->SetY(27);
        $pdf->SetX(2);
        $pdf->Cell(10, 0, 'E-mail:Ingecosmos@metrotel.net.co Barranquilla - Colombia', 0, 1, 'L');

        $pdf->Rect($mrg_lf - 3, $mrg_tp, 212, $mrg_tp + 19, '');
        $pdf->line($mrg_lf + 50, $mrg_tp, $mrg_lf + 50, $mrg_tp + 64); //Linea despues de logo

        $pdf->SetFont('Arial', 'B', 12);

        $pdf->SetY(2);
        $pdf->SetX(60);
        $pdf->Cell(10, 25, 'FECHA DE ENTRADA', 0, 1, 'L');
        $pdf->line(110, $mrg_tp, 110, $mrg_tp + 24); //Linea despues de fecha entrada

        $pdf->SetY(8);
        $pdf->SetX(70);
        $pdf->Cell(10, 25, '' . $res['fecha_entrada'] . '', 0, 1, 'L');

        $pdf->SetY(2);
        $pdf->SetX(117);
        $pdf->Cell(10, 25, 'FECHA DE SALIDA', 0, 1, 'L');
        $pdf->line(165, $mrg_tp, 165, $mrg_tp + 24);//Linea despues de fecha salida
        $pdf->SetY($mrg_tp + 8);

        $pdf->SetY(8);
        $pdf->SetX(127);
        $pdf->Cell(10, 25, '' . $res['fecha_salida'] . '', 0, 1, 'L');

        $pdf->SetY($mrg_tp + 7);
        $pdf->SetX(167);
        $pdf->Cell(10, 5, 'ORDEN DE TRABAJO', 0, 1, 'L');

        $pdf->SetX(175);
        $pdf->Cell(10, 5, 'No. ' . $res['n_orden'], 0, 1, 'L');

        /*****  Detalles orden de trabajo *****/
        
        /***** PRIMER RECUADRO ******/
        $pdf->Rect(2, 29, 108, 40, '');
        // ---PROPIETARIO
        $pdf->SetY(29);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'PROPIETARIO', 0, 1, 'L');
        $pdf->line(2, 34, 110, 34);
        
        $pdf->SetY(34);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $res['tipo_tercero'] == 5 ? $res['nomCliente'] : $res['razon_social'] .  '', 0, 1, 'L');
        $pdf->line(2, 39, 110, 39);
        
        // ---CC O NIT
        $pdf->SetY(39);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, 'C.C. o NIT', 0, 1, 'L');
        $pdf->line(2, 44, 110, 44);

        $pdf->SetY(44);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $res['identificacion'] . '', 0, 1, 'L');
        $pdf->line(2, 49, 110, 49);

        // ---DIRECCION
        $pdf->SetY(49);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, 'DIRECCION', 0, 1, 'L');
        $pdf->line(2, 54, 110, 54);

        $pdf->SetY(54);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $res['direccion'] . '', 0, 1, 'L');
        $pdf->line(2, 59, 110, 59);

        // ---TELEFONO
        $pdf->SetY(59);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, 'TELEFONO', 0, 1, 'L');
        $pdf->line(2, 64, 110, 64);

        $pdf->SetY(64);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '3004432536', 0, 1, 'L');
        
        
        
        /***** SEGUNDO RECUADRO ******/
        $pdf->line(71, 29, 71, 69);

        // ---MARCA
        $pdf->SetY(29);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'MARCA', 0, 1, 'L');

        $pdf->SetY(29);
        $pdf->SetX(73);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, ''. $res['marca'] .'', 0, 1, 'L');

        // ---TIPO
        $pdf->SetY(34);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'TIPO', 0, 1, 'L');

        // ---No. FAB
        $pdf->SetY(39);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'No. FAB', 0, 1, 'L');

        $pdf->SetY(39);
        $pdf->SetX(73);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, ''. $res['modelo'] .'', 0, 1, 'L');

        // ---MOTOR
        $pdf->SetY(44);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'MOTOR', 0, 1, 'L');
        
        // ---CHASIS
        $pdf->SetY(49);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'CHASIS', 0, 1, 'L');

        // ---COLOR
        $pdf->SetY(54);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'COLOR', 0, 1, 'L');

        $pdf->SetY(54);
        $pdf->SetX(73);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, ''. $res['color'] .'', 0, 1, 'L');

        // ---PLACA
        $pdf->SetY(59);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'PLACA', 0, 1, 'L');

        $pdf->SetY(59);
        $pdf->SetX(73);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, ''. $res['placa'] .'', 0, 1, 'L');

        // ---KMS
        $pdf->SetY(64);
        $pdf->SetX(55);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'KMS', 0, 1, 'L');

        $pdf->SetY(64);
        $pdf->SetX(73);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, ''. $res['kms'] .'', 0, 1, 'L');

        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('PDFS/orden_trabajo_' . $res['n_orden'] . '.pdf', "F");
        $pdf->Output('orden_trabajo_' . $res['n_orden'] . '.pdf', "I");
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

        $nombreRespon = $this->request->getPost('nombreRespon');
        $apellidoRespon = $this->request->getPost('apellidoRespon');
        $tipoDocRes = $this->request->getPost('tipoDocRes');
        $nIdentiRes = $this->request->getPost('nIdentiRes');

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
                
                $res = $this->propietario->obtenerPropietario($idVechiculo);
                array_push($dataMovimiento, [
                    'estado' => $estado,
                    'id_vehiculo' => $idVechiculo,
                    'fecha_movimiento' => $fechaActual,
                    'tipo_movimiento' => $tipoMov
                ]);
                $this->movimiento->save($dataMovimiento); //Movimiento
                //Propietario
                $dataPropie = [
                    'id_vehiculo' => $idVechiculo,
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente,
                    'nombres' => $tipoCliente != 5 ? $nombreRespon : null,
                    'apellidos' => $tipoCliente != 5 ? $apellidoRespon : null ,
                    'n_identificacion' => $tipoCliente != 5 ? $nIdentiRes : null ,
                    // 'apellidos' => $tipoCliente != 5 ? $apellidoRespon : null 
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
                    'tipo_propietario' => $tipoCliente,
                    'nombres' => $tipoCliente != 5 ? $nombreRespon : null,
                    'apellidos' => $tipoCliente != 5 ? $apellidoRespon : null, 
                    'n_identificacion' => $tipoCliente != 5 ? $nIdentiRes : null
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
