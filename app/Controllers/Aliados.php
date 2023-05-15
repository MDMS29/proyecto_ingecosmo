<?php

namespace App\Controllers;

use App\Controllers\BaseController; /*la plantilla del controlador general de codeigniter */
use App\Models\TercerosModel;
use App\Models\ParamModel;

class Aliados extends BaseController
{
    protected $aliados;
    protected $param;
    public function __construct()
    {
        $this->aliados = new TercerosModel();
        $this->param = new ParamModel();
    }
    public function index()
    {
        $param = $this->param->obtenerTipoDoc();
        $data = [ 'tipoDoc' => $param];

        echo view('/principal/sidebar');
        echo view('/aliados/aliados', $data);
    }

    public function obtenerAliados()
    {
        $estado = $this->request->getPost('estado');
        $res = $this->aliados->obtenerAliados($estado);
        return json_encode($res);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $idTer = $this->request->getPost('id');
        $razonSocial= $this->request->getPost('RazonSocial');
        $nit = $this->request->getPost('nit');
        $tipoDoc = 2;
        $tipoTer = 56;
        $direccion = $this->request->getPost('direccion');

        if ($tp == 2) {
            //Actualizar datos
            $res = $this->aliados->buscarAliado($idTer, 0);
            $aliadoUpdate = [
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nit,
                'razon_social' => $razonSocial,
                'tipo_tercero' => $tipoTer,
                'direccion' => $direccion,
            ];
            $this->aliados->update($idTer, $aliadoUpdate);
            return $idTer;
        } else {
            //Insertar datos
            //Si la respuesta esta vacia - guardar
            $aliadoSave = [
                'tipo_doc' => $tipoDoc,
                'n_identificacion' => $nit,
                'razon_social' => $razonSocial,
                'tipo_tercero' => $tipoTer,
                'direccion' => $direccion,
                
            ];
            $this->aliados->save($aliadoSave);
            return json_encode($this->aliados->getInsertID());
        }
    }

    public function buscarAliado($id, $nit)
    {
        $array = array();
        if ($id != 0) {
            $data = $this->aliados->buscarAliado($id, 0);
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($nit != 0) {
            $data = $this->aliados->buscarAliado(0, $nit);
            array_push($array, $data);
            return json_encode($array);
        } else if ($id != 0 && $nit != 0) {
            $data = $this->aliados->buscarAliado($id, $nit);
            array_push($array, $data);
            return json_encode($array);
        }
    }
    public function buscarAliadoRzn($id, $razonSocial)
    {
        $array = array();
        if ($id != 0) {
            $data = $this->aliados->buscarAliadoRzn($id, 0);
            if (!empty($data)) {
                array_push($array, $data);
                return json_encode($array);
            }
        } else if ($razonSocial != 0) {
            $data = $this->aliados->buscarAliadoRzn(0, $razonSocial);
            array_push($array, $data);
            return json_encode($array);
        } else if ($id != 0 && $razonSocial != 0) {
            $data = $this->aliados->buscarAliadoRzn($id, $razonSocial);
            array_push($array, $data);
            return json_encode($array);
        }
    }

    // public function eliminar($id, $estado)
    // {
    //     $aliados_ = $this->aliados->eliminaAliados($id, $estado);
    //     return redirect()->to(base_url('/aliados'));
    // }
    // public function eliminados(){
    //     $aliados = $this->aliados->select('*')->where('estado', 'I')->where('tipo_tercero', '56')->findAll();
    //     $data = ['aliados' => $aliados];
    //     echo view('/principal/sidebar');
    //     echo view('/aliados/eliminados', $data);
    // }

    public function cambiarEstado()
    {
        $id = $this->request->getPost('id');
        $estado = $this->request->getPost('estado');
        if ($this->aliados->update($id, ['estado' => $estado])) {
            if($estado == 'A'){
                return '¡Se ha reestablecido el aliado!';
            }else{
                return '¡Se ha eliminado el aliado!';
            }
        }
    }
    public function eliminados(){
        $param = $this->param->obtenerTipoDoc();
        $data = ['tipoDoc' => $param];
        echo view('/principal/sidebar');
        echo view('/aliados/eliminados', $data);
    }

}
