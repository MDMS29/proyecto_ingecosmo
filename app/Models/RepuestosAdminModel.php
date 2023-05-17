<?php

namespace App\Models;

use CodeIgniter\Model;

class RepuestosAdminModel extends Model{
    protected $table        = 'materiales';
    protected $primaryKey   = 'id_material';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id_vehiculo', 'id_proovedor', 'nombre', 'categoria_material', 'tipo_material','cantidad_vendida','cantidad_actual', 'precio_venta', 'precio_compra', 'fecha_ultimo_ingre', 'fecha_ultimo_salid', 'estante', 'fila', 'usuario_crea', 'fecha_crea'];
    
    protected $useTimestamps = true;

    
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;
}