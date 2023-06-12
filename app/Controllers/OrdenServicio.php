<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\MarcasModel;
use App\Models\ParamModel;
use App\Models\PropietariosModel;
use App\Models\MoviEncModel;
use App\Models\OrdenesModel;
use App\Models\TelefonosModel;
use App\Models\EmailModel;
use App\Models\InvOrdenesModel;

class OrdenServicio extends BaseController
{
    protected $vehiculos;
    protected $clientes;
    protected $marcas;
    protected $param;
    protected $propietario;
    protected $movimiento;
    protected $ordenes;
    protected $telefono;
    protected $email;
    protected $inventario;
    protected $movEnc;
    public function __construct()
    {
        $this->vehiculos = new VehiculosModel();
        $this->ordenes = new OrdenesModel();
        $this->clientes = new TercerosModel();
        $this->marcas = new MarcasModel();
        $this->param = new ParamModel();
        $this->propietario = new PropietariosModel();
        $this->movimiento = new MoviEncModel();
        $this->telefono = new TelefonosModel();
        $this->email = new EmailModel();
        $this->inventario = new InvOrdenesModel();
        helper('sistema');
    }
    public function pdf($id)
    {
        $res = $this->ordenes->buscarOrden('', '', $id);
        $telefono = $this->telefono->TelefonoPrincipal($res['cliente'], $res['tipo_propietario']);
        $email = $this->email->EmailPrincipal($res['cliente'], $res['tipo_propietario']);
        $inven = $this->inventario->buscarInventario($id);
        $materiales = $this->movimiento->buscarDetEnc($id);
        //TODO: CAMBIAR AUTOLOAD AL MONTAR EN HOSTING
        // rgb(2, 2, 104)
        $mrg_tp = 5;
        $mrg_lf = 5;
        $pdf = new \FPDF('P', 'mm', 'letter');
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 5);
        $pdf->SetTextColor(2, 2, 104);
        $pdf->SetFillColor(2, 2, 104);

        $pdf->SetTitle(utf8_decode('Orden de Servicio - ' . $res['n_orden']));

        /* --- HEADER DOCUMENTOS ---*/
        $pdf->SetY(2);
        $pdf->SetX(35);
        $pdf->Image(base_url() . 'img/logo_empresa.png', 2, $mrg_lf, 45, 18, 'png');

        $pdf->RoundedRect($mrg_lf - 3, $mrg_tp, 212, $mrg_tp + 14, 2);

        $pdf->setFont('Arial', 'B', 15);
        $pdf->SetY(2);
        $pdf->SetX(80);
        $pdf->Cell(10, 25, 'ORDEN DE SERVICIO', 0, 1, 'L');

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetY($mrg_tp + 3);
        $pdf->SetX(180);
        $pdf->Cell(10, 0, 'Nit. 802.001.848-2 ', 0, 1, 'L');

        $pdf->SetY(12);
        $pdf->SetX(160);
        $pdf->Cell(10, 0, utf8_decode('Dirección: Cra 52 No. 70 - 110'), 0, 1, 'L');

        $pdf->SetY(16);
        $pdf->SetX(181.7);
        $pdf->Cell(10, 0, 'Celular: 3585445', 0, 1, 'L');

        $pdf->SetY(20);
        $pdf->SetX(152.5);
        $pdf->Cell(10, 0, 'Email: ingecosmosltd@gmail.com', 0, 1, 'L');

        /*****  Detalles orden de trabajo *****/

        /* --- PRIMER RECUADRO --- */
        $pdf->RoundedRect(2, 25, 120, 38, 2);

        $pdf->SetY(25);
        $pdf->SetX(35);
        $pdf->Cell(25, 5, 'DATOS DEL VEHICULO', 0, 1, 'L');
        $pdf->line(2, 29.5, 122, 29.5);

        // ---PROPIETARIO
        $pdf->SetY(31);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(25, 5, 'Nombre:', 0, 1, 'L');
        $pdf->line(18, 35, 116, 35);

