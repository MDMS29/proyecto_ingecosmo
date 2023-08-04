<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon-b.png')  ?>" /> Peticiones Recibidas</h2>

    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Asunto Petición</a> -
            <a class="toggle-vis btn" data-column="4">Hora Petición</a> - <a class="toggle-vis btn" data-column="7">Hora Respuesta</a>
        </div>
        <table class="table table-striped" id="tablePeticiones" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">N° Petición</th>
                    <th scope="col" class="text-center">Asunto Petición</th>
                    <th scope="col" class="text-center">Emisor</th>
                    <th scope="col" class="text-center">Fecha Petición</th>
                    <th scope="col" class="text-center">Hora Petición</th>
                    <th scope="col" class="text-center">Receptor</th>
                    <th scope="col" class="text-center">Fecha Respuesta</th>
                    <th scope="col" class="text-center">Hora Respuesta</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Visto</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PETICIONES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">

        <button type="button" class="btn btnRedireccion d-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#agregarPeticion" onclick="agregarPeticion()"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20">Agregar</button>

        <a href="<?= base_url('peticiones/enviadosAlmacenista') ?>" class="btn btn-success"> <img src="<?php echo base_url('/img/buzon.png')  ?>" alt="Enviados" width="20"> Peticiones Enviadas</a>
    </div>
</div>

<!-- modal agregar Peticion -->

<form autocomplete="off" id="formularioAlmacenista" enctype="multipart/form-data">
    <div class="modal fade" id="agregarPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input hidden id="tp" name="tp">
        <input hidden id="id" name="id">
        <div class="modal-dialog modal-lg">
            <div class="body">
                <div class="modal-content">
                    <div class="modal-header flex align-items-center gap-3">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                        <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2">
                            <img id="imgModal" src="<?= base_url('img/plus-b.png') ?>" width="25">
                            <span id="tituloModal">Agregar</span>
                        </h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos()">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="asunto" class="col-form-label">Asunto Petición: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="text" name="asunto" class="form-control" id="asunto">
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="emisor" class="col-form-label">Emisor:</label>
                                    <input type="text" name="emisor" class="form-control" id="emisor" disabled>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaP" class="col-form-label">Fecha Petición:</label>
                                    <input disabled type="text" name="fechaP" class="form-control" id="fechaP">
                                </div>

                            </div>
                            <br>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <details open>
                                        <summary style="color: #1b335b; font-weight: 600;" class="col-form-label">Descripción Envío: <i class="asterisco" style="color:crimson;">*</i></summary>
                                        <textarea style="background-color: #ECEAEA;" name="txtDescripcion" id="txtDescripcion" class="form-control w-100 p-1" rows="3"></textarea>
                                    </details>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnRedireccion" id="btnGuardar" onclick="limpiarCampos()">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- modal Ver Peticion -->
