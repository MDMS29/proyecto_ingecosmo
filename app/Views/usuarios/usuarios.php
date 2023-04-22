<div id="content" class="p-4 p-md-5">
    <h2 class="text-center"><span class="fa fa-user"></span> Usuarios del Sistema</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;">
        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
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
                            <button class="btn" onclick="seleccionarUsuario(<?= $u['id_usuario'] . ',' . 2 ?>)" data-bs-target="#agregarUsuario" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Usuario"></button>

                            <button class="btn"><img src="<?php echo base_url('icons/delete.svg') ?>" alt="Boton Eliminar" title="Eliminar Usuario"></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="seleccionarUsuario(<?php echo 1 . ',' . 1 ?>)"><i class="bi bi-clipboard-plus"></i> Agregar</button>
</div>

<form method="POST" action="<?php echo base_url('usuarios/insertar'); ?>" autocomplete="off" id="formularioUsuarios">
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
                                    <input type="text" name="nombre_p" class="form-control" id="nombreP">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="nombre_s" class="col-form-label">Segundo Nombre:</label>
                                    <input type="text" name="nombre_s" class="form-control" id="nombreS">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                        <select class="form-select form-select" name="tipoDoc" id="tipoDoc">
                                            <option value="1" selected>Cedula de Ciudadania</option>
                                            <option>-- Seleccione --</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_p" class="col-form-label">Primer Apellido:</label>
                                    <input type="text" name="apellido_p" class="form-control" id="apellidoP">
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="apellido_s" class="col-form-label">Segundo Apellido:</label>
                                    <input type="text" name="apellido_s" class="form-control" id="apellidoS">
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
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($roles as $r) { ?>
                                                <option value="<?= $r['id_rol'] ?>"><?= $r['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label id="labelNom" for="nombres" class="col-form-label"> <!-- TEXTO DINAMICO --> </label>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function verifiContra(tipo) {
        contra = $('#contra').val()
        confirContra = $('#confirContra').val()
        if (tipo == 2) {
            if (contra == '' && confirContra == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if (contra == confirContra) {
                $('#msgConfir').text('¡Contraseñas valida!').removeClass().addClass('valido')
            } else if (contra == '') {
                $('#msgConfir').text('¡Ingrese una contraseña!').removeClass().addClass('normal')
            } else if (confirContra == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if (contra != confirContra) {
                return $('#msgConfir').text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        } else {
            if (contra == '' && confirContra == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if (contra == '' && confirContra) {
                $('#msgConfir').text('¡Ingrese una contraseña!').removeClass().addClass('normal')
            } else if (confirContra == '') {
                $('#msgConfir').text('').removeClass().addClass('normal')
            } else if (confirContra && contra == confirContra) {
                $('#msgConfir').text('¡Contraseñas valida!').removeClass().addClass('valido')
            } else if (confirContra && contra != confirContra) {
                return $('#msgConfir').text('¡Las contraseñas no coinciden!').removeClass().addClass('invalido')
            }
        }
    }

    $('#confirContra').on('input', function(e) {
        verifiContra(2)
    })

    $('#contra').on('input', function(e) {
        verifiContra(1)
    })

    function seleccionarUsuario(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id,
                dataType: 'json',
                success: function(res) {
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_usuario'])
                    $('#nombreP').val(res[0]['nombre_p'])
                    $('#nombreS').val(res[0]['nombre_s'])
                    $('#apellidoP').val(res[0]['apellido_p'])
                    $('#apellidoS').val(res[0]['apellido_s'])
                    $('#tipoDoc').val(1)
                    $('#nIdenti').val(res[0]['n_identificacion'])
                    // $('#telefono').val(res[0]['nombre_p'])
                    // $('#email').val(res[0]['nombre_p'])
                    $('#rol').val(res[0]['id_rol'])
                    $('#labelNom').text('Cambiar Contraseña:')
                    $('#contra').val('')
                    $('#confirContra').val('')
                }
            })

        } else {
            //Insertar datos
            $('#tp').val(1)
            $('#id').val(0)
            $('#nombreP').val('')
            $('#nombreS').val('')
            $('#apellidoP').val('')
            $('#apellidoS').val('')
            $('#tipoDoc').val(1)
            $('#nIdenti').val('')
            $('#telefono').val('')
            $('#email').val('')
            $('#rol').val('')
            $('#contra').val('')
            $('#confirContra').val('')
            $('#labelNom').text('Contraseña:')
            
        }
    }

    $('#formularioUsuarios').on('submit', function(e) {

        tp = $('#tp').val()
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        telefono = $('#telefono').val()
        email = $('#email').val()
        rol = $('#rol').val()
        contra = $('#contra').val()
        confirContra = $('#confirContra').val()

        if (tp == 2) {
            if ([nombreP, nombreS, apellidoP, apellidoS, tipoDoc, nIdenti, rol, contra, confirContra].includes('')) {
                e.preventDefault()
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Hay campos vacios o las contraseña no coinciden!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        } else {
            if ([nombres, apellidos, n_iden, email, rol, contra, confirContra].includes('') || contra != confirContra) {
                e.preventDefault()
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Hay campos vacios o las contraseña no coinciden!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
        }
    })
</script>