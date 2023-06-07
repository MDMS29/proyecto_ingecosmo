<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ParamModel;
use App\Models\MaterialesModel;
use App\Models\EstanteriaModel;

class Repuestos extends BaseController
{
    protected $materiales;
    protected $categorias;
    protected $estanteria;


    public function __construct()
    {
        $this->categorias = new ParamModel();
        $this->estanteria = new EstanteriaModel();
        $this->materiales= new MaterialesModel();
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
        $data = ['data' => $repuestos, 'nombreBodega' => $nombre, 'icono' => $icon];
        echo view('/principal/sidebar');
        
        echo view('/materiales/repuestos', $data);
    }

    public  function materialesCategoriaRepuestos($id)
    {
        $material = $this->materiales->obtenerRepuestosCate($id);
        if (empty($material)) {
            return json_encode(1);
        } else {
            return json_encode(2);
        }
        // echo view('/materiales/materiales', $data);
    }


    public function insertar()
    {
        $nombre =  $this->request->getPost('nombre');
        $data = [
            'nombre' => $nombre,
        ];

        $this->materiales->save($data);

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