<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\EstanteriaModel;
use App\Models\ParamModel;
use App\Models\OrdenesModel;
use App\Models\MoviEncModel;
use App\Models\MoviDetModel;

class RepuestosAdmin extends BaseController
{
    protected $respuestosAdmin;
    protected $vehiculo;
    protected $proveedor;
    protected $bodegas;
    protected $movimientoEnc;
    protected $movimientoDet;
    protected $param;
    protected $ordenes;

    public function __construct()
    {
        $this->respuestosAdmin = new MaterialesModel();
        $this->vehiculo = new VehiculosModel();
        $this->proveedor = new TercerosModel();
        $this->bodegas = new EstanteriaModel();
        $this->param = new ParamModel();
        $this->ordenes = new OrdenesModel();
        $this->movimientoEnc = new MoviEncModel();
        $this->movimientoDet = new MoviDetModel();
    }
    public function index()
    {
        $proveedores = $this->proveedor->obtenerProveedores('A');
        $bodegas = $this->bodegas->obtenerBodega();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $data = ["ordenes" => $ordenes, "bodegas" => $bodegas, "proveedores" => $proveedores];
        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdmin', $data);
    }
    public function obtenerRepuestos()
    {

        $estado = $this->request->getPost('estado');
        $res = $this->respuestosAdmin->obtenerRepuestos($estado);
        return json_encode($res);
    }

    public function buscarRepuesto($id)
    {
        //$id = $this->request->getPost('id');
        $res = $this->respuestosAdmin->buscarRepuesto($id);
        return json_encode($res);
    }

    public function registrarObservacion()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        $observacion = $this->request->getPost('observacion');
        if ($this->respuestosAdmin->update($id, ['estado' => $estado, 'observacion' => $observacion])) {
            return json_encode(1);
        } else {
            return json_encode(2);
        }
    }

    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');
        $existencias = $this->request->getPost('existencias');
        $proveedor = $this->request->getPost('proveedor');
        $orden = $this->request->getPost('orden');
        $bodega = $this->request->getPost('bodega');
        $usuCrea = session('id');
        $dataRepuesto = [
            'nombre' => $nombre,
            'id_orden' => $orden,
            'id_proveedor' => $proveedor,
            'tipo_material' => 10,
            'cantidad_actual' => $existencias,
            'estante' => $bodega,
            'usuario_crea' => $usuCrea
        ];
        if ($tp == 2) {
            if ($this->respuestosAdmin->update($id, $dataRepuesto)) {
                return json_encode(1);
            } else {
                return json_encode(1);
            }
        } else {
            if ($this->respuestosAdmin->save($dataRepuesto)) {
                return json_encode(1);
            } else {
                return json_encode(1);
            }
        }
    }

    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        $idTra = $this->request->getPost('idTrab');
        $proveedor = $this->request->getPost('proveedor');
        $orden = $this->request->getPost('orden');
        $dataMovimientoenc = [
            'id_tercero' => $proveedor,
            'id_vehiculo' => $orden,
            'id_trabajador' => $idTra,
            'fecha_movimiento' => date('Y-m-d'),
            'tipo_movimiento' => 67,
            'estado' => $estado,
            'usuario_crea' => session('id'),
        ];

        if ($estado == 'A') {
            if ($this->respuestosAdmin->update($id, ['estado' => $estado, 'observacion' => null])) {
                return '¡Se ha reestablecido el Repuesto!';
            } else {
                return '¡Ha ocurrido un error!';
            }
        }
        if ($estado == 'C') {
            if ($this->movimientoEnc->save($dataMovimientoenc)) {
                $res = $this->respuestosAdmin->buscarRepuesto($id);
                $idEnc = $this->movimientoEnc->getInsertID();
                $dataMovimientodet = [
                    'id_movimientoenc' => $idEnc,
                    'id_material' => $id,
                    'cantidad' => $res['cantidad_actual'],
                    'costo' => 0,
                    'observacion' => $res['observacion'],
                    'usuario_crea' => session('id'),
                ];
                if ($this->movimientoDet->save($dataMovimientodet)) {
                    return json_encode(1);
                } else {
                    return json_encode(2);
                }
            } else {
                return json_encode(2);
            }
        } else {
            return json_encode(2);
        }
    }


    public function pendientes()
    {
        $proveedores = $this->proveedor->obtenerProveedores('A');
        $bodegas = $this->bodegas->obtenerBodega();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $data = ["ordenes" => $ordenes, "bodegas" => $bodegas, "proveedores" => $proveedores];
        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdminPendientes', $data);
    }

    public function confirmados()
    {
        $proveedores = $this->proveedor->obtenerProveedores('A');
        $bodegas = $this->bodegas->obtenerBodega();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $data = ["ordenes" => $ordenes, "bodegas" => $bodegas, "proveedores" => $proveedores];
        echo view('/principal/sidebar');
        echo view('/materiales/repuestosAdminConfirmados', $data);
    }
}
