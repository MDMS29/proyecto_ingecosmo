<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<!-- TABLA MOSTRAR USUARIOS -->
<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS-n.png') ?>" /> Usuarios Eliminados</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
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

                <?php if (empty($usuarios)) { ?>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>¡No hay Usuarios Eliminados!</h3>
                        </td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($usuarios as $u) { ?>
                        <tr>
                            <th scope="row" class="text-center">
                                <?= $contador += 1 ?>
                            </th>
                            <td class="text-center">
                                <?= $u['nombre_p'] . ' ' . $u['nombre_s'] ?>
                            </td>
                            <td class="text-center">
                                <?= $u['apellido_p'] . ' ' . $u['apellido_s'] ?>
                            </td>
                            <td class="text-center">
                                <?= $u['doc_res'] ?>
                            </td>
                            <td class="text-center">
                                <?= $u['n_identificacion'] ?>
                            </td>
                            <td class="text-center">
                                <?= $u['nombre_rol'] ?>
                            </td>
                            <td class="text-center">
                                <button class="btn" onclick="seleccionarUsuario(<?= $u['id_usuario'] ?>)" data-bs-target="#verUsuario" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Ver Usuario"></button>
                                <button class="btn" onclick="cambiarEstado(<?= $u['id_usuario'] ?>, 'A')"><img src="<?php echo base_url('icons/restore.png') ?>" alt="Boton Reestablecer" title="Reestablecer Usuario" width="20" height="20"></button>
                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <a href="<?= base_url('usuarios') ?>" class="btn btnRedireccion"> Regresar</a>
    </div>
</div>

<div class="modal fade" id="verUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <input type="text" name="tp" id="tp" hidden>
    <div class="modal-dialog modal-xl">
        <div class="body">
            <div class="logo">
                <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa">
            </div>
            <div class="modal-content">
                <div class="modal-header flex">
                    <h1 class="modal-title fs-5 text-center" id="tituloModal"><!-- TEXTO DINAMICO--></h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="nombre_p" class="col-form-label">Primer Nombre:</label>
                                <input type="text" name="nombre_p" class="form-control" id="nombreP" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                <input type="text" name="nombre_s" class="form-control" id="nombreS" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="mb-3">
                                    <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                    <select class="form-select form-select" name="tipoDoc" id="tipoDoc" disabled>
                                        <option value="1" selected>Cedula de Ciudadania</option>
                                        <option>-- Seleccione --</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="apellido_p" class="col-form-label">Primer Apellido:</label>
                                <input type="text" name="apellido_p" class="form-control" id="apellidoP" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="apellido_s" class="col-form-label">Segundo Apellido:</label>
                                <input type="text" name="apellido_s" class="form-control" id="apellidoS" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="">
                                    <label for="nIdenti" class="col-form-label">N° Identificación:</label>
                                    <input type="number" name="nIdenti" class="form-control" id="nIdenti" minlength="9" maxlength="11" disabled>
                                    <small id="msgDoc" class="invalido"></small>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="telefono" class="col-form-label">Telefono:</label>
                                <div class="d-flex">
                                    <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verTelefono" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Telefono">+</button>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="email" class="col-form-label">Email:</label>
                                <div class="d-flex">
                                    <input type="email" name="email" class="form-control" id="email" disabled>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#verCorreos" data-bs-target="#staticBackdrop" class="btn" style="border:none;background-color:gray;color:white;" title="Agregar Correo">+</button>
                                </div>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="mb-3">
                                    <label for="rol" class="col-form-label">Tipo de Rol:</label>
                                    <select class="form-select form-select" name="rol" id="rol" disabled>
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($roles as $r) { ?>
                                            <option value="<?= $r['id_rol'] ?>"><?= $r['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="verTelefono" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> VER TELEFONOS</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verUsuario" aria-label="Close" >X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Telefono</th>
                                    <th>Priodidad</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTel">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY TELEFONOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#verUsuario">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL VER CORREOS -->
<div class="modal fade" id="verCorreos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> VER CORREO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#verUsuario" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Correo</th>
                                    <th>Priodidad</th>
                                </tr>
                            </thead>
                            <tbody id="bodyCorre">
                                <tr class="text-center">
                                    <td colspan="3">NO HAY CORREOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#verUsuario">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    let telefonos = [] //Telefonos del usuario.
    let correos = [] //Correos del usuario.
    //Insertar y editar Usuario
    function seleccionarUsuario(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + 0,
            dataType: 'json',
            success: function(res) {
                $('#tituloModal').text('Ver Usuario')
                $('#tp').val(2)
                $('#id').val(res[0]['id_usuario'])
                $('#nombreP').val(res[0]['nombre_p'])
                $('#nombreS').val(res[0]['nombre_s'])
                $('#apellidoP').val(res[0]['apellido_p'])
                $('#apellidoS').val(res[0]['apellido_s'])
                $('#tipoDoc').val(1)
                $('#nIdenti').val(res[0]['n_identificacion'])
                $('#rol').val(res[0]['id_rol'])
                $('#labelNom').text('Cambiar Contraseña:')
                $('#contra').val('')
                $('#confirContra').val('')
                $('#btnGuardar').text('Actualizar')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('telefonos/obtenerTelefonosUser/') ?>' + id + '/' + 7,
                    dataType: 'json',
                    success: function(data) {
                        telefonos = data[0]
                        mostrarTelefonos()
                    }
                })
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url('email/obtenerEmailUser/') ?>' + id + '/' + 7,
                    dataType: 'json',
                    success: function(data) {
                        correos = data[0]
                        mostrarCorreo()
                    }
                })
            }
        })
    }
    
    // Funcion para mostrar correos en la tabla.
    function mostrarCorreo() {
        $('#email').val(correos[0]?.correo)
        var cadena
        if (correos.length == 0) {
            cadena += ` <tr class="text-center">
                            <td colspan="3">NO HAY CORREOS</td>
                        </tr>`
            $('#bodyCorre').html(cadena)
        } else {
            for (let i = 0; i < correos.length; i++) {
                cadena += ` <tr class="text-center">
                                <td>${correos[i].correo}</td>
                                <td>${correos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                            </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    // Funcion para mostrar telefonos en la tabla.
    function mostrarTelefonos() {
        $('#telefono').val(telefonos[0]?.numero)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="3">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center">
                                <td>${telefonos[i].numero}</td>
                                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                            </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
    //Cambiar estado de "Eliminado" a "Activo"
    function cambiarEstado(id, estado) {
        $.post({
            url: '<?= base_url() ?>' + 'usuarios/cambiarEstado',
            data: {
                id: id,
                estado: estado
            },
            success: function(data) {
                if (data == 1) {
                    mostrarMensaje('success', '¡Se ha Reestablecido el usuario!')
                } else {
                    mostrarMensaje('error', '¡Ha ocurrido un error!')
                }
                setTimeout(e => {
                    window.location.reload()
                }, 2000)

            }
        })
    }
</script>