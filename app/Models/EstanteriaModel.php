<?php

namespace App\Models;

use CodeIgniter\Model;

class EstanteriaModel extends Model{
    protected $table        = 'estanteria';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;
    
    protected $returnType     = 'array';
    protected $useSoftDeletes = false; 
    
    protected $allowedFields = ['id','nombre','usuario_crea', 'fecha_crea','estado'];
    
    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = ''; 
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

     public function titulo($estante)
     {
         $this->select('estanteria.*');
         $this->where('id', $estante);
         $datos = $this->first();  // nos trae el registro que cumpla con una condicion dada 
         return $datos;
     }
     
     

}