<div class="modal fade" id="verPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id2" hidden>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-eye-fill fs-4" title="Ver Peticion"></i><span id="tituloModal2"><!--texto--></span> </h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="asunto" class="col-form-label">Asunto Peticion:</label>
                                <input type="text" name="asunto2" class="form-control" id="asunto2" disabled>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="emisor" class="col-form-label">Emisor:</label>
                                <input type="text" name="emisor2" class="form-control" id="emisor2" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="fechaP" class="col-form-label">Fecha Peticion:</label>
                                <input disabled type="text" name="fechaP2" class="form-control" id="fechaP2">
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="horaP" class="col-form-label">Hora Peticion:</label>
                                <input type="time" name="horaP2" class="form-control" id="horaP2" disabled>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <details open>
                                    <summary style="color: #1b335b; font-weight: 600;">Descripción Envío</summary>
                                    <textarea name="txtDescripcion2" id="txtDescripcion2" class="form-control w-100 p-1" rows="3" disabled></textarea>
                                </details>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="receptor" class="col-form-label">Receptor:</label>
                                <input type="text" name="receptor2" class="form-control" id="receptor2" disabled>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="estado" class="col-form-label">Tipo Validación:</label>
                                <select disabled class="form-select form-select" name="estado2" id="estado2">
                                    <?php foreach ($estados as $e) { ?>
                                        <option value="<?= $e['id_param_det'] ?>"><?= $e['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="fechaRespuesta" class="col-form-label">Fecha Respuesta:</label>
                                <div class="d-flex">
                                    <input disabled type="date" name="fechaRespuesta2" id="fechaRespuesta2" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="respuesta" class="col-form-label">Respuesta:</label>
                                <textarea disabled name="respuesta2" id="respuesta2" class="form-control w-100 p-1" rows="3"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    recargarAlmacenista()
    var ContadorPRC = 0; //Contador DataTable
    // para asignarle la fecha actual al input date
    var fechaActual = new Date();
    var formattedDate = fechaActual.toISOString().substring(0, 10);

    function limpiarCampos() {
        $('#asunto').text('');
        $('#emisor').text('');
        $('#fechaP').text('');
        $('#txtDescripcion').text('');
    }

    // Tabla   
    var tablaAdminEnviados = $("#tablePeticiones").DataTable({
        ajax: {
            url: '<?= base_url('peticiones/obtenerPeticiones') ?>',
            method: "POST",
            data: {
                tp: 4
            },
            dataSrc: "",
        },
        order: [
            [0, 'desc']
        ],
        columns: [{
                data: 'id_peticion',
                render: function(data, type, row) {
                    return `<b>${row.id_peticion}</b>`
                }
            },
            {
                data: 'asunto'
            },
            {
                data: 'nomEmisor'
            },
            {
                data: 'fecha_envio_pet'
            },
            {
                data: 'hora_envio_pet'
            },
            {
                data: 'nomReceptor'
            },
            {
                data: 'fecha_res_pet'
            },
            {
                data: 'hora_res_pet'
            },
            {
                data: null,
                render: function(data, type, row) {
                    let vistoClass
                    if (row.estado == 'Aceptado') {
                        vistoClass = "text-success fw-bold"
                    } else if (row.estado == 'Denegado') {
                        vistoClass = "text-danger fw-bold"
                    }
                    return '<span class="' + vistoClass + '"> ' + row.estado + ' </span>';
                }
            },
            {
                data: 'visto',
                render: function(data, type, row) {
                    let vistoClass
                    let vistoInfo
                    if (row.visto == 'S') {
                        vistoClass = "text-success fw-bold"
                        vistoInfo = "Leído"
                    } else {
                        vistoClass = "text-danger fw-bold"
                        vistoInfo = "No leído"
                    }
                    return '<span class="' + vistoClass + '"> ' + vistoInfo + ' </span>';
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarPeticion(' + data.id_peticion + ')" data-bs-target="#verPeticion" data-bs-toggle="modal" width="20" title="Ver Peticion"><i class="bi bi-eye-fill fs-4"></i></button>'
                    );
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    function seleccionarPeticion(id) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('peticiones/buscarPeticion/') ?>" + id,
            dataType: 'json'
        }).done(function(res) {
            $('#tituloModal2').text('Ver Peticion - ' + id)
            $('.asterisco').hide()
            $('#fechaRespuesta').attr('disabled', '')
            $('#id2').val(res[0]['id_peticion'])
            $('#asunto2').val(res[0]['asunto'])
            $('#emisor2').val(res[0]['nomEmisor'])
            $('#fechaP2').val(res[0]['fecha_envio_pet'])
            $('#horaP2').val(res[0]['hora_envio_pet'])
            $('#txtDescripcion2').val(res[0]['msg_emisor'])
            $('#receptor2').val(res[0]['nomReceptor'])
            $('#estado2').val(res[0]['tipo_validacion'])
            $('#fechaRespuesta2').val(res[0]['fecha_res_pet'])
            $('#respuesta2').val(res[0]['msg_receptor'])
            let visto = "S"
            recargarAlmacenista()


            $.ajax({
                type: 'POST',
                url: '<?php echo base_url('peticiones/vistoPeticiones/') ?>' + id,
                data: {
                    visto
                },
                dataType: 'json',
                success: function(data) {
                    if (data == 1) {
                        recargarAlmacenista()
                        tablePeticiones.ajax.reload(null, false); //Recargar tabla
                    }
                }
            })
        })
    }

    function agregarPeticion() {
        // datos vacios pero del agregar
        $('#tituloModal').text(`Agregar`)
        $('#ojoPeticion').attr('hidden', '')
        $('#imgModal').attr('src', '<?php echo base_url('img/plus-b.png') ?>')
        $('#tp').val(1)
        $('#id').val(0)
        $('#asunto').val('')
        $('#asunto').removeAttr('disabled')
        $('#emisor').val("<?php echo session('nomCompleto') ?>")
        $('#fechaP').val(formattedDate)
        $('#txtDescripcion').val('')
        $('#txtDescripcion').removeAttr('disabled')
        $('#btnGuardar').removeAttr('hidden', '')
        $('.campObl').show()
        $('.asterisco').show()
    }

    //Envio de formulario
    $('#formularioAlmacenista').on('submit', function(e) {
        e.preventDefault()
        id = $('#id').val()
        asunto = $('#asunto').val()
        emisor = "<?php echo session('id') ?>"
        fechaP = $('#fechaP').val()
        horaP = $('#horaP').val()
        txtDescripcion = $('#txtDescripcion').val()
        //Control de campos vacios
        if ([asunto, txtDescripcion].includes('')) {
            return mostrarMensaje('error', '¡Hay campos vacíos o inválidos!')
        } else {
            $.ajax({
                url: '<?php echo base_url('peticiones/insertar') ?>',
                type: 'POST',
                data: {
                    id,
                    asunto,
                    emisor,
                    fechaP,
                    horaP,
                    txtDescripcion
                },
                success: function(idPet) {
                    mostrarMensaje('success', '¡Se ha enviado la Peticion!')
                }
            }).done(function(data) {
                limpiarCampos()
                $('#agregarPeticion').modal('hide')
                tablePeticiones.ajax.reload(null, true); //Recargar tabla
                ContadorPRC = 0
                $('#btnGuardar').removeAttr('disabled') 
            });
        };
    })
</script>