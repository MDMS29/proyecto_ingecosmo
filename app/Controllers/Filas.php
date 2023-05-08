<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilasModel;
use App\Models\EstanteriaModel;
use App\Models\MaterialesModel;



class Filas extends BaseController
{
    protected $filas, $estanteria;
    protected $material;

    public function __construct()
    {
        $this->filas = new FilasModel();
        $this->estanteria = new EstanteriaModel();
        $this->material = new MaterialesModel();
    }
    public function index()
    {
        $filas = $this->filas->obtenerFilas("id_material");
        $data = ['data' => $filas];
        echo view('/principal/sidebar');
        echo view('/estanteria/filas', $data);
    }

    public  function mostrarFila($estante)
    {
        $filas = $this->filas->obtenerFilas($estante);
        $titulo = $this->estanteria->titulo($estante);
        $data = ['data' => $filas, 'titulo' => $titulo, 'filas' => $filas];
        echo view('/principal/sidebar');
        echo view('/estanteria/filas', $data);
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

    public function obtenerMaterialesCate($categoria)
    {
        $materiales = $this->material->obtenerMaterialesCate($categoria);
        if (!empty($materiales)) {
            return json_encode($materiales);
        }
    }

    public function insertar()
    {
        $this->filas->update($this->request->getPost('nombre_prod'), [
            'fila' => $this->request->getPost('fila')
        ]);
        return json_encode(1);
        // return redirect()->to(base_url('/filas'));
    }
}
