<?php

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\CategoriaModel;
use App\Models\ParamModel;
use App\Models\MaterialesModel;
use App\Models\VehiculosModel;
use App\Models\TrabajadoresModel;
use App\Models\EstanteriaModel;
use App\Models\FilassModel;
use App\Models\MoviEncModel;
use App\Models\MoviDetModel;
use App\Models\OrdenesModel;


class Insumos extends BaseController
{
    protected $categorias;
    protected $materiales;
    protected $vehiculos;
    protected $trabajadores;
    protected $estanteria;
    protected $fila;
    protected $movEnc;
    protected $movDet;
    protected $ordenes;
    public function __construct()
    {
        $this->categorias = new ParamModel();
        $this->materiales = new MaterialesModel();
        $this->vehiculos = new VehiculosModel();
        $this->trabajadores = new TrabajadoresModel();
        $this->estanteria = new EstanteriaModel();
        $this->fila = new FilassModel();
        $this->movEnc = new MoviEncModel();
        $this->movDet = new MoviDetModel();
        $this->ordenes = new OrdenesModel();
    }
    public function index()
    {
        $categorias = $this->categorias->obtenerCategorias();
        $data = ['data' => $categorias];
        echo view('/principal/sidebar');
        echo view('/categorias/categoriaInsumo', $data);
    }

    public  function mostrarInsumo($id, $nombre, $icon, $idCate)
    {
        $materiales = $this->materiales->obtenerInsumo($id);
        $trabajadores = $this->trabajadores->trabajadoresInsumos();
        $vehiculos = $this->vehiculos->vehiculosInsumos();
        $ordenes = $this->ordenes->obtenerOrdenes();
        $estanteria = $this->estanteria->traerEstantes();
        $fila = $this->fila->traerFila();
        if (empty($materiales)) {
            $materiales = '';
        }

        $data = ['data' => $materiales, 'nombreCategoria' => $nombre, 'icono' => $icon, 'idCate' => $idCate, "vehiculos" => $vehiculos, "ordenes" => $ordenes, "trabajadores" => $trabajadores, "estanteria" => $estanteria, "fila" => $fila];
        echo view('/principal/sidebar');

        echo view('/materiales/materiales', $data);
    }


    public  function materialesCategoria($id)
    {
        $material = $this->materiales->obtenerInsumo($id);
        if (empty($material)) {
            return json_encode(1);
        } else {
            return json_encode(2);
        }
        // echo view('/materiales/materiales', $data);
    }


    public function obtenerFilasInsumos($estante)
    {
        $materiales = $this->fila->obtenerFilas($estante);
        return json_encode($materiales);
    }

    public function obtenerMaterialesFila($fila)
    {
        $materiales = $this->materiales->obtenerMaterialesFila($fila);
        if (!empty($materiales)) {
            return json_encode($materiales);
        }
    }




