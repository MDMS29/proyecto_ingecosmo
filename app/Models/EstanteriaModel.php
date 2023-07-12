<?php

namespace App\Models;

use CodeIgniter\Model;

class EstanteriaModel extends Model
{
    protected $table        = 'estanteria';
    protected $primaryKey   = 'id';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id', 'nombre', 'usuario_crea', 'fecha_crea', 'tipo_estante', 'estado', 'n_iconos'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerAllEstantes()
    {
        $this->select('estanteria.*, param_detalle.nombre as n1');    
        $this->join('param_detalle','param_detalle.id_param_det=estanteria.tipo_estante');
        $datos = $this->findAll();
        return $datos;
    }

    public function obtenerBodega()
    {
        $this->select('id , nombre , tipo_estante , n_iconos');
        $this->where('tipo_estante', '61');
        $this->where('estado', 'A');
        $datos = $this->findAll(); 
        return $datos;
    }

    public function titulo($estante)
    {
        $this->select('estanteria.*');
        $this->where('id', $estante);
        $datos = $this->first();
        return $datos;
    }

    public function obtenerEstantes($id)
    {

        $this->select('estanteria.*, param_detalle.nombre as n1');
        $this->where('estanteria.id', $id);
        $this->join('param_detalle','param_detalle.id_param_det=estanteria.tipo_estante');
        $datos = $this->findAll();
        return $datos;
    }

    public function traerEstantes()
    {
        $this->select('id, nombre');
        $this->where('tipo_estante', '60');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }

    public function traerBodega()
    {
        $this->select('id, nombre');
        $this->where('tipo_estante', '61');
        $this->where('estado', 'A');
        $datos = $this->findAll();
        return $datos;
    }
    
   public function contadorArticulos($id)
   {
      $this->select('COUNT(materiales.id_material) as numeroArt');
      $this->join('materiales', 'materiales.estante = estanteria.id');
      $this->where('estanteria.id', $id);
      $this->groupBy('materiales.estante');
      $datos = $this->findAll();
      return $datos;
   }

}
