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

    protected $allowedFields = [ 'tipo_doc', 'razon_social','n_identificacion','nombre_p','nombre_s','apellido_p','apellido_s', 'direccion', 'tipo_tercero', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    // -------------proveedores----------------
    public function obtenerProveedores()
    {
        $this->select('terceros.*');
        $this->where('tipo_tercero','8');
        $this->where('estado','A');
        $data = $this->findAll();  
        return $data;
    }   
    
    public function traerProveedor($id){
        $this->select('terceros.* ');
        $this->where('id_tercero', $id);
        $data = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $data;
    }
    
    public function eliminaProveedor($id,$estado){
        $data = $this->update($id, ['estado' => $estado]);         
        return $data;
    }
    

    // -------------clientes----------------
    public function obtenerClientes()
    {
        $this->select('terceros.*, param_detalle.resumen as tipoDoc');
        $this->join('param_detalle', 'param_detalle.id_param_det = terceros.tipo_doc');
        $this->where('tipo_tercero','5');
        $this->where('terceros.estado','A');
        $data = $this->findAll();  
        return $data;
    }

    public function traerCliente($id){
        $this->select('terceros.* ');
        $this->where('id_tercero', $id);
        $data = $this->first();  // nos trae el registro que cumpla con una condicion dada 
        return $data;
    }

    public function eliminaCliente($id,$estado){
        $data = $this->update($id, ['estado' => $estado]);         
        return $data;
    }
}
