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
                <?php foreach ($usuarios as $u) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                        <td class="text-center"><?= $u['nombre_p'] . ' ' . $u['nombre_s'] ?></td>
                        <td class="text-center"><?= $u['apellido_p'] . ' ' . $u['apellido_s'] ?></td>
                        <td class="text-center"><?= $u['doc_res'] ?></td>
                        <td class="text-center"><?= $u['n_identificacion'] ?></td>
                        <td class="text-center"><?= $u['nombre_rol'] ?></td>
                        <td class="text-center">
                            <button class="btn" onclick="seleccionarUsuario(<?= $u['id_usuario'] ?>)" data-bs-target="#agregarUsuario" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>

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
        <div class="modal-dialog modal-xl">
            <div class="body">
                <div class="logo">
                    <img src="<?= base_url('images/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa">
                </div>
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Agregar Usuario</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_p" class="col-form-label">Primer Nombre:</label>
                                    <input type="text" name="nombre_p" class="form-control" id="nombre_p">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" name="nombre_s" class="form-control" id="nombre_s">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                        <select class="form-select form-select" name="tipoDoc" id="tipoDoc">
                                            <option selected>-- Seleccione --</option>
                                            <?php foreach ($tipoDoc as $t) { ?>
                                                <option value="<?= $t['id_param_det'] ?>"><?= $t['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_p" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" name="apellido_p" class="form-control" id="apellido_p">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_s" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" name="apellido_s" class="form-control" id="apellido_s">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="nIdenti" class="col-form-label">N° Identificación:</label>
                                        <input type="number" name="nIdenti" class="form-control" id="nIdenti">
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="telefono" class="col-form-label">Telefono:</label>
                                    <input type="number" name="telefono" class="form-control" id="telefono">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <input type="email" name="email" class="form-control" id="email">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="rol" class="col-form-label">Tipo de Rol:</label>
                                        <select class="form-select form-select" name="rol" id="rol">
                                            <option selected>-- Seleccione --</option>
                                            <?php foreach ($tipoDoc as $t) { ?>
                                                <option value="<?= $t['id_param_det'] ?>"><?= $t['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
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
                        <button type="submit" class="btn" id="btnGuardar">Regitrarse</button>
                        <button type="button" class="btn" id="btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>



<script>
    function seleccionarUsuario(id, tp) {
        if (tp == 2) {
            alert('Editar')

        } else {
            // alert('Insertar')
        }
    }
</script>