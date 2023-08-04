<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TercerosModel;
use App\Models\EstanteriaModel;
use App\Models\ParamModel;
use App\Models\MoviEncModel;
use App\Models\MoviDetModel;

class InsumosAdmin extends BaseController
{
    protected $insumos;
    protected $placa;
    protected $razonSocial;
    protected $estantes;
    protected $param;
    protected $movEnc;
    protected $movDet;

    public function __construct()
    {
        $this->insumos = new MaterialesModel();
        $this->placa = new VehiculosModel();
        $this->razonSocial = new TercerosModel();
        $this->estantes = new EstanteriaModel();
        $this->param = new ParamModel();
        $this->movEnc = new MoviEncModel();
        $this->movDet = new MoviDetModel();
    }
    public function index()
    {
        $categorias = $this->param->obtenerCategorias();
        $estantes = $this->estantes->traerEstantes();
        $data = ['estantes' => $estantes, 'categorias' => $categorias];
        echo view('/principal/sidebar');
        echo view('/materiales/insumosAdmin', $data);
    }

    public function obtenerInsumos()
    {
        $estado = $this->request->getPost('estado');
        $insumos = $this->insumos->obtenerInsumoAdmin($estado);
        echo json_encode($insumos);
    }
    public function buscarInsumo()
    {
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');

        $res = $this->insumos->buscarInsumo($id, $nombre);
        return json_encode($res);
    }
    public function insertar()
    {
        $id = $this->request->getPost('id');
        $tp = $this->request->getPost('tp');
        $nombre = $this->request->getPost('nombre');
        $categoria = $this->request->getPost('categoria');
        $precioC = $this->request->getPost('precioC');
        $precioV = $this->request->getPost('precioV');
        $cantidadA = $this->request->getPost('cantidadA');
        $cantidadV = $this->request->getPost('cantidadV');
        $estante = $this->request->getPost('estante');
        $fila = $this->request->getPost('fila');
        $uniMedida = $this->request->getPost('uniMedida');
        $usuarioCrea = session('id');
        $dataInsumo = [
            'nombre' => $nombre,
            'categoria_material' => $categoria,
            'tipo_material' => 9,
            'cantidad_vendida' => $cantidadV,
            'cantidad_actual' => $cantidadA,
            'precio_venta' => $precioV,
            'precio_compra' => $precioC,
            'estante' => $estante,
            'fila' => $fila,
            'unidad_medida' => $uniMedida,
            'usuario_crea' => $usuarioCrea
        ];
        if ($tp == 2) {
            if ($this->insumos->update($id, $dataInsumo)) {
                return json_encode(1);
            } else {
                return json_encode(1);
            }
        } else {
            if ($this->insumos->save($dataInsumo)) {
                $idMaterial = $this->insumos->getInsertID();
                $fechaActual = date('Y-m-d');
                $dataEnc = [
                    'tipo_movimiento' => 11,
                    'estado' => 'A',
                    'fecha_movimiento' => $fechaActual,
                    'usuario_crea' => $usuarioCrea
                ];
                if ($this->movEnc->save($dataEnc)) {
                    $idMovEnc = $this->movEnc->getInsertID();
                    $dataDet = [
                        'id_movimientoenc' => $idMovEnc,
                        'id_material' => $idMaterial,
                        'item' => 0,
                        'cantidad' => $cantidadA,
                        'costo' => $precioC,
                        'usuario_crea' => $usuarioCrea
        
                    ];
                    if ($this->movDet->save($dataDet)) {
                        return json_encode(1);
                    } else {
                        return json_encode(2);
                    }
                }
            } else {
                return json_encode(1);
            }
        }
    }
    public function restockMaterial()
    {
        $id = $this->request->getPost('id');
        $cantActual = $this->request->getPost('cantActual');
        $cantAgregar = $this->request->getPost('cantAgregar');
        $nuevaCant = $cantActual + $cantAgregar;
        if ($this->insumos->update($id, ['cantidad_actual' => $nuevaCant])) {
            return json_encode(1);
        } else {
            return json_encode(2);
        }
    }
    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        if ($this->insumos->update($id, ['estado' => $estado])) {
            if ($estado == 'A') {
                return '¡Se ha restablecido el Insumo!';
            } else {
                return '¡Se ha eliminado el Insumo!';
            }
        }
    }
    public function eliminados()
    {
        $categorias = $this->param->obtenerCategorias();
        $estantes = $this->estantes->traerEstantes();
        $data = ['estantes' => $estantes, 'categorias' => $categorias];
        echo view('/principal/sidebar');
        echo view('/materiales/insumosAdminEliminados', $data);
    }
}
