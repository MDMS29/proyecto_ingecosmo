<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MoviEncModel;
use App\Models\MaterialesModel;
use App\Models\ParamModel;
use App\Models\VehiculosModel;
use App\Models\TrabajadoresModel;
use App\Models\OrdenesModel;


class OrdenEntrega extends BaseController
{

    protected $ordenEntrega;
    protected $materiales;
    protected $trabajadores;
    protected $vehiculos;
    protected $ordenes;
    protected $tipo;
    protected $tipoCate;
  
    public function __construct()
    {
        $this->ordenEntrega = new MoviEncModel();
        $this->trabajadores = new TrabajadoresModel();
        $this->materiales = new MaterialesModel();
        $this->vehiculos= new VehiculosModel();
        $this->ordenes= new OrdenesModel();
        $this->tipo= new ParamModel();
        $this->tipoCate= new ParamModel();
    }

    public function index()
    {
        $trabajadores = $this->trabajadores->trabajadoresOrdenes();
        $materiales = $this->materiales->obtenerInsumo1();
        $tipo = $this->tipo->obtenerTipoMat();
        $ordenes= $this->ordenes->obtenerOrdenes();
        $tipoCate = $this->tipo->obtenerCategoriasOrdenes();
        $data = ['trabajadores' => $trabajadores, 'tipo' => $tipo, 'tipoCate' => $tipoCate, 'ordenes' => $ordenes,'materiales' => $materiales,];
        echo view('/principal/sidebar');
        echo view('/ordenEntrega/ordenEntrega', $data);
    }

    public  function mostrarOrdenesEntrega($id, $nombre, $idCate)
    {
        $ordenEntrega= $this->ordenEntrega->ordenesEntrega();
        $materiales = $this->materiales->obtenerMateriales($id);
        $trabajadores = $this->trabajadores->trabajadoresOrdenes();
        $vehiculos = $this->vehiculos->vehiculosOrdenes();
        if (empty($materiales)) {
            $materiales = '';
        }

        $data = ['data' => $ordenEntrega, 'nombreCategoria' => $nombre, 'idCate' => $idCate, "vehiculos" => $vehiculos, "trabajadores" => $trabajadores];
        echo view('/principal/sidebar');

        echo view('/ordenEntrega/ordenEntrega', $data);
    }


    
    public function detallesOrden($id)
    {
        $returnData = array();
        $ordenEntrega_ = $this->ordenEntrega->traerDetalles($id);
        if (!empty($ordenEntrega_)) {
            array_push($returnData, $ordenEntrega_);
        }
        echo json_encode($returnData);
    }


    public function obtenerOrdenEntrega()
    {
        $res = $this->ordenEntrega->ordenesEntrega();
        return json_encode($res);
    }

}
