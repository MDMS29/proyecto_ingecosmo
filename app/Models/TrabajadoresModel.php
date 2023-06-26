<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class TrabajadoresModel extends Model
{
    protected $table = 'trabajadores'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_trabajador';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_cargo', 'tipo_identificacion', 'n_identificacion', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_s', 'estado', 'fecha_crea', 'direccion', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerTrabajadores($estado)
    {
        $this->select('trabajadores.*, param_detalle.resumen as doc_res, cargos.nombre as nombre_cargo');
        $this->join('cargos', 'cargos.id_cargo = trabajadores.id_cargo');
        $this->join('param_detalle', 'param_detalle.id_param_det = trabajadores.tipo_identificacion');
        $this->orderBy('id_trabajador', 'asc');
        $this->where('trabajadores.estado', $estado);
        $data = $this->findAll();
        return $data;
    }
    public function buscarTrabajador($id, $nIdenti)
    {
        if ($id != 0) {

            $this->select('trabajadores.*');
            $this->where('id_trabajador', $id);
            $this->join('cargos', 'cargos.id_cargo = trabajadores.id_cargo');
            $this->join('param_detalle', 'param_detalle.id_param_det = trabajadores.tipo_identificacion');
        } elseif ($nIdenti != 0) {

            $this->select('trabajadores.*, cargos.nombre as nombre_cargo');
            $this->where('n_identificacion', $nIdenti);
            $this->join('cargos', 'cargos.id_cargo = trabajadores.id_cargo');
            // $this->join('email', 'email.id_usuario = trabajadores.id');
            // $this->join('telefonos', 'cargos.id_usuario = trabajadores.id');

        } elseif ($id != 0 && $nIdenti != 0) {

            $this->select('trabajadores.*');
            $this->where('id_trabajador', $id);
            $this->where('n_identificacion', $nIdenti);
        }
        $data = $this->first();
        return $data;
    }
    public function elimina_Trabajador($id, $estado)
    {
        $datos = $this->update($id, ['estado' => $estado]);
        return $datos;
    }

    public function trabajadoresInsumos()
    {
        $this->select("id_trabajador, concat(nombre_p,' ',nombre_s,' ',apellido_p,' ',apellido_s) as nombre");
        $this->where("estado", "A");
        $data = $this->findAll();
        return $data;
    }
    public function trabajadoresOrdenes()
    {
        $this->select("id_trabajador, concat(nombre_p,' ',nombre_s,' ',apellido_p,' ',apellido_s) as nombreTrabajador");
        $this->where("estado", "A");
        $data = $this->findAll();
        return $data;
    }
    public function contadorTrabajadores($id_cargo)
    {
        $this->select('COUNT(id_trabajador) as n_trabajador, cargos.nombre');
        $this->join('cargos', 'cargos.id_cargo = trabajadores.id_cargo', 'left');
        $this->where('trabajadores.estado', 'A');
        if ($id_cargo != 0) {
            $this->where('trabajadores.id_cargo', $id_cargo);
        }
        $data = $this->first();
        return $data;
    }
}
