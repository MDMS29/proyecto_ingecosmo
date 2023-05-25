<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class EmailModel extends Model
{
    protected $table = 'email'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_email';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_usuario', 'email', 'prioridad', 'tipo_usuario', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerEmailUser($id, $tipoUsuario)
    {
        $this->select('id_email as id, email as correo, prioridad');
        $this->where('id_usuario', $id);
        $this->where('tipo_usuario', $tipoUsuario);
        $data = $this->find();
        return $data;
    }
    public function EmailPrincipal($idUsuario, $tipoUsuario)
    {
        $this->select('email as correo');
        $this->where('id_usuario', $idUsuario);
        $this->where('tipo_usuario', $tipoUsuario);
        $this->where('prioridad', 'P');
        $data = $this->first();
        return $data;
    }

    public function buscarEmail($correo, $idUsuario, $tipoUsuario)
    {
        $this->select('*');
        $this->where('email', $correo);
        $this->where('tipo_usuario', $tipoUsuario);
        if ($idUsuario != 0) {
            $this->where('id_usuario', $idUsuario);
        }
        $data = $this->first();
        return $data;
    }

}
