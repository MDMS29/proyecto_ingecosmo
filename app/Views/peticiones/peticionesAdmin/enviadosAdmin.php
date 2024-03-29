<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon-b.png')  ?>" /> Peticiones Enviadas</h2>

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
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA PETICIONES -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnAccionF d-flex gap-2 align-items-center" onclick="window.history.back()"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="20"> Regresar</button>
    </div>
</div>


<!-- modal Ver Peticion -->
<div class="modal fade" id="verPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="body-R">
            <div class="modal-content">
                <div class="modal-header d-flex align-items-center justify-content-between">
                    <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-eye-fill fs-4" title="Ver Peticion"></i><span id="tituloModal"><!--texto--></span> </h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="asunto" class="col-form-label">Asunto de la Petición:</label>
                                <input type="text" name="asunto2" class="form-control" id="asunto2" disabled>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="emisor" class="col-form-label">Emisor:</label>
                                <input type="text" name="emisor2" class="form-control" id="emisor2" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="fechaP" class="col-form-label">Fecha de la Petición:</label>
                                <input disabled type="text" name="fechaP2" class="form-control" id="fechaP2">
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="horaP" class="col-form-label">Hora de la Petición:</label>
                                <input type="time" name="horaP2" class="form-control" id="horaP2" disabled>
                            </div>
                        </div>
                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <details open>
                                    <summary style="color: #1b335b; font-weight: 600;">Descripción del Envío</summary>
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
                                <label for="estado" class="col-form-label">Tipo Validación: <i style="color:crimson">*</i></label>
                                <select disabled class="form-select" name="estado2" id="estado2">
                                    <?php foreach ($estados as $e) { ?>
                                        <option value="<?= $e['id_param_det'] ?>"><?= $e['nombre'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <label for="fechaRespuesta" class="col-form-label">Fecha de Respuesta:</label>
                                <div class="d-flex">
                                    <input disabled type="date" name="fechaRespuesta2" id="fechaRespuesta2" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="d-flex column-gap-3" style="width: 100%">
                            <div class="mb-3" style="width: 100%">
                                <label for="respuesta" class="col-form-label">Respuesta: <i style="color:crimson">*</i></label>
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



<script>
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tablaAdminEnviados.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    //Div ocualtar columnas de la tabla
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })

    recargarAdmin()

    // Tabla   
    var tablaAdminEnviados = $("#tablePeticiones").DataTable({
        ajax: {
            url: '<?= base_url('peticiones/obtenerPeticiones') ?>',
            method: "POST",
            data: {
                tp: 2
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
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn text-primary" onclick="seleccionarPeticion(' + data.id_peticion + ')" data-bs-target="#verPeticion" data-bs-toggle="modal" width="20"title="Ver Peticion"><i class="bi bi-eye-fill fs-4"></i></button>'
                    );
                },
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
            $('#tituloModal').text('Ver Peticion - ' + id)
            $('#fechaRespuesta').attr('disabled', '')
            $('#id').val(res[0]['id_peticion'])
            $('#asunto2').val(res[0]['asunto'])
            $('#emisor2').val(res[0]['nomEmisor'])
            $('#fechaP2').val(res[0]['fecha_envio_pet'])
            $('#horaP2').val(res[0]['hora_envio_pet'])
            $('#txtDescripcion2').val(res[0]['msg_emisor'])
            $('#receptor2').val(res[0]['nomReceptor'])
            $('#estado2').val(res[0]['tipo_validacion'])
            $('#fechaRespuesta2').val(res[0]['fecha_res_pet'])
            $('#respuesta2').val(res[0]['msg_receptor'])
        })
    }
</script>