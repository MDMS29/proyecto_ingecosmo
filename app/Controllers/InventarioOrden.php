<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use App\Models\InvOrdenesModel;

class InventarioOrden extends BaseController
{
    protected $invOrden;
    public function __construct()
    {
        $this->invOrden = new InvOrdenesModel();
        helper('sistema');
    }
    public function buscarInventario()
    {
        $id = $this->request->getPost('id');
        $res = $this->invOrden->buscarInventario($id);
        return json_encode($res);
    }
    public function insertar()
    {
        $tp = $this->request->getPost('tp');
        $n = $this->request->getPost('n');
        $idInv = $this->request->getPost('idInv');
        $idOrden = $this->request->getVar('idOrden');
        $item = $this->request->getPost('item');
        $checked = $this->request->getPost('checked');
        $cantidad = $this->request->getPost('cantidad');
        $observacion = $this->request->getVar('observacion');

        $usuarioCrea = session('id');
        $dataInventario = [
            'n' => $n,
            'id_orden' => $idOrden,
            'item' => $item,
            'checked' => $checked,
            'cantidad' => $cantidad,
            'observacion' => $observacion == '' ? null : $observacion,
            'usuario_crea' => $usuarioCrea
        ];
        if ($tp == 2) {
            if ($this->invOrden->update($idInv, $dataInventario)) {
                return json_encode($dataInventario);
            } else {
                return json_encode(2);
            }
        } else {
            if ($this->invOrden->save($dataInventario)) {
                return json_encode(1);
            } else {
                return json_encode(2);
            }
        }
    }
}
