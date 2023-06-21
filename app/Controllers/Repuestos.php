<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParamModel;
use App\Models\MaterialesModel;
use App\Models\EstanteriaModel;
use App\Models\MoviEncModel;
use App\Models\MoviDetModel;
use App\Models\OrdenesModel;
use App\Models\TercerosModel;

class Repuestos extends BaseController
{
    protected $materiales;
    protected $categorias;
    protected $estanteria;
    protected $movEnc;
    protected $movDet;
    protected $ordenes;
    protected $proveedores;


    public function __construct()
    {
        $this->categorias = new ParamModel();
        $this->estanteria = new EstanteriaModel();
        $this->materiales= new MaterialesModel();
        $this->movEnc = new MoviEncModel();
        $this->movDet = new MoviDetModel();
        $this->ordenes = new OrdenesModel();
        $this->proveedores = new TercerosModel();


    }
    public function index()
    {
        $bodega = $this->estanteria->obtenerBodega();
        $data = ['data' => $bodega];
        echo view('/principal/sidebar');
        echo view('/categorias/categoriaRepuesto', $data);
        
    }

    public  function mostrarBodega($id, $nombre, $icon)
    {
        $repuestos = $this->materiales->obtenerRepuestoBodega($id);
        $ordenes = $this->ordenes->obtenerOrdenes();
        $estanteria = $this->estanteria->traerBodega();
        $proveedores = $this->proveedores->obtenerProveedoresRep();
        $data = ['data' => $repuestos, 'nombreBodega' => $nombre, 'icono' => $icon, "ordenes" => $ordenes, "estanteria" => $estanteria, "proveedores" => $proveedores, "nomEstante" => $nombre, "idBodega" => $id];

        echo view('/principal/sidebar');
        
        echo view('/materiales/repuestos', $data);
    }

    public  function materialesCategoriaRepuestos($id)
    {
        $material = $this->materiales->obtenerRepuestosCate($id);
        if(empty($material)){
            return json_encode(1);
        }else{
            return json_encode($material);
        }
        // echo view('/materiales/materiales', $data);
    }


    public function insertar()
    {
        $nombre =  $this->request->getPost('nombre');
        $proveedor = $this->request->getPost('proveedor');
        $cantidad = $this->request->getPost('cantidad');
        $ordenTrabajo = $this->request->getPost('ordenTrabajo');
        $placa = $this->request->getPost('placa');
        $bodega = $this->request->getPost('bodega');
        $tipoMaterial = $this->request->getPost('tipoMaterial');
        $usuarioCrea = session('id');
        $fechaActual = date('Y-m-d');

        $data = [
            'nombre' => $nombre,
            'id_proveedor' => $proveedor,
            'cantidad_actual' => $cantidad,
            'id_orden' => $ordenTrabajo,
            'placa' => $placa,
            'estante' => $bodega,
            'tipo_material' => $tipoMaterial
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

    public function obtenerFilasRepuestos($estante)
    {
        $materiales = $this->materiales->obtenerFilasRepuestos($estante);
        if (!empty($materiales)) {
            return json_encode($materiales);
        }
    }

    public function buscarRepuesto($id_material, $nombre)
    {
        $array = array();
        if ($id_material != 0) {
            $data = $this->materiales->buscarRepuesto($id_material, '');
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nombre != '') {
            $data = $this->materiales->buscarRepuesto(0, $nombre);
            return json_encode($data);
        } else if ($id_material != 0 && $nombre != '') {
            $data = $this->materiales->buscarRepuesto($id_material, $nombre);
            array_push($array, $data);
            return json_encode($array);
        }
    }
}