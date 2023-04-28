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
        $idTrab = $this->request->getPost('id');
        $nombre_p= $this->request->getPost('nombreP');
        $nombre_s = $this->request->getPost('nombreS');
        $apellido_p = $this->request->getPost('apellidoP');
        $apellido_s = $this->request->getPost('apellidoS');
        $tipoDoc = $this->request->getPost('tipoDoc');
        $nIdenti = $this->request->getPost('nIdenti');
        $cargo = $this->request->getPost('cargo');
        $direccion = $this->request->getPost('direccion');



        if ($tp == 2) {
            //Actualizar datos
            $trabajadorUpdate = [
                'id_cargo' => $cargo,
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombre_p,
                'nombre_s' => $nombre_s,
                'apellido_p' => $apellido_p,
                'apellido_s' => $apellido_s,
                'direccion' => $direccion,
            ];
            $this->trabajadores->update($idTrab, $trabajadorUpdate);
            return $idTrab;
        } else {
            //Insertar datos
            //Si la respuesta esta vacia - guardar
            $trabajadorSave = [
                'id_cargo' => $cargo,
                'tipo_identificacion' => $tipoDoc,
                'n_identificacion' => $nIdenti,
                'nombre_p' => $nombre_p,
                'nombre_s' => $nombre_s,
                'apellido_p' => $apellido_p,
                'apellido_s' => $apellido_s,
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