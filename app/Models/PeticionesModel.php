<?php

namespace App\Models; //Reservamos el espacio de nombre de la ruta app\models

use CodeIgniter\Model;

class PeticionesModel extends Model
{
    protected $table = 'peticiones'; /* nombre de la tabla modelada/*/
    protected $primaryKey = 'id_peticion';

    protected $useAutoIncrement = true; /* Si la llave primaria se genera con autoincremento*/

    protected $returnType = 'array'; /* forma en que se retornan los datos */
    protected $useSoftDeletes = false; /* si hay eliminacion fisica de registro */

    protected $allowedFields = ['id_peticion', 'emisor', 'receptor', 'asunto', 'msg_emisor', 'msg_receptor', 'tipo_validacion', 'fecha_envio_pet', 'fecha_res_pet', 'hora_envio_pet', 'hora_res_pet', 'usuario_crea', 'fecha_crea']; /* relacion de campos de la tabla */

    protected $useTimestamps = true; /*tipo de tiempo a utilizar */
    protected $createdField = ''; /*fecha automatica para la creacion */
    protected $updatedField = ''; /*fecha automatica para la edicion */
    protected $deletedField = ''; /*no se usara, es para la eliminacion fisica */

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;


    public function obtenerPeticiones($tp)
    {
        $this->select("peticiones.*, concat(usuarios.nombre_p,' ', usuarios.nombre_s, ' ', usuarios.apellido_p, ' ', usuarios.apellido_s) as nomEmisor,concat(vw_usuarios.nombre_p,' ', vw_usuarios.nombre_s, ' ', vw_usuarios.apellido_p, ' ', vw_usuarios.apellido_s) as nomRecpetor, param_detalle.nombre as estado");
        $this->join('usuarios','peticiones.emisor=usuarios.id_usuario ', 'left' );
        $this->join('vw_usuarios', 'vw_usuarios.id_usuario=peticiones.receptor', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = peticiones.tipo_validacion');

        if ($tp==1) {
            $this->where('peticiones.receptor', session('id'));
            $this->where('peticiones.tipo_validacion', '64');
        }else{
            $this->where('peticiones.emisor', session('id'));
            $this->where('peticiones.tipo_validacion', '65');
            $this->where('peticiones.tipo_validacion', '66');
        }
        // $this->where('peticiones.tipo_validacion', $estado);
        $data = $this->findAll();
        return $data;
    }

    public function buscarPeticion($id)
    {
        $this->select("peticiones.*, concat(usuarios.nombre_p,' ', usuarios.nombre_s, ' ', usuarios.apellido_p, ' ', usuarios.apellido_s) as nomEmisor,concat(vw_usuarios.nombre_p,' ', vw_usuarios.nombre_s, ' ', vw_usuarios.apellido_p, ' ', vw_usuarios.apellido_s) as nomRecpetor, param_detalle.nombre as estado");
        $this->join('usuarios','peticiones.emisor=usuarios.id_usuario ', 'left' );
        $this->join('vw_usuarios', 'vw_usuarios.id_usuario=peticiones.receptor', 'left');
        $this->join('param_detalle', 'param_detalle.id_param_det = peticiones.tipo_validacion');
        $this->where('peticiones.id_peticion', $id);
        $data = $this->first();
        return $data;
    }
}
