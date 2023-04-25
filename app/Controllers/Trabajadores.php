<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TrabajadoresModel;
use App\Models\ParamModel;
use App\Models\CargosModel;

class Trabajadores extends BaseController
{
    protected $trabajadores;
    protected $param;
    protected $cargos;
    public function __construct()
    {
        $this->trabajadores = new TrabajadoresModel();
        $this->param = new ParamModel();
        $this->cargos = new CargosModel();
        helper('sistema');
    }
    public function index()
    {
        $trabajadores = $this->trabajadores->obtenerTrabajadores();
        $param = $this->param->obtenerTipoDoc();
        $cargos = $this->cargos->obtenerCargos();

        $data = ['trabajadores' => $trabajadores, 'tipoDoc' => $param, 'cargos' => $cargos];

        echo view('/principal/sidebar');
        echo view('/trabajadores/trabajadores', $data);
    }
    public function insertar()
    {

        $tp = $this->request->getPost('tp');
        $id = $this->request->getPost('id');
        $nombreP = $this->request->getPost('nombre_p');
        $nombreS = $this->request->getPost('nombre_s');
        $apellidoP = $this->request->getPost('apellido_p');
        $apellidoS = $this->request->getPost('apellido_s');
        $tipoDoc = $this->request->getPost('tipoDoc');
        $nIdenti = $this->request->getPost('nIdenti');
        $cargo = $this->request->getPost('cargo');
        $direccion = $this->request->getPost('direccion');



        if ($tp == 2) {
            //Actualizar datos

        } else {
            //Insertar datos
            //Si la respuesta esta vacia - guardar
            $trabajadorSave = [
                'id_cargo' => $cargo,
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombreP,
                'nombre_s' => $nombreS,
                'apellido_p' => $apellidoP,
                'apellido_s' => $apellidoS,
                'direccion' => $direccion,
                
            ];
            $this->trabajadores->save($trabajadorSave);
            return json_encode($this->trabajadores->getInsertID());
        }
    }

    public function buscarTrabajador($id, $nIdenti)
    {
        // echo $nIdenti;
        $array = array();

        if ($id != 0) {
            $data = $this->trabajadores->buscarTrabajador($id, 0);
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nIdenti != 0) {
            $data = $this->trabajadores->buscarTrabajador(0, $nIdenti);
            array_push($array, $data);
            return json_encode($array);
        } else if ($id != 0 && $nIdenti != 0) {
            $data = $this->trabajadores->buscarTrabajador($id, $nIdenti);
            array_push($array, $data);
            return json_encode($array);
        }
    }

}
