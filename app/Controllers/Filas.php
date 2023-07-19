<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilassModel;
use App\Models\EstanteriaModel;
use App\Models\MaterialesModel;

class Filas extends BaseController
{
    protected $filas, $estanteria;
    protected $material, $fila;
    protected $materiales, $cateogria;

    public function __construct()
    {
        $this->filas = new FilassModel();
        $this->estanteria = new EstanteriaModel();
        $this->material = new MaterialesModel();
    }
    public function index()
    {
        // $filas = $this->filas->obtenerFilas("id_material");
        // $data = ['data' => $filas];
        // echo view('/principal/sidebar');
        // echo view('/estanteria/filas', $data);
    }

    public  function mostrarFila($estante)
    {
        $filas = $this->filas->obtenerFilas($estante);
        $titulo = $this->estanteria->titulo($estante);
        $data = ['data' => $filas, 'titulo' => $titulo, 'filas' => $filas];
        echo view('/principal/sidebar');
        echo view('/estanteria/filas', $data);
        // echo view('/materiales/materiales', $data);
    }

    public  function mostrarSeccion($estante)
    {
        $filas = $this->filas->obtenerFilas($estante);
        $titulo = $this->estanteria->titulo($estante);
        $data = ['data' => $filas, 'titulo' => $titulo, 'filas' => $filas];
        echo view('/principal/sidebar');
        echo view('/estanteria/secciones', $data);
        // echo view('/materiales/materiales', $data);
    }

    public  function materialesEstante($estante)
    {
        $material = $this->filas->obtenerFilas($estante);
        if (empty($material)) {
            return json_encode(1);
        } else {
            return json_encode(2);
        }
        // echo view('/materiales/materiales', $data);
    }

    // public function mostrarMaterial($estante, $material){
    //     $titulo = $this->estanteria->titulo($estante);
    //     $data = ['titulo' => $titulo,'materiales'=> $material];
    //     echo view('/principal/sidebar');
    //     echo view('/estanteria/filas', $data);
    // }

    public function buscarFilas($id)
    {
        $filas_ = $this->filas->traerFilas($id);
        if (!empty($filas_)) {
            array_push($returnData, $filas_);
        }
        echo json_encode($returnData);
    }
    public function filasEstante($id)
    {
        $returnData = [];
        $filas_ = $this->filas->traerFilasEstante($id);
        if (!empty($filas_)) {
            return json_encode($filas_);
        }
        echo json_encode($returnData);
    }

    public function obtenerMaterialesCate($categoria, $fila, $id_fila)
    {
        $materiales = $this->material->obtenerMaterialesCate($categoria, $fila, $id_fila);
        if (!empty($materiales)) {
            return json_encode($materiales);
        }
    }

    public function obtenerMaterialesFila($fila)
    {
        $materiales = $this->material->obtenerMaterialesFila($fila);
            return json_encode($materiales);
    }

    public function detallesMaterial($id)
    {
        $returnData = array();
        // $filas_ = $this->material->traerMateriales($id);
        $filas_ = $this->material->traerDetalles($id);
        if (!empty($filas_)) {
            array_push($returnData, $filas_);
        }
        echo json_encode($returnData);
    }

    public function moverMaterial()
    {
        // echo $this->request->getPost('id_material');
        $this->material->update($this->request->getPost('id_material'), [  
            'fila' => $this->request->getPost('fila')
        ]);
        return json_encode(1);

    }

    public function contadorArticulos()
    {
        $idEstante = $this->request->getPost('idEstante');
        $res = $this->estanteria->contadorArticulos($idEstante);
        return json_encode($res);
    }


}