        $pdf->SetY(31);
        $pdf->SetX(19);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5,  utf8_decode($res['tipo_propietario'] == 5 ? $res['nomCliente'] . ' - Cliente' : $res['nomAliado'] . ' - ' . $res['razon_social']), 0, 1, 'L');

        // ---CC O NIT
        $pdf->SetY(37);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, 'C.C. - NIT:', 0, 1, 'L');
        $pdf->line(21, 41, 116, 41);

        $pdf->SetY(37);
        $pdf->SetX(22);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, $res['tipo_propietario'] == 5 ? $res['idenCliente'] : $res['n_identificacion'], 0, 1, 'L');

        // ---DIRECCION
        $pdf->SetY(43);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, utf8_decode('Dirección:'), 0, 1, 'L');
        $pdf->line(21, 47, 116, 47);

        $pdf->SetY(43);
        $pdf->SetX(22);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5,  utf8_decode($res['direccion']), 0, 1, 'L');

        // ---TELEFONO
        $pdf->SetY(49);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, utf8_decode('Teléfono:'), 0, 1, 'L');
        $pdf->line(20, 53, 116, 53);

        $pdf->SetY(49);
        $pdf->SetX(21);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $telefono['numero'] . '', 0, 1, 'L');

        // ---EMAIL
        $pdf->SetY(55);
        $pdf->SetX(2);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(2, 5, 'E-Mail:', 0, 1, 'L');
        $pdf->line(16, 59, 116, 59);

        $pdf->SetY(55);
        $pdf->SetX(17);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $email['correo'] . '', 0, 1, 'L');

        // /* --- SEGUNDO RECUADRO --- */
        $pdf->RoundedRect(123, 25, 91, 30, 2);

        $pdf->SetY(25);
        $pdf->SetX(145);
        $pdf->setFont('Arial', 'B', '10');
        $pdf->Cell(25, 5, 'DATOS ORDEN DE SERVICIO', 0, 1, 'L');
        $pdf->line(123, 29.5, 214, 29.5);

        //Numero de Orden
        $pdf->SetY(31);
        $pdf->SetX(124);
        $pdf->setFont('Arial', 'B', '13');
        $pdf->Cell(25, 5, utf8_decode('N° Orden'), 0, 1, 'L');

        $pdf->SetY(31);
        $pdf->SetX(170);
        $pdf->Cell(2, 5, '' . $res['n_orden'] . '', 0, 1, 'L');

        //Fecha de entrada
        $pdf->SetY(37);
        $pdf->SetX(124);
        $pdf->setFont('Arial', '', '10');
        $pdf->Cell(25, 5, 'FECHA INGRESO', 0, 1, 'L');

        $pdf->SetY(37);
        $pdf->SetX(170);
        $pdf->Cell(2, 5, '' . $res['fecha_entrada'] . '', 0, 1, 'L');

        //Fecha de salida
        $pdf->SetY(43);
        $pdf->SetX(124);
        $pdf->Cell(25, 5, 'FECHA SALIDA', 0, 1, 'L');

        $pdf->SetY(43);
        $pdf->SetX(170);
        $pdf->Cell(2, 5, '' . $res['fecha_salida'] . '', 0, 1, 'L');

        $pdf->SetY(49);
        $pdf->SetX(124);
        $pdf->Cell(25, 5, utf8_decode('INGRESO EN GRÚA'), 0, 1, 'L');

        $pdf->SetY(49);
        $pdf->SetX(170);
        $pdf->Cell(25, 5,  $inven[0]['checked'] == 'true' ? 'SI' : 'NO', 0, 1, 'L');

        /* --- TERCER RECUADRO --- */
        $pdf->RoundedRect(123, 56, 91, 7, 2);

        $pdf->SetY(57);
        $pdf->SetX(131);
        $pdf->Cell(25, 5,  $inven[1]['checked'] == 'true' ? 'Llaves(   ' . 'SI' . '   )' : 'Llaves(   ' . 'NO' . '   )', 0, 1, 'L');

        $pdf->SetY(57);
        $pdf->SetX(160);
        $pdf->Cell(25, 5, $inven[2]['checked'] == 'true' ? 'Documentos(   ' . 'SI' . '   )' : 'Llaves(   ' . 'NO' . '   )', 0, 1, 'L');

        /* --- CUARTO RECUADRO --- */
        $pdf->RoundedRect(2, 64, 212, 20, 2);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetXY(87, 64);
        $pdf->Cell(25, 5, 'DATOS DEL VEHICULO', 0, 1, 'L');
        $pdf->line(2, 68.5, 214, 68.5);

        $pdf->SetFont('Arial', '', 10);
        // ---MARCA
        $pdf->SetXY(12, 68.5);
        $pdf->Cell(25, 5, 'MARCA', 0, 1, 'L');

        $pdf->SetY(74);
        $pdf->SetX(7);
        $pdf->MultiCell(25, 5, $res['marca'], 0, 'C', false);

        $pdf->SetXY(50, 68.5);
        $pdf->Cell(25, 5, 'TIPO', 0, 1, 'L');

        // ---MODELO
        $pdf->SetXY(82, 68.5);
        $pdf->Cell(25, 5, 'MODELO', 0, 1, 'L');

        $pdf->SetY(76);
        $pdf->SetX(85);
        $pdf->Cell(2, 5, '' . $res['modelo'] . '', 0, 1, 'L');

        // ---COLOR
        $pdf->SetXY(118, 68.5);
        $pdf->Cell(25, 5, 'COLOR', 0, 1, 'L');

        $pdf->SetY(76);
        $pdf->SetX(118);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $res['color'] . '', 0, 1, 'L');

        // ---PLACA
        $pdf->SetXY(154, 68.5);
        $pdf->Cell(25, 5, 'PLACA', 0, 1, 'L');

        $pdf->SetY(76);
        $pdf->SetX(155);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $res['placa'] . '', 0, 1, 'L');

        // ---KMS
        $pdf->SetXY(183, 68.5);
        $pdf->Cell(25, 5, 'KILOMETRAJE', 0, 1, 'L');

        $pdf->SetY(76);
        $pdf->SetX(187);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(2, 5, '' . $res['kms'] . '', 0, 1, 'L');

        $pdf->line(2, 73, 214, 73);

        $pdf->line(37.3, 68.5, 37.3, 84);
        $pdf->line(72.6, 68.5, 72.6, 84);
        $pdf->line(107.9, 68.5, 107.9, 84);
        $pdf->line(143.2, 68.5, 143.2, 84);
        $pdf->line(178.5, 68.5, 178.5, 84);

        /* --- INVENTARIO VEHICULO --- */
        $pdf->RoundedRect(2, 85, 212, 70, 2);
        $pdf->line(2, 89.5, 214, 89.5);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetXY(84, 85);
        $pdf->Cell(25, 5, 'INVENTARIO DEL VEHICULO', 0, 1, 'L');

        $pdf->Image(base_url() . 'img/vista_auto_pdf.png', -10, 93, 75, 65, 'png');
        $pdf->line(60, 89.5, 60, 155);

        $xIni = 60;
        $yIni = 80;
        $contador = 0;

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetXY($xIni + 30.5, $yIni + 9.8);
        $pdf->Cell(25, 5, 'B', 0, 1, 'L');
        $pdf->SetXY($xIni + 35.5, $yIni + 9.8);
        $pdf->Cell(25, 5, 'R', 0, 1, 'L');
        $pdf->SetXY($xIni + 40.5, $yIni + 9.8);
        $pdf->Cell(25, 5, 'G', 0, 1, 'L');

        $pdf->SetFont('Arial', '', 10);
        foreach ($inven as $inv) {
            $contador =  $contador + 1;
            if ($contador == 15) {
                $xIni = 110;
                $yIni = 94.5;
            } else if ($contador == 26) {
                $xIni = 160;
                $yIni = 94.5;
            }
            $pdf->SetXY($xIni, $yIni);
            $pdf->Cell(25, 5, $inv['item'] == 'Grua' ? '' : ($inv['item'] == 'Documentos' ? '' : ($inv['item'] == 'Llaves' ? '' : ($inv['item'] == 'TipoCombustible' ? '' : $inv['item']))), 0, 1, 'L');
            $pdf->SetXY($xIni + 30, $yIni);
            $inv['item'] == 'Grua' ? '' : ($inv['item'] == 'Documentos' ? '' : ($inv['item'] == 'Llaves' ? '' : ($inv['item'] == 'TipoCombustible' ? '' : ($pdf->Rect($xIni + 31, $yIni, 4, 4, $inv['checked'] == 1 ? 'F' : '')))));
            $inv['item'] == 'Grua' ? '' : ($inv['item'] == 'Documentos' ? '' : ($inv['item'] == 'Llaves' ? '' : ($inv['item'] == 'TipoCombustible' ? '' : ($pdf->Rect($xIni + 36, $yIni, 4, 4, $inv['checked'] == 2 ? 'F' : '')))));
            $inv['item'] == 'Grua' ? '' : ($inv['item'] == 'Documentos' ? '' : ($inv['item'] == 'Llaves' ? '' : ($inv['item'] == 'TipoCombustible' ? '' : ($pdf->Rect($xIni + 41, $yIni, 4, 4, $inv['checked'] == 3 ? 'F' : '')))));
            $pdf->SetXY($xIni + 22, $yIni);
            $inv['item'] == 'Grua' ? '' : ($inv['item'] == 'Documentos' ? '' : ($inv['item'] == 'Llaves' ? '' : ($inv['item'] == 'TipoCombustible' ? '' : ($pdf->Cell(25, 5, $inv['cantidad'] == 0 ? '' : '( ' . $inv['cantidad'] . ' )', 0, 1, 'L')))));

            $inv['item'] == 'Grua' ? '' : ($inv['item'] == 'Documentos' ? '' : ($inv['item'] == 'Llaves' ? '' : ($inv['item'] == 'TipoCombustible' ? '' : ($pdf->Rect($xIni + 41, $yIni, 4, 4, $inv['checked'] == 3 ? 'F' : '')))));

            $yIni =  $yIni + 5;
        }

        /* --- RADAR COMBUSTIBLE ---- */
        $pdf->Image(base_url() . 'img/radar_combustible.png', 155, 105, 60, 40, 'png');
        $pdf->SetXY(160, 138);
        $pdf->Cell(2, 5, 'ID', 0, 1, 'L');
        $pdf->Rect(165, 137, 8, 6, $inven[29]['checked'] == 1 ? 'F' : '');
        $pdf->SetXY(160, 146);
        $pdf->Cell(2, 5, 'IT', 0, 1, 'L');
        $pdf->Rect(165, 145, 8, 6, $inven[29]['checked'] == 2 ? 'F' : '');
        $pdf->SetXY(182, 146);
        $pdf->Cell(2, 5, 'R', 0, 1, 'L');
        $pdf->Rect(180, 140, 8, 6, $inven[29]['checked'] == 3 ? 'F' : '');
        $pdf->SetXY(203, 138);
        $pdf->Cell(2, 5, 'DD', 0, 1, 'L');
        $pdf->Rect(195, 137, 8, 6, $inven[29]['checked'] == 4 ? 'F' : '');
        $pdf->SetXY(203, 146);
        $pdf->Cell(2, 5, 'DT', 0, 1, 'L');
        $pdf->Rect(195, 145, 8, 6, $inven[29]['checked'] == 5 ? 'F' : '');

        /* --- OBERVACIONES --- */
        $pdf->RoundedRect(2, 156, 212, 84, 2);
        $pdf->line(2, 160.5, 214, 160.5);

        $pdf->SetFont('Arial', 'B', 10);
        $pdf->SetXY(90, 158);
        $pdf->Cell(25, 1, 'OBSERVACIONES', 0, 1, 'L');

        $pdf->SetFont('Arial', '', 10);
        $pdf->SetXY(2, 153);
        $pdf->Cell(90, 20, 'Se utilizaron los siguientes materiales:', 0, 'J', false);

        $yLine = 165;
        for ($i = 0; $i < 15; $i++) {
            $pdf->line(2, $yLine, 214, $yLine);
            $yLine = $yLine + 5;
        }

        $xIni = 2;
        $yIni = 158;
        foreach ($materiales as $mats) {
            $pdf->SetXY($xIni, $yIni);
            $pdf->MultiCell(90, 20, 'Material: ' . $mats['nombre'] . ' - Cantidad:' . $mats['cantidad'] . ' - Fecha: ' . $mats['fecha_movimiento'] . ' ', 0, 'J', false);
            $yIni =  $yIni + 5;
        }

        $pdf->SetFont('Arial', '', 8);
        /* --- FIRMA --- */
        $pdf->RoundedRect(153, 241, 61, 35, 2);
        $pdf->SetXY(153, 242);
        $pdf->MultiCell(61, 3, utf8_decode('ACEPTO LAS CONDICIONES INDICADAS EN ESTA ORDEN DE SERVICIO'), 0, 'C', false);
        $pdf->SetAutoPageBreak(false);
        $pdf->line(155, 270, 212, 270);
        $pdf->SetXY(175, 272);
        $pdf->Cell(90, 1, 'CLIENTES', 0, 'J', false);
        
        /* --- TERMINOS Y CONDICIONES --- */
        $pdf->SetFont('Arial', 'B', 6.5);
        $pdf->RoundedRect(2, 241, 150, 35, 2);
        $pdf->SetXY(2, 243);
        $pdf->Cell(90, 1, 'CONDICIONES:', 0, 'J', false);
        $pdf->SetXY(2, 246);
        $pdf->Cell(90, 1, utf8_decode('1. Los materiales y plazos de repuestos son suministrados por la empresa, salvo estipulación en el contrado.'), 0, 'J', false);
        $pdf->SetXY(2, 248.5);
        $pdf->Cell(90, 1, utf8_decode('2. La empresa queda autorizada para efectuar las pruebas necesarias del vehiculo fuera del taller.'), 0, 'J', false);
        $pdf->SetXY(2, 250.5);
        $pdf->MultiCell(150, 2.2, utf8_decode('3. La empresa no responde en ningún caso por objetos en el vehiculo, salvo que se hubieran entregado bajo recibo a la Gerencia.'), 0, 'J', false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetXY(2, 253);
        $pdf->MultiCell(150, 2.2, utf8_decode('4. En caso de fuerza mayor o caso fortuito la empresa no responde por perdidas o deterioro en los vehiculos o de los objetos dejado en su cuidado.'), 0, 'L', false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetXY(2, 257.5);
        $pdf->MultiCell(150, 2.2, utf8_decode('5. La empresa queda facultada para ejercer el derecho de retención de vehiculo mientras este pendiente a la cancelación de la cuenta.'), 0, 'L', false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetXY(2, 260);
        $pdf->MultiCell(150, 2.2, utf8_decode('6. Todo vehiculo cancelará la suma de  $5.000 pesos diarios por concepto de parqueo a partir del dia siguiente en que de terminado al trabjo su propietario no lo retire de los talleres de la empresa, o si luego de 5 días del presupuesto del daño, su recuperación no ha sido autorizada.'), 0, 'L', false);
        $pdf->SetAutoPageBreak(false);
        $pdf->SetXY(3, 268);
        $pdf->MultiCell(150, 2.2, utf8_decode('Autorizo a INGECOSMOS LTDA, a consultar, reportar o informar a cualquier control de riesgos más daños personales contenidos en la presente Orden de Servicio así como el trabajo d elas obligaciones contraídas con dica empresa.'), 0, 'L', false);
        




        $this->response->setHeader('Content-Type', 'application/pdf');
        $pdf->Output('PDFS/orden_servicio_' . $res['n_orden'] . '.pdf', "F");
        $pdf->Output('orden_servicio_' . $res['n_orden'] . '.pdf', "I");
    }
    public function obtenerOrdenes()
    {
        $res = $this->ordenes->obtenerOrdenes();
        return json_encode($res);
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
        echo view('ordenServicio/ordenes', $data);
    }
    public function buscarOrden()
    {
        $orden = $this->request->getPost('orden');
        $placa = $this->request->getPost('placa');
        $id = $this->request->getPost('id');
        if ($orden != '') {
            $res = $this->ordenes->buscarOrden($orden, '', 0);
            return json_encode($res);
        } else if ($placa != '') {
            $res = $this->ordenes->buscarOrden('', $placa, 0);
            return json_encode($res);
        } else if ($id != 0) {
            $res = $this->ordenes->buscarOrden('', '', $id);
            return json_encode($res);
        }
    }
    public function insertar()
    {
        $aggVehi = $this->request->getPost('aggVehi');
        $tp = $this->request->getPost('tp');
        $idOrden = $this->request->getPost('id');
        $tipoCliente = $this->request->getPost('tipoCliente');
        $cliente = $this->request->getPost('cliente');

        $nombreRespon = $this->request->getPost('nombreRespon');
        $apellidoRespon = $this->request->getPost('apellidoRespon');
        $tipoDocRes = $this->request->getPost('tipoDocRes');
        $nIdentiRes = $this->request->getPost('nIdentiRes');

        $vehiculo = $this->request->getVar('vehiculo');

        //Vehiculo nuevo
        $infoVehi = $this->request->getPost('infoVehi');

        $orden = $this->request->getPost('orden');

        $estado = $this->request->getPost('estado');

        $fechaEntrada = $this->request->getPost('fechaEntrada');
        $fechaSalida = $this->request->getPost('fechaSalida');
        $usuarioCrea = session('id');
        $fechaActual = date('Y-m-d');
        $tipoMov = 0;


        $estado == 38 ? $tipoMov = 58 : $tipoMov = 0;

        $dataMovimiento = [
            'id_tercero' => $cliente,
        ];

        if ($aggVehi != 0) {
            // Agregar vehiculo
            $dataVehi = [
                'id_marca' => $infoVehi['marca'],
                'placa' => $vehiculo,
                'linea' => '',
                'modelo' => $infoVehi['nFabrica'],
                'color' => $infoVehi['color'],
                'kms' => $infoVehi['kms'],
                'n_combustible' => $infoVehi['combustible'],
                'estado' => 'A',
                'usuario_crea' => $usuarioCrea
            ];
            $this->vehiculos->save($dataVehi);
            $vehiculo = $this->vehiculos->getInsertID();
        }
        $dataOrden = [
            'n_orden' => $orden,
            'id_vehiculo' => $vehiculo,
            'nombres' => empty($nombreRespon) || $tipoCliente == 5 ? null : $nombreRespon,
            'apellidos' =>  empty($apellidoRespon) || $tipoCliente == 5 ? null : $apellidoRespon,
            'n_identificacion' =>  empty($nIdentiRes) || $tipoCliente == 5 ? null : $nIdentiRes,
            'estado' => $estado,
            'fecha_entrada' => $fechaEntrada,
            'fecha_salida' => $fechaSalida,
            'usuario_crea' => $usuarioCrea
        ];

        if ($tp == 2) {
            if ($this->ordenes->update($idOrden, $dataOrden)) {

                $res = $this->propietario->obtenerPropietario($vehiculo);
                $dataPropie = [
                    'id_vehiculo' => $vehiculo,
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente,

                ];
                if (empty($res)) {
                    //Propietario
                    if ($this->propietario->save($dataPropie)) {
                        array_push($dataMovimiento, [
                            'estado' => $estado,
                            'id_vehiculo' => $vehiculo,
                            'fecha_movimiento' => $fechaActual,
                            'tipo_movimiento' => $tipoMov
                        ]);
                        $this->movimiento->save($dataMovimiento); //Movimiento
                        return json_encode($idOrden);
                    } else {
                        return json_encode(2);
                    }
                } else {
                    if ($this->propietario->update($res['id_propietario'], $dataPropie)) {
                        return json_encode($idOrden);
                    } else {
                        return json_encode(2);
                    }
                }
            }
        } else {
            if ($this->ordenes->save($dataOrden)) {
                $dataPropie = [
                    'id_vehiculo' => $vehiculo,
                    'id_tercero' => $cliente,
                    'tipo_propietario' => $tipoCliente
                ];
                $res = $this->propietario->obtenerPropietario($vehiculo);
                if (!empty($res)) {
                    return json_encode($this->ordenes->getInsertID());
                } else {
                    if ($this->propietario->save($dataPropie)) {
                        $dataMovimiento = [
                            'id_tercero' => $cliente,
                            'id_vehiculo' => $vehiculo,
                            'fecha_movimiento' => $fechaActual,
                            'estado' => $estado,
                            'tipo_movimiento' => 57,
                            'usuario_crea' => $usuarioCrea
                        ];
                        $this->movimiento->save($dataMovimiento); //Movimiento
                        return json_encode($this->ordenes->getInsertID());
                    }
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
        $res = $this->ordenes->obtenerUltimaOrden();
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


        if ($this->ordenes->update($id, ['estado' => $estado])) {
            $this->movimiento->save($dataMovimiento); //Movimiento
            return json_encode(1);
        } else {
            return json_encode(2);
        }
    }
}
