<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TrabajadoresModel;
use App\Models\ParamModel;
use App\Models\CargosModel;
use App\Models\TelefonosModel;

class Trabajadores extends BaseController
{
    protected $trabajadores;
    protected $param;
    protected $cargos;
    protected $telefonos;
    public function __construct()
    {
        $this->trabajadores = new TrabajadoresModel();
        $this->param = new ParamModel();
        $this->cargos = new CargosModel();
        $this->telefonos = new TelefonosModel();
        helper('sistema');
    }
    public function obtenerTrabajadores()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->trabajadores->obtenerTrabajadores($estado);
        return json_encode($res);
    }
    public function index()
    {
        // $trabajadores = $this->trabajadores->obtenerTrabajadores('');
        $param = $this->param->obtenerTipoDoc();
        $cargos = $this->cargos->obtenerCargos();
        $tipoTel = $this->param->obtenerTipoTel();

        $data = [ 'tipoDoc' => $param, 'cargos' => $cargos,  'tipoTele' => $tipoTel];

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
            $res = $this->trabajadores->buscarTrabajador($idTrab, 0);
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

    public function eliminar($id,$estado){
        if ($this->trabajadores->update($id, ['estado' => $estado])) {
            if($estado == 'A'){
                return redirect()->to(base_url('trabajadores/eliminados'));
            }else{
                return redirect()->to(base_url('trabajadores'));
            }
        }
    }
    public function cambiarEstado($id, $estado)
    {
        if ($this->trabajadores->update($id, ['estado' => $estado])) {
            if($estado == 'A'){
                return redirect()->to(base_url('trabajadores/eliminados'));
            }else{
                return redirect()->to(base_url('trabajadores'));
            }
        }
    }
    public function eliminados(){
        $param = $this->param->obtenerTipoDoc();
        $cargos = $this->cargos->obtenerCargos();
        $data = ['tipoDoc' => $param, 'cargos' => $cargos];
        echo view('/principal/sidebar');
        echo view('/trabajadores/eliminados', $data);
    }
}
