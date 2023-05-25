<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilasModel;
use App\Models\EstanteriaModel;
use App\Models\MaterialesModel;

class Filas extends BaseController
{
    protected $filas, $estanteria;
    protected $material, $fila;
    protected $materiales;

    public function __construct()
    {
        $this->filas = new FilasModel();
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

    public function buscarFilas($fila)
    {
        $filas_ = $this->filas->traerFilas($fila);
        if (!empty($filas_)) {
            array_push($returnData, $filas_);
        }
        echo json_encode($returnData);
    }

    public function obtenerMaterialesCate($categoria, $fila)
    {
        $materiales = $this->material->obtenerMaterialesCate($categoria, $fila);
        if (!empty($materiales)) {
            return json_encode($materiales);
        }
    }

    public function obtenerMaterialesFila($fila)
    {
        $materiales = $this->material->obtenerMaterialesFila($fila);
        if (!empty($materiales)) {
            return json_encode($materiales);
        }
    }

    public function detallesMaterial($id)
    {
        $returnData = array();
        $filas_ = $this->filas->traerDetalles($id);
        if (!empty($filas_)) {
            array_push($returnData, $filas_);
        }
        echo json_encode($returnData);
    }

    public function insertar()
    {
        $this->filas->update($this->request->getPost('nombreProd'), [
            'fila' => $this->request->getPost('fila')
        ]);
        return json_encode(1);
        // return redirect()->to(base_url('/filas'));
    }

    public function contadorArticulos()
    {
        $idEstante = $this->request->getPost('idEstante');
        $res = $this->filas->contadorArticulos($idEstante);
        return json_encode($res);
    }
    public function contadorFilas()
    {
        $idEstante = $this->request->getPost('idEstante');
        $res = $this->filas->contadorFilas($idEstante);
        return json_encode($res);
    }
}
