<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MoviEncModel;
use App\Models\MoviDetModel;
use App\Models\MaterialesModel;
use App\Models\ParamModel;
use App\Models\VehiculosModel;
use App\Models\TrabajadoresModel;
use App\Models\OrdenesModel;
use App\Models\EstanteriaModel;


class OrdenEntrega extends BaseController
{

    protected $ordenEntrega, $movDet;
    protected $materiales;
    protected $trabajadores;
    protected $vehiculos;
    protected $ordenes;
    protected $tipo;
    protected $tipoCate;
    protected $estanteria;

    public function __construct()
    {

        $this->ordenEntrega = new MoviEncModel();
        $this->movDet = new MoviDetModel();
        $this->trabajadores = new TrabajadoresModel();
        $this->materiales = new MaterialesModel();
        $this->vehiculos = new VehiculosModel();
        $this->ordenes = new OrdenesModel();
        $this->tipo = new ParamModel();
        $this->tipoCate = new ParamModel();
        $this->estanteria = new EstanteriaModel();
    }

    public function obtenerOrdenEntrega()
    {

        $res = $this->ordenEntrega->ordenesEntrega();
        return json_encode($res);
    }

    public function buscarOrden($id)
    {
        $array = array();
        $res = $this->ordenEntrega->buscarOrden($id);
        array_push($array, $res);
        return json_encode($res);
    }
    public function buscarDetallesOrden($id)
    {
        $array = array();
        $res = $this->movDet->buscarDetallesOrden($id);
        array_push($array, $res);
        return json_encode($res);
    }
    public function buscarDetallesMaterial($id)
    {
        $array = array();
        $res = $this->materiales->buscarDetallesMaterial($id);
        array_push($array, $res);
        return json_encode($res);
    }

    public function index()
    {
        $trabajadores = $this->trabajadores->trabajadoresOrdenes();
        $materiales = $this->materiales->obtenerInsumo1();
        $tipo = $this->tipo->obtenerTipoMat();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $tipoCate = $this->tipo->obtenerCategoriasOrdenes();
        $estanteria = $this->estanteria->obtenerBodega();

        $data = ['trabajadores' => $trabajadores, 'tipo' => $tipo, 'tipoCate' => $tipoCate, 'ordenes' => $ordenes, 'materiales' => $materiales, 'estanteria' => $estanteria,];
        echo view('/principal/sidebar');
        echo view('/ordenEntrega/ordenEntrega', $data);
    }

    // public function detallesOrden($id)
    // {
    //     $returnData = array();
    //     $ordenEntrega_ = $this->ordenEntrega->traerDetalles($id);
    //     if (!empty($ordenEntrega_)) {
    //         array_push($returnData, $ordenEntrega_);
    //     }
    //     echo json_encode($returnData);
    // }
    public function buscarCate()
    {
        $tipoCate = $this->request->getPost('idTipoCate');

        if ($tipoCate == 9) {
            $res = $this->tipoCate->obtenerCategorias();

            return json_encode($res);
        } else {
            $res = $this->estanteria->traerBodega();
            return json_encode($res);
        }
    }
    public function buscarMateriales()
    {
        $tipoMat = $this->request->getPost('tipo');
        $id = $this->request->getPost('id');

        if ($tipoMat == 9) {
            $res = $this->materiales->obtenerInsumo($id);
        } else {
            $res = $this->materiales->obtenerRepuestoBodega($id);
        }
        return json_encode($res);
    }

    public function insertar()
    {
        date_default_timezone_set('America/Bogota');
        $tp = $this->request->getPost('tp');
        $idOrden = $this->request->getPost('id');
        $ordenServicio = $this->request->getPost('ordenServicio');
        $ordenesEnt = $this->request->getPost('ordenesEnt');
        $trabajador = $this->request->getPost('trabajador');
        $tipoMov = 68;
        $fechaMov = date("Y-m-d H:i:s");

        $dataEncOrden = [
            'id_vehiculo' => $ordenServicio,
            'id_trabajador' => $trabajador,
            'fecha_movimiento' => $fechaMov,
            'tipo_movimiento' => $tipoMov,
            'usuario_crea' => session('id')
        ];

        if ($tp == 2) {
            if ($this->ordenEntrega->update($idOrden, $dataEncOrden)) {
                return json_encode($idOrden);
            } else {
                return json_encode(0);
            }
        } else {
            if ($this->ordenEntrega->save($dataEncOrden)) {
                return json_encode($this->ordenEntrega->getInsertID());
            } else {
                return json_encode(0);
            }
        }
    }
    public function insertarDet()
    {
        $tp = $this->request->getPost('tp');
        $idMovDet = $this->request->getPost('idMovDet');
        $idMovEnc = $this->request->getPost('idMovEnc');
        $idMat = $this->request->getPost('idMaterial');
        $item = $this->request->getPost('item');
        $cantidad = $this->request->getPost('cantidad');
        $subtotal = $this->request->getPost('subtotal');

        $dataDetMov = [
            'id_movimientoenc' => $idMovEnc,
            'id_material' => $idMat,
            'item' => $item,
            'cantidad' => $cantidad,
            'costo' => $subtotal,
            'usuario_crea' => session('id')
        ];

        $res2 = $this->materiales->buscarInsumo($idMat, '');
        
        if ($tp == 2) {
            $res = $this->movDet->buscarDetalles($idMovDet);
            if ($res == null) {
                $nuevaCant = $res2['cantidad_actual'] - $cantidad;
                $this->materiales->update($idMat, [
                    'cantidad_actual' => $nuevaCant,
                    'cantidad_antigua' => $res2['cantidad_actual']
                ]);
                if ($this->movDet->save($dataDetMov)) {
                    return json_encode(['tipo' => 1, 'total' => $cantidad]);
                } else {
                    return json_encode(2);
                }
            } else {
                if ($this->movDet->update($idMovDet, $dataDetMov)) {
                    if($cantidad < $res['cantidad'] ){
                        return json_encode(['tipo' => 2, 'total' => intval($res['cantidad'] - $cantidad)]);
                    }else if($cantidad > $res['cantidad']){
                        return json_encode(['tipo' => 1, 'total' => intval($cantidad) - intval($res['cantidad'])]);
                    }
                } else {
                    return json_encode(2);
                }
            }
        } else {
            $nuevaCant = $res2['cantidad_actual'] - $cantidad;
            $this->materiales->update($idMat, [
                'cantidad_actual' => $nuevaCant,
                'cantidad_antigua' => $res2['cantidad_actual']
            ]);

            if ($this->movDet->save($dataDetMov)) {
                return json_encode(['tipo' => 1, 'total' => $cantidad]);
            } else {
                return json_encode(2);
            }
        }
    }

    public function eliminarMaterial($idMov)
    {
        $res = $this->movDet->buscarDetalles($idMov);
        if ($this->movDet->delete($idMov)) {
            return json_encode($res['cantidad']);
        }
    }
}
