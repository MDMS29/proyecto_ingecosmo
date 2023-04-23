<div id="content" class="p-4 p-md-5">
    <h2 class="text-center"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/usuarioS-n.png') ?>" /> Usuarios Del Sistema</h2>
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
    <div class="footer-page">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="seleccionarUsuario(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?= base_url('home') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<form method="POST" action="<?php echo base_url('usuarios/insertar'); ?>" autocomplete="off" id="formularioUsuarios">
    <div class="modal fade" id="agregarUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" value="0" hidden>
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
                                    <div class="">
                                        <label for="nIdenti" class="col-form-label">N° Identificación:</label>
                                        <input type="number" name="nIdenti" class="form-control" id="nIdenti" minlength="9" maxlength="11">
                                        <small id="msgDoc" class="invalido"></small>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="telefono" class="col-form-label">Telefono:</label>
                                    <div class="d-flex">
                                        <input type="number" name="telefono" class="form-control" id="telefono" disabled>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarTelefono" class="btn" style="border:none;background-color:gray;color:white;">+</button>
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="email" class="col-form-label">Email:</label>
                                    <div class="d-flex">
                                        <input type="email" name="email" class="form-control" id="email">
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarEmail" class="btn" style="border:none;background-color:gray;color:white;">+</button>
                                    </div>
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
                        <button type="button" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnAccionF" id="btnGuardar"><!-- TEXTO DIANMICO --></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="agregarTelefono" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> AGREGAR TELEFONO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#agregarUsuario" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="mb-2 d-flex gap-3" style="width: 100%;">
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="telefonoAdd" class="col-form-label">Telefono:</label>
                            <input type="number" name="telefonoAdd" class="form-control" id="telefonoAdd" maxlength="10">
                        </div>
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="prioridad" class="col-form-label">Prioridad:</label>
                            <select class="form-select form-select" name="prioridad" id="prioridad">
                                <option selected value="">-- Seleccione --</option>
                                <option value="P">Primaria</option>
                                <option value="S">Secundaria</option>
                            </select>
                        </div>
                    </div>
                    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; height: 150px;background-color:white;">
                        <table class="table table-bordered table-sm table-hover" id="tablePaises" width="100%" cellspacing="0">
                            <thead>
                                <tr class="text-center">
                                    <th>Telefono</th>
                                    <th>Priodidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="bodyTel">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarUsuario">Cerrar</button>
                <button type="button" class="btn btnAccionF" id="btnAddTel">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var inputIden = 0;
    const telefonos = [] //Telefonos del usuario.
    //Verificacion de contraseñas
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
    //Insertar y editar Usuario
    function seleccionarUsuario(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + 0,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('Editar Usuario')
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
                    $('#btnGuardar').text('Actualizar')
                }
            })
        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar Usuario')
            $('#tp').val(1)
            $('#id').val(0)
            $('#nombreP').val('')
            $('#nombreS').val('')
            $('#apellidoP').val('')
            $('#apellidoS').val('')
            $('#tipoDoc').val(1)
            $('#nIdenti').val('')
            // $('#telefono').val('')
            // $('#email').val('')
            $('#rol').val('')
            $('#contra').val('')
            $('#confirContra').val('')
            $('#labelNom').text('Contraseña:')
            $('#btnGuardar').text('Agregar')

        }
    }
    //Funcion para buscar usuario segun su identificacion
    function buscarUsuarioIdent(id, inputIden) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputIden,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgDoc').text('')
                    validIdent = true
                } else if (res[0] != null) {
                    $('#msgDoc').text('* Numero de identificación invalido *')
                    validIdent = false
                }
            }
        })
    }
    //Identificar si el numero de identificacion no este registrado
    var validIdent; //Valor para la identificación si es valido o invalido
    $('#nIdenti').on('input', function(e) {
        inputIden = $('#nIdenti').val()
        tp = $('#tp').val()
        id = $('#id').val()
        if (tp == 1 && id == 0) {
            buscarUsuarioIdent(0, inputIden)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputIden,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['n_identificacion'] == inputIden) {
                        $('#msgDoc').text('')
                        validIdent = true
                    } else {
                        buscarUsuarioIdent(0, inputIden)
                    }
                }
            })
        }
    })
    //Envio de formulario
    $('#formularioUsuarios').on('submit', function(e) {
        tp = $('#tp').val()
        nombreP = $('#nombreP').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        telefono = $('#telefono').val()
        email = $('#email').val()
        rol = $('#rol').val()
        contra = $('#contra').val()
        confirContra = $('#confirContra').val()
        //Control de campos vacios
        if ([nombreP, apellidoP, apellidoS, tipoDoc, nIdenti, rol].includes('') || contra != confirContra || validIdent == false) {
            e.preventDefault()
            return Swal.fire({
                position: 'center',
                icon: 'error',
                text: '¡Hay campos vacios o invalidos!',
                showConfirmButton: false,
                timer: 1500
            })
        }
    })
    //Funcion para mostrar telefono
    function guardarTelefono(info) {
        telefonos.push(info)
        var cadena
        for (let i = 0; i < telefonos.length; i++) {
            cadena += ` <tr class="text-center">
                               <td>${telefonos[i].telefono}</td>
                               <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                               <td><button class="btn" onclick="eliminarTel(${telefonos[i].id})"><img src="<?= base_url('icons/delete.svg') ?>" title="Eliminar Telefono"></td>
                           </tr>`
            $('#bodyTel').html(cadena)
        }
    }
    //Agregar Telefono a la tabla
    $('#btnAddTel').on('click', function(e) {
        contador = 0
        const tp = $('#tp').val()
        const telefono = $('#telefonoAdd').val()
        const prioridad = $('#prioridad').val()
        if (tp == 2) {

        } else {
            if ([telefono, prioridad].includes('')) {
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Hay campos vacios!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            let info = {
                id: contador += 1,
                telefono,
                prioridad
            }


            const filtro = telefonos.filter(tel => tel.prioridad == 'P')
            const filtroTel = telefonos.filter(tel => tel.telefono == telefono)

            
            if (filtroTel.length != 0) {
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Ya se agrego este numero de telefono!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                return guardarTelefono(info)
            }


            if (filtro.length > 0) {
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Ya hay un telefono prioritario!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else if (info.prioridad == 'S') {
                return guardarTelefono(info)
            }
        }
    })

    function eliminarTel(id) {
        const tele = telefonos.map(tel => tel.id != id)
        console.log(tele)
    }
</script>