    public function insertar()
    {
        $nombre =  $this->request->getPost('nombre');
        $cantidadActual = $this->request->getPost('cantidadActual');
        $precioCompra = $this->request->getPost('precioCompra');
        $precioVenta = $this->request->getPost('precioVenta');
        $tipoMaterial = $this->request->getPost('tipoMaterial');
        $idCategoria = $this->request->getPost('idCategoria');
        $estante = $this->request->getPost('estante');
        $fila = $this->request->getPost('fila');
        $usuarioCrea = session('id');
        $fechaActual = date('Y-m-d');

        $data = [
            'nombre' => $nombre,
            'cantidad_actual' => $cantidadActual,
            'precio_compra' => $precioCompra,
            'precio_venta' => $precioVenta,
            'tipo_material' => $tipoMaterial,
            'categoria_material' => $idCategoria,
            'estante' => $estante,
            'fila' => $fila
        ];

        $this->materiales->save($data);
        $idMaterial = $this->materiales->getInsertID();
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
                'cantidad' => $cantidadActual,
                'costo' => $precioCompra,
                'usuario_crea' => $usuarioCrea

            ];
            if ($this->movDet->save($dataDet)) {
                return json_encode(1);
            } else {
                return json_encode(2);
            }
        }

        // return redirect()->to(base_url('/materiales'));
    }

    public function actualizar()
    {
        $id =  $this->request->getPost('idMaterial');
        $nombre =  $this->request->getPost('nombre');
        $cantidadActual = $this->request->getPost('cantidadActual');
        $cantidadVendida = $this->request->getPost('cantidadVendida');
        $precioCompra = $this->request->getPost('precioCompra');
        $precioVenta = $this->request->getPost('precioVenta');
        $estante = $this->request->getPost('estante');
        $fila = $this->request->getPost('fila');
        $tipoMaterial = $this->request->getPost('tipoMaterial');

        $data = [
            'id_material' => $id,
            'nombre' => $nombre,
            'cantidad_actual' => $cantidadActual,
            'cantidad_vendida' => $cantidadVendida,
            'precio_compra' => $precioCompra,
            'precio_venta' => $precioVenta,
            'estante' => $estante,
            'fila' => $fila,
            'tipo_material' => $tipoMaterial,
        ];

        $this->materiales->update($id, $data);

        return json_encode($data); // return redirect()->to(base_url('/materiales'));

        $idMaterial = $this->materiales->getInsertID();
    }


    public function usar()
    {
        $id =  $this->request->getPost('idMaterial');

        $res = $this->materiales->traerDetalles($id);
        $cantidadExistente = $this->request->getPost('cantidadExistente');
        $ordenes = $this->request->getPost('ordenes');
        $trabajador = $this->request->getPost('trabajador');
        $cantidadUsar = $this->request->getPost('cantidadUsar');
        $usuarioCrea = session('id');
        $fechaActual = date('Y-m-d');
        $cantidadNueva =  $cantidadExistente - $cantidadUsar; //Nueva cantidad existente del material
        $cantidadVendidaActual = $res['cantidad_vendida'] + $cantidadUsar; //Nueva cantidad vendida del material
        $data = [
            'cantidad_actual' => $cantidadNueva,
            'cantidad_vendida' => $cantidadVendidaActual
        ];


        if ($this->materiales->update($id, $data)) {
            $dataEnc = [
                'tipo_movimiento' => 12,
                'estado' => 'A',
                'id_vehiculo' => $ordenes,
                'id_trabajador' => $trabajador,
                'fecha_movimiento' => $fechaActual,
                'usuario_crea' => $usuarioCrea
            ];
            if ($this->movEnc->save($dataEnc)) {
                $idMovEnc = $this->movEnc->getInsertID();
                $dataDet = [
                    'id_movimientoenc' => $idMovEnc,
                    'id_material' => $id,
                    'item' => 1,
                    'cantidad' => $cantidadUsar,
                    'costo' => $cantidadVendidaActual,
                    'usuario_crea' => $usuarioCrea
                ];
                if ($this->movDet->save($dataDet)) {
                    return json_encode(1);
                } else {
                    return json_encode(2);
                }
            }
        } else {
            return json_encode(2);
        }
    }

    public function buscarInsumo($id_material, $nombre = '')
    {
        $array = array();
        if ($id_material != 0) {
            $data = $this->materiales->buscarInsumo($id_material, '');
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nombre != '') {
            $data = $this->materiales->buscarInsumo(0, $nombre);
            return json_encode($data);
        } else if ($id_material != 0 && $nombre != '') {
            $data = $this->materiales->buscarInsumo($id_material, $nombre);
            array_push($array, $data);
            return json_encode($array);
        }
    }

    public function obtenerMaterialesEnt($id, $tipoMaterial)
    {
        $array = array();
        $data = $this->materiales->obtenerMaterialesEnt($id, $tipoMaterial);
        array_push($array, $data);
        return json_encode($array);
    }
    public function contadorInsumos()
    {
        $id = $this->request->getPost('id');
        $res = $this->materiales->contadorInsumos($id);
        return json_encode($res);
    }
    public function contadorRepuestos()
    {
        $id = $this->request->getPost('id');
        $res = $this->materiales->contadorRepuestos($id);
        return json_encode($res);
    }
}
