<div id="content" class="p-4 p-md-5">
    <h2 class="text-center"><span class="fa fa-user"></span> Usuarios del Sistema</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;">
        <table class="table table-bordered table-sm table-striped table-hover" id="tablePaises" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Rol</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php foreach ($data as $d) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                        <td class="text-center"><?= $d['nombre_p'] . ' ' . $d['nombre_s'] ?></td>
                        <td class="text-center"><?= $d['apellido_p'] . ' ' . $d['apellido_s'] ?></td>
                        <td class="text-center"><?= $d['doc_res'] ?></td>
                        <td class="text-center"><?= $d['n_identificacion'] ?></td>
                        <td class="text-center"><?= $d['nombre_rol'] ?></td>
                        <td class="text-center">
                            <button class="btn" onclick="seleccionarUsuario(<?= $d['id_usuario'] ?>)" data-bs-target="#agregarUsuario" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>

                            <button class="btn"><img src="<?php echo base_url('icons/delete.svg') ?>" alt="Boton Eliminar" title="Eliminar Usuario"></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="seleccionarUsuario(<?php echo 1 . ',' . 1 ?>)"><i class="bi bi-clipboard-plus"></i> Agregar</button>
</div>

<form method="POST" action="<?php echo base_url('instrUsu'); ?>" autocomplete="off" id="formularioUsuarios">
    <div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" value="0" hidden>
        <input type="text" name="tp" id="tp" hidden>
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="tituloModal">Agregar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="nombres" class="col-form-label">Nombres:</label>
                                <input type="text" name="nombres" class="form-control" id="nombres">
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="apellidos" class="col-form-label">Apellidos:</label>
                                <input type="text" name="apellidos" class="form-control" id="apellidos">
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="nombres" class="col-form-label"># Identificacíon:</label>
                                <input type="number" name="n_iden" class="form-control" id="n_iden">
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="apellidos" class="col-form-label">Rol:</label>
                                <select class="form-select" name="rol" id="rol">
                                    <option value="" selected> -- Seleccione un Rol --</option>
                                    <option value="1">Super Administrador</option>
                                    <option value="2">Administrador</option>
                                </select>
                                <!-- <input type="email" name="email" class="form-control" id="email"> -->
                            </div>
                        </div>
                        <div class="mb-3" style="width: 100%">
                            <label for="apellidos" class="col-form-label">Email:</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="nombres" class="col-form-label">Contraseña:</label>
                                <input type="password" name="contra" class="form-control" id="contra" minlength="5">
                                <small class="normal">¡La contraseña debe contar con un minimo de 6 caracteres!</small>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div>
                                    <label for="nombres" class="col-form-label">Confirmar Contraseña:</label>
                                    <input type="password" name="confirContra" class="form-control" id="confirContra" minlength="5">
                                </div>
                                <small id="msgConfir" class="normal"></small>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="btnGuardar">Guardar</button>
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</form>



<script>
    function seleccionarUsuario(id, tp) {
        if(tp == 2){
            alert('Editar')

        }else{
            // alert('Insertar')
        }
    }
</script>