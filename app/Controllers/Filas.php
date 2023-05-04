<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\FilasModel;
use App\Models\EstanteriaModel;
use App\Models\MaterialesModel;



class Filas extends BaseController
{
    protected $filas, $estanteria;
    protected $materiales;

    public function __construct()
    {
        $this->filas = new FilasModel();
        $this->estanteria = new EstanteriaModel();
        $this->materiales = new MaterialesModel();
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
        $data = ['data' => $filas, 'titulo' => $titulo];
        echo view('/principal/sidebar');
        echo view('/estanteria/filas', $data);
    }

    public function buscarFilas($fila){
        $filas_ = $this->filas->traerFilas($fila);   
        if (!empty($filas_)) {
            array_push($returnData, $filas_);
        }
        echo json_encode($returnData);
    }

    public function insertar()
    {
        if ($this->request->getMethod() == "post") {
            
                $this->estanteria->save([
                    'nombre' => $this->request->getPost('nombre')

                ]);
            return redirect()->to(base_url('/cargos'));
        }
    }
}