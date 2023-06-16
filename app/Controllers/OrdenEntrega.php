<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\MoviEncModel;

class OrdenEntrega extends BaseController
{

    protected $ordenEntrega;
    protected $materiales;
  
    public function __construct()
    {
        $this->ordenEntrega = new MoviEncModel();
    }

    public function index()
    {

        echo view('/principal/sidebar');
        echo view('/ordenEntrega/ordenEntrega');
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
