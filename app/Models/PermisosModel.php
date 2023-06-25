<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class PermisosModel extends Model
{
    protected $table = 'permisos'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_permiso';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_rol', 'id_accion', 'estado', 'fecha_crea', 'usuario_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = 'fecha_crea'; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function obtenerPermisos($idRol)
    {
        $this->select('acciones.nombre, acciones.descripcion');
        $this->join('acciones', 'acciones.id_accion = permisos.id_accion');
        $this->where('permisos.id_rol', $idRol);
        $data = $this->findAll();
        return $data;
    }
}
