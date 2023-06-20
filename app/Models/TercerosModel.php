<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class TercerosModel extends Model
{

    protected $table = 'terceros'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_tercero';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['tipo_doc', 'razon_social', 'n_identificacion', 'nombre_p', 'nombre_s', 'apellido_p', 'apellido_s', 'direccion', 'tipo_tercero', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function obtenerTipoTercero($idTipo, $idTipo2)
    {
        $this->select('id_tercero, razon_social, n_identificacion, nombre_p, nombre_s, apellido_p, apellido_s, tipo_tercero, estado');
        $this->where('tipo_tercero', $idTipo);
        $this->orWhere('tipo_tercero', $idTipo2);
        // $this->where('estado', 'A');
        $data = $this->findAll();
        return $data;
    }

    // -------------proveedores----------------
    public function obtenerProveedores($estado)
    {
        $this->select('terceros.*');
        $this->where('tipo_tercero', '8');
        $this->where('estado', $estado);
        $data = $this->findAll();
        return $data;
    }
    public function obtenerProveedoresRep()
    {
        $this->select('terceros.*');
        $this->where('tipo_tercero', '8');
        $data = $this->findAll();
        return $data;
    }

    public function buscarProveedor($id, $nit, $razonSocial)
    {
        if ($id != 0) {

            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('tipo_tercero', '8');
            $this->join('param_detalle', 'param_detalle.id_param_det = terceros.tipo_doc');
        } elseif ($nit != 0) {

            $this->select('terceros.*, ');
            $this->where('n_identificacion', $nit);
            $this->where('terceros.estado', 'A');
            $this->where('tipo_tercero', '8');
        } elseif ($razonSocial != 0) {

            $this->select('terceros.*, ');
            $this->where('razon_social', $razonSocial);
            $this->where('terceros.estado', 'A');
            $this->where('tipo_tercero', '8');
        } elseif ($id != 0 && $nit != 0) {

            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('n_identificacion', $nit);
        } elseif ($id != 0 && $razonSocial != 0) {

            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('razon_social', $razonSocial);
        }
        $data = $this->first();
        return $data;
    }


    public function eliminaProveedor($id, $estado)
    {
        $data = $this->update($id, ['estado' => $estado]);
        return $data;
    }


    // -------------Aliados----------------
    public function obtenerAliados($estado)
    {
        $this->select('terceros.*');
        $this->where('tipo_tercero', '56');
        $this->join('param_detalle', 'param_detalle.id_param_det = terceros.tipo_doc');
        $this->where('terceros.estado', $estado);
        $data = $this->findAll();
        return $data;
    }


    public function buscarAliado($id, $nit, $razonSocial)
    {
        if ($id != 0) {

            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('tipo_tercero', '56');
            $this->join('param_detalle', 'param_detalle.id_param_det = terceros.tipo_doc');
        } elseif ($nit != 0) {

            $this->select('terceros.*, ');
            $this->where('n_identificacion', $nit);
            $this->where('terceros.estado', 'A');
            $this->where('tipo_tercero', '56');
        } elseif ($razonSocial != 0) {

            $this->select('terceros.*, ');
            $this->where('razon_social', $razonSocial);
            $this->where('terceros.estado', 'A');
            $this->where('tipo_tercero', '56');
        } elseif ($id != 0 && $nit != 0) {

            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('n_identificacion', $nit);
        } elseif ($id != 0 && $razonSocial != 0) {

            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('razon_social', $razonSocial);
        }
        $data = $this->first();
        return $data;
    }

    public function eliminaAliado($id, $estado)
    {
        $data = $this->update($id, ['estado' => $estado]);
        return $data;
    }



    // -------------Clientes----------------
    public function obtenerClientes($estado)
    {
        $this->select("terceros.*, param_detalle.resumen as tipoDoc, concat(nombre_p, ' ', nombre_s, ' ', apellido_p, ' ', apellido_s) as nombreCompleto, telefonos.numero as telefono, email.email as email");
        $this->join('telefonos', 'telefonos.tipo_usuario = terceros.tipo_tercero', 'left');
        $this->join('email', 'email.id_usuario = terceros.id_tercero', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = terceros.tipo_doc');
        $this->where('terceros.tipo_tercero', '5');
        $this->where('telefonos.tipo_usuario', '5');
        $this->where('terceros.estado', $estado);
        $this->groupBy('terceros.id_tercero');
        $data = $this->findAll();
        return $data;
    }

    public function buscarCliente($id, $nIdenti)
    {
        if ($id != 0) {
            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->join('param_detalle', 'param_detalle.id_param_det = terceros.tipo_doc');
        } elseif ($nIdenti != 0) {
            $this->select('terceros.*, ');
            $this->where('n_identificacion', $nIdenti);
            $this->where('terceros.estado', 'A');
            $this->where('tipo_tercero', '5');
        } elseif ($id != 0 && $nIdenti != 0) {
            $this->select('terceros.*');
            $this->where('id_tercero', $id);
            $this->where('n_identificacion', $nIdenti);
        }
        $data = $this->first();
        return $data;
    }
}
