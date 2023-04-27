<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:50px; height:50px; " src="<?php echo base_url('/img/trabajadores-n.png') ?>" /> Trabajadores</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Cargo</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php foreach ($trabajadores as $t) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                        <td class="text-center"><?= $t['nombre_p'] . ' ' . $t['nombre_s'] ?></td>
                        <td class="text-center"><?= $t['apellido_p'] . ' ' . $t['apellido_s'] ?></td>
                        <td class="text-center"><?= $t['doc_res'] ?></td>
                        <td class="text-center"><?= $t['n_identificacion'] ?></td>
                        <td class="text-center"><?= $t['nombre_cargo'] ?></td>
                        <td class="text-center"><?= $t['direccion'] ?></td>
                        <td class="text-center">
                            <button class="btn" onclick="seleccionarTrabajador(<?= $t['id_trabajador'] . ',' . 2 ?>)" data-bs-target="#agregarTrabajador" data-bs-toggle="modal"><img src="<?php echo base_url('icons/edit.svg') ?>" alt="Boton Editar" title="Editar Trabajador"></button>

                            <button class="btn"><img src="<?php echo base_url('icons/delete.svg') ?>" alt="Boton Eliminar" title="Eliminar Trabajador"></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarTrabajador" onclick="seleccionarTrabajador(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        <a href="<?= base_url('home') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> Eliminados</a>
    </div>
</div>

<form autocomplete="off" id="formularioTrabajadores">
    <div class="modal fade" id="agregarTrabajador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="tipoDoc" class="col-form-label">Tipo Identificación:</label>
                                        <select class="form-select form-select" name="tipoDoc" id="tipoDoc">
                                            <option value="1" selected>Cedula de Ciudadania</option>
                                            <option>-- Seleccione --</option>
                                        </select>
                                    </div>
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
                                    <label for="direccion" class="col-form-label">Direccion:</label>
                                        <input type="text" name="direccion" class="form-control" id="direccion" >
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="rol" class="col-form-label">Tipo de Cargo:</label>
                                        <select class="form-select form-select" name="cargo" id="cargo">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($cargos as $c) { ?>
                                                <option value="<?= $c['id_cargo'] ?>"><?= $c['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
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
                                        <input type="email" name="email" class="form-control" id="email" disabled>
                                        <button type="button" data-bs-toggle="modal" data-bs-target="#agregarCorreo" class="btn" style="border:none;background-color:gray;color:white;">+</button>
                                    </div>
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

<!-- MODAL AGREGAR - EDITAR TELEFONO -->
<div class="modal fade" id="agregarTelefono" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> AGREGAR TELEFONO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#agregarTrabajador" aria-label="Close">X</button>
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
                                <tr class="text-center">
                                    <td colspan="3">NO HAY TELEFONOS</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarTrabajador">Cerrar</button>
                <button type="button" class="btn btnAccionF" id="btnAddTel">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL AGREGAR - EDITAR CORREO -->
<div class="modal fade" id="agregarCorreo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header flex justify-content-between align-items-center">
                <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="60" height="60">
                <h1 class="modal-title fs-5 text-center " id="tituloModal"><img src="<?= base_url('icons/plus-b.png') ?>" alt="" width="30" height="30"> AGREGAR CORREO</h1>
                <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#agregarTrabajador" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                    <div class="mb-2 d-flex gap-3" style="width: 100%;">
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="correoAdd" class="col-form-label">Correo:</label>
                            <input type="email" name="correoAdd" class="form-control" id="correoAdd">
                        </div>
                        <div class="d-flex gap-2" style="width: 100%;">
                            <label for="prioridad" class="col-form-label">Prioridad:</label>
                            <select class="form-select form-select" name="prioridadCorreo" id="prioridadCorreo">
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
                                    <th>Correo</th>
                                    <th>Priodidad</th>
                                    <th>Acciones</th>
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
                <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarTrabajador">Cerrar</button>
                <button type="button" class="btn btnAccionF" id="btnAddCorre">Agregar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    var inputIden = 0;
    let telefonos = [] //Telefonos del usuario.
    let correos = []
    //Insertar y editar Trabajador
    function seleccionarTrabajador(id, tp) {
        if (tp == 2) {
            //Actualizar datos
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchTra/') ?>" + id + "/" + 0,
                dataType: 'json',
                success: function(res) {
                    $('#tituloModal').text('Editar Trabajador')
                    $('#tp').val(2)
                    $('#id').val(res[0]['id_trabajador'])
                    $('#nombreP').val(res[0]['nombre_p'])
                    $('#nombreS').val(res[0]['nombre_s'])
                    $('#apellidoP').val(res[0]['apellido_p'])
                    $('#apellidoS').val(res[0]['apellido_s'])
                    $('#tipoDoc').val(1)
                    $('#nIdenti').val(res[0]['n_identificacion'])
                    $('#direccion').val(res[0]['direccion'])
                    // $('#telefono').val(res[0]['id_usuario'])
                    // $('#email').val(res[0]['id_usuario'])
                    $('#cargo').val(res[0]['id_cargo'])
                    $('#btnGuardar').text('Actualizar')
                }
            })
        } else {
            //Insertar datos
            $('#tituloModal').text('Agregar Trabajador')
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
            $('#direccion').val('')
            $('#cargo').val('')
            $('#btnGuardar').text('Agregar')

        }
    }
    //Funcion para buscar trabajador segun su identificacion
    function buscarTrabajadorIdent(id, inputIden) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchTra/') ?>" + id + "/" + inputIden,
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
            buscarTrabajadorIdent(0, inputIden)
        } else if (tp == 2 && id != 0) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('srchTra/') ?>" + id + "/" + inputIden,
                dataType: 'JSON',
                success: function(res) {
                    if (res[0]['n_identificacion'] == inputIden) {
                        $('#msgDoc').text('')
                        validIdent = true
                    } else {
                        buscarTrabajadorIdent(0, inputIden)
                    }
                }
            })
        }
    })
    //Envio de formulario
    $('#formularioTrabajadores').on('submit', function(e) {
        e.preventDefault()
        tp = $('#tp').val()
        nombreP = $('#nombreP').val()
        nombreS = $('#nombreS').val()
        apellidoP = $('#apellidoP').val()
        apellidoS = $('#apellidoS').val()
        tipoDoc = $('#tipoDoc').val()
        nIdenti = $('#nIdenti').val()
        direccion = $('#direccion').val()
        cargo = $('#cargo').val()
        telefono = $('#telefono').val()
        email = $('#email').val()
        //Control de campos vacios
        if ([nombreP, nombreS, apellidoP, apellidoS, tipoDoc, nIdenti, cargo, direccion].includes('') || validIdent == false || correos.length == 0 || telefonos.length == 0) {
            return Swal.fire({
                position: 'center',
                icon: 'error',
                text: '¡Hay campos vacios o invalidos!',
                showConfirmButton: false,
                timer: 1500
            })
        } else {
            dataTrab = {
                tp,
                nombreP,
                nombreS,
                apellidoP,
                apellidoS,
                tipoDoc,
                nIdenti,
                direccion,
                cargo,
                telefonos
            }
            $.post({
                url: '<?php echo base_url('trabajadores/insertar') ?>',
                data: dataTrab,
                success: function(idTrabCreado) {
                    telefonos.forEach(tel => {
                        $.post({
                            url: '<?php echo base_url('telefonos/insertar') ?>',
                            data: {
                                idUsuario: idTrabCreado,
                                numero: tel.telefono,
                                prioridad: tel.prioridad,
                                tipoUsu: 6,
                                tipoTel: 3,
                            },
                            success: function(res) {
                                if (res != 1) {
                                    Swal.fire({
                                        position: 'center',
                                        icon: 'error',
                                        text: '¡Ha ocurrido un error!',
                                        showConfirmButton: false,
                                        timer: 2000
                                    })
                                }
                            }
                        })
                        correos.forEach(correo => {
                            $.post({
                                url: '<?php echo base_url('email/insertar') ?>',
                                data: {
                                    idUsuario: idTrabCreado,
                                    correo: correo.correo,
                                    prioridad: correo.prioridad,
                                    tipoUsu: 6,
                                },
                                success: function(res) {
                                    if (res != 1) {
                                        Swal.fire({
                                            position: 'center',
                                            icon: 'error',
                                            text: '¡Ha ocurrido un error!',
                                            showConfirmButton: false,
                                            timer: 2000
                                        })
                                        setTimeout(() => window.location.href = "<?= base_url('trabajadores') ?>", 2000)
                                    }
                                }
                            })
                        });
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            text: '¡Se ha registrado el usuario!',
                            showConfirmButton: false,
                            timer: 2000
                        })
                        setTimeout(() => window.location.href = "<?= base_url('trabajadores') ?>", 2000)
                    });

                }
            });
        };
    })
     // Funcion para mostrar telefono en la tabla.
     function guardarTelefono() {
        $('#telefono').val(telefonos[0]?.telefono)
        var cadena
        if (telefonos.length == 0) {
            cadena += ` <tr class="text-center">
            <td colspan="3">NO HAY TELEFONOS</td>
            </tr>`
            $('#bodyTel').html(cadena)
        } else {
            for (let i = 0; i < telefonos.length; i++) {
                cadena += ` <tr class="text-center">
                <td>${telefonos[i].telefono}</td>
                <td>${telefonos[i].prioridad == 'S' ? 'Secundaria' : 'Primaria'}</td>
                <td><button class="btn" onclick="eliminarTel(${telefonos[i].id})"><img src="<?= base_url('icons/delete.svg') ?>" title="Eliminar Telefono"></td>
                </tr>`
            }
        }
        $('#bodyTel').html(cadena)
    }
    // Funcion para mostrar correos en la tabla.
    function guardarCorreo() {
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
                <td><button class="btn" onclick="eliminarCorreo(${correos[i].id})"><img src="<?= base_url('icons/delete.svg') ?>" title="Eliminar Correo"></td>
                </tr>`
            }
        }
        $('#bodyCorre').html(cadena)
    }
    var contador = 0;
    var contadorCorreo = 0;
    // Agregar Telefono a la tabla
    $('#btnAddTel').on('click', function(e) {

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
            let filtro = telefonos.filter(tel => tel.prioridad == 'P')
            let filtroTel = telefonos.filter(tel => tel.telefono == info.telefono)
            $('#telefonoAdd').val('')
            $('#prioridad').val('')
            if (filtroTel.length > 0) {
                filtro = []
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Ya se agrego este numero de telefono!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            if (info.prioridad == 'S') {
                telefonos.push(info)
                return guardarTelefono()
            } else if (filtro.length > 0) {
                filtro = []
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Ya hay un telefono prioritario!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                telefonos.push(info)
                return guardarTelefono()
            }
        }
    })
    //Agregar Correo a la tabla
    $('#btnAddCorre').on('click', function(e) {
        const tp = $('#tp').val()
        const correo = $('#correoAdd').val()
        const prioridad = $('#prioridadCorreo').val()
        if (tp == 2) {

        } else {
            if ([correo, prioridad].includes('')) {
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Hay campos vacios!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            let info = {
                id: contadorCorreo += 1,
                correo,
                prioridad
            }
            let filtro = correos.filter(correo => correo.prioridad == 'P')
            let filtroCorreo = correos.filter(correo => correo.correo == info.correo)
            $('#correoAdd').val('')
            $('#prioridad').val('')
            if (filtroCorreo.length > 0) {
                filtro = []
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Ya se agrego este correo!',
                    showConfirmButton: false,
                    timer: 1500
                })
            }
            if (info.prioridad == 'S') {
                correos.push(info)
                return guardarCorreo()
            } else if (filtro.length > 0) {
                filtro = []
                return Swal.fire({
                    position: 'center',
                    icon: 'error',
                    text: '¡Ya hay un correo prioritario!',
                    showConfirmButton: false,
                    timer: 1500
                })
            } else {
                correos.push(info)
                return guardarCorreo()
            }
        }
    })
    function eliminarTel(id) {
        telefonos = telefonos.filter(tel => tel.id != id)
        guardarTelefono() //Actualizar tabla
    }

    function eliminarCorreo(id) {
        correos = correos.filter(correo => correo.id != id)
        guardarCorreo() //Actualizar tabla
    }
</script>