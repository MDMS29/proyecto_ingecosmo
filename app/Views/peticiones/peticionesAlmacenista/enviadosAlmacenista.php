<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon-b.png')  ?>" /> Peticiones Enviadas</h2>

    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Asunto Petición</a> -
            <a class="toggle-vis btn" data-column="4">Hora Petición</a>
        </div>
        <table class="table table-striped" id="tablePeticiones" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">N° Petición</th>
                    <th scope="col" class="text-center">Asunto Petición</th>
                    <th scope="col" class="text-center">Emisor</th>
                    <th scope="col" class="text-center">Fecha Petición</th>
                    <th scope="col" class="text-center">Hora Petición</th>
                    <th scope="col" class="text-center">Estado</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PETICIONES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion d-flex gap-2 align-items-center" data-bs-toggle="modal" data-bs-target="#agregarPeticion" onclick="seleccionarPeticion(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20">Agregar</button>

        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
    </div>
</div>



<!-- modal Agregar o Ver Peticion -->
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
                            <img id="imgModal" src="" width="25">
                            <i id="ojoPeticion"></i>
                            <span id="tituloModal"><!--texto--></span>
                        </h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos()">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="asunto" class="col-form-label">Asunto Peticion: <i class="asterisco" style="color:crimson;">*</i></label>
                                    <input type="text" name="asunto" class="form-control" id="asunto" oninput="this.value = this.value.replace(/[^a-zA-Zñáéíóú]/,'')">
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="emisor" class="col-form-label">Emisor:</label>
                                    <input type="text" name="emisor" class="form-control" id="emisor" disabled>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaP" class="col-form-label">Fecha Peticion:</label>
                                    <input disabled type="text" name="fechaP" class="form-control" id="fechaP">
                                </div>

                            </div>
                            <br>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <details open>
                                        <summary style="color: #1b335b; font-weight: 600;" class="col-form-label">Descripción Envío: <i class="asterisco" style="color:crimson;">*</i></summary>
                                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control w-100 p-1 descripcion" rows="3"></textarea>
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


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tablePeticiones.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    //Div ocultar columnas de la tabla
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })

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
    var tablePeticiones = $("#tablePeticiones").DataTable({
        ajax: {
            url: '<?= base_url('peticiones/obtenerPeticiones') ?>',
            method: "POST",
            data: {
                tp: 3
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
                data: null,
                render: function(data, type, row) {
                    return '<span class="fw-bold" style="color: rgb(235, 154, 4);">' + row.estado + '</span>'
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarPeticion(' + data.id_peticion + ' , 2)" data-bs-target="#agregarPeticion" data-bs-toggle="modal" width="20" title="Ver Peticion"><i class="bi bi-eye-fill fs-4"></i></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });


    function seleccionarPeticion(id, tp) {
        if (tp == 2) {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url('peticiones/buscarPeticion/') ?>" + id + '/' + 0 + '/' + 0,
                dataType: 'json',
            }).done(function(res) {
                limpiarCampos()
                $('#tp').val(2)
                $('#ojoPeticion').addClass('bi bi-eye-fill fs-4 text-dark')
                $('#tituloModal').text('Ver Peticion - ' + id)
                $('#id').val(res[0]['id_peticion'])
                $('#asunto').val(res[0]['asunto'])
                $('#asunto').attr('disabled', '')
                $('#emisor').val(res[0]['nomEmisor'])
                $('#emisor').attr('disabled', '')
                $('#fechaP').val(res[0]['fecha_envio_pet'])
                $('#fechaP').attr('disabled', '')
                $('#txtDescripcion').val(res[0]['msg_emisor'])
                $('#txtDescripcion').attr('disabled', '')
                $('#btnGuardar').attr('hidden', '')
                $('.asterisco').hide()
                $('.campObl').hide()
            })
        } else {
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
            $('.asterisco').show()
            $('.campObl').show()

        }

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
            return mostrarMensaje('error', '¡Hay campos  vacíos o inválidos!')
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
                    mostrarMensaje('success', '¡Se ha enviado la Petición!')
                }
            }).done(function(data) {
                recargarAdmin()
                limpiarCampos()
                $('#agregarPeticion').modal('hide')
                tablePeticiones.ajax.reload(null, true); //Recargar tabla
                ContadorPRC = 0
                $('#btnGuardar').removeAttr('disabled')
            });
        };
    })
</script>