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

    protected $allowedFields = ['id', 'nombre', 'usuario_crea', 'fecha_crea', 'estado', 'n_iconos'];

    protected $useTimestamps = true;
    protected $createdField  = 'fecha_crea';
    protected $updatedField  = '';
    protected $deletedField  = '';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation    = false;

    public function obtenerAllEstantes()
    {
        $this->select('estanteria.*');
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
        $this->select('estanteria.*, estanteria.id as nombre');
        $this->where('id', $id);
        $datos = $this->findAll();
        return $datos;
    }

    public function traerEstantes($nombre)
    {
        $this->select('estanteria.*, estanteria.nombre as nomEstante');
        $this->where('nombre', $nombre);
        $datos = $this->findAll();
        return $datos;
    }

}
