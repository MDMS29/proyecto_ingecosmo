<?php

namespace App\Controllers;

use App\Models\EstanteriaModel;
use App\Models\FilassModel;
use App\Models\ParamModel;
use App\Models\MaterialesModel;

use App\Controllers\BaseController;


class Estanteria extends BaseController
{
    protected $estantes, $filas, $materiales, $categorias, $param, $tipoEstante;
    public function __construct()
    {
        $this->estantes = new EstanteriaModel();
        $this->filas = new FilassModel();
        $this->param = new ParamModel();
    }
    public function index()
    {
        $estantes = $this->estantes->obtenerAllEstantes();
        
        $data = ['estantes' => $estantes];
        echo view('/principal/sidebar');
        echo view('/estanteria/estanteria', $data);
    }

    public  function mostrarEstante($id, $estante, $id_material)
    {
        $titulo = $this->estantes->titulo($estante);
        $filas = $this->filas->obtenerFilas($estante);
        $estantes = $this->estantes->obtenerEstantes($id);
        // $tipoEstante = $this->param->obtenerTipoEstante($id);
        $data = ['data' => $estantes, 'titulo' => $titulo, 'filas' => $filas];
        echo view('/principal/sidebar');
        echo view('/estanteria/estanteria', $data);
        return json_encode($estantes);
    }
    

    // public function buscarEstante($id)
    // {
    //     $estante_ = $this->estantes->traerEstantes($id);
    //     if (!empty($estante_)) {
    //         array_push($returnData, $estante_);
    //     }
    //     echo json_encode($returnData);
    // }

    public function insertar()
    {
        $img = $this->request->getFile('imagen');
        $img->move('./img');
        // echo $img->getName();
        // exit;
        $this->estantes->save([
            'nombre' => $this->request->getPost('nombre'),
            'fila' => $this->request->getPost('fila'),

            //subir imagenes 
        ]);
        // return json_encode(1);
        // return redirect()->to(base_url('/filas'));
    }

}

