<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon-b.png')  ?>" /> Peticiones</h2>
    <ul class="nav nav-tabs" style="margin-bottom: 0;" id="myTab" role="tablist">
        <li class="nav-item">

            <a class="nav-link active" id="recibidos-tab" data-toggle="tab" href="#recibidos" role="tab" aria-controls="recibidos" aria-selected="true">Recibidos</a>

        </li>
        <li class="nav-item">
            <a class="nav-link" id="enviados-tab" data-toggle="tab" href="#enviados" role="tab" aria-controls="profile" aria-selected="false">Enviados</a>
        </li>
    </ul>

    <!-- TABLA RECIBIDOS -->
    <div class="tab-content profile-tab" id="myTabContent">
        <div class="tab-pane fade show active" id="recibidos" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table table-striped" id="tablePeticiones1" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">N° Orden</th>
                        <th scope="col" class="text-center">Asunto Peticion</th>
                        <th scope="col" class="text-center">Emisor</th>
                        <th scope="col" class="text-center">Fecha de Peticion</th>
                        <th scope="col" class="text-center">Hora de Peticion</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <!-- TABLA PETICIONES -->
                </tbody>
            </table>
        </div>

        <!-- TABLA ENVIADOS -->
        <div class="tab-pane fade" id="enviados" role="tabpanel" aria-labelledby="profile-tab">
            <table class="table table-striped" id="tablePeticiones2" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">N° Orden</th>
                        <th scope="col" class="text-center">Asunto Peticion</th>
                        <th scope="col" class="text-center">Emisor</th>
                        <th scope="col" class="text-center">Fecha de Peticion</th>
                        <th scope="col" class="text-center">Hora de Peticion</th>
                        <th scope="col" class="text-center">Receptor</th>
                        <th scope="col" class="text-center">Fecha de Respuesta</th>
                        <th scope="col" class="text-center">Hora de Respuesta</th>
                        <th scope="col" class="text-center">Estado</th>
                        <th scope="col" class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <!-- TABLA PETICIONES -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- modal responderPeticion -->
<form autocomplete="off" id="formularioPeticiones">
    <div class="modal fade" id="responderPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" hidden>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                        <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><img id="imgModal" src=""><span id="tituloModal"><!-- TEXTO DINAMICO--></span> </h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="asunto" class="col-form-label">Asunto de la Peticion:</label>
                                    <input type="text" name="asunto" class="form-control" id="asunto" disabled>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="emisor" class="col-form-label">Emisor:</label>
                                    <input type="text" name="emisor" class="form-control" id="emisor" disabled>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaP" class="col-form-label">Fecha de la Peticion:</label>
                                    <input type="text" name="fechaP" class="form-control" id="fechaP" disabled>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="horaP" class="col-form-label">Hora de la Peticion:</label>
                                    <input type="number" name="horaP" class="form-control" id="horaP" disabled>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <details open>
                                        <summary>Descripcion del Envio</summary>
                                        <textarea name="txtDescripcion" id="txtDescripcion" class="form-control w-100 p-1" rows="3"></textarea>
                                    </details>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="receptor" class="col-form-label">Receptor:</label>
                                    <input type="text" name="receptor" class="form-control" id="receptor" disabled>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="tipoValidacion" class="col-form-label">Tipo de Validacion:</label>
                                    <select class="form-select form-control" name="tipoValidacion" id="tipoValidacion">
                                        <option selected value="">-- Seleccione --</option>
                                        <!-- ira el forEach -->
                                        <option value=""></option>
                                    </select>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaRespuesta" class="col-form-label">Fecha de Respuesta:</label>
                                    <div class="d-flex">
                                        <input type="date" name="fechaRespuesta" id="fechaRespuesta" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="respuesta" class="col-form-label">Respuesta:</label>
                                    <textarea name="respuesta" id="respuesta" class="form-control w-100 p-1" rows="3"></textarea>
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


<script>
    var ContadorPRC = 0; //Contador DataTable


    // Tabla   
    var tablePeticiones1 = $("#tablePeticiones1").DataTable({
        ajax: {
            url: '<?= base_url('peticiones/obtenerPeticiones') ?>',
            method: "POST",
            data: {},
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    ContadorPRC = ContadorPRC + 1;
                    return "<b>" + ContadorPRC + "</b>";
                },
            },
            {
                data: 'asunto'
            },
            {
                data: 'emisor'
            },
            {
                data: 'fecha_envio_pet'
            },
            {
                data: 'hora_envio_pet'
            },
            {
                data: 'tipo_validacion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarPeticion(' + data.id_usuario + ')" data-bs-target="#responderPeticion" data-bs-toggle="modal" width="20"><i class="bi bi-reply-all fs-4" title="Responder Peticion"></i></button>' +

                        '<button class="btn text-primary" onclick="seleccionarPeticion(' + data.id_usuario + ')" data-bs-target="#verPeticion" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4" title="Ver Peticion"></i></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });

    var filteredRows = tablePeticiones1.rows().every(function() {
        // Verificar la condición para cada fila
        if (this.data().data === "valor_condicion") {
            // Agregar la clase "show-row" a las filas que cumplen la condición
            $(this.node()).addClass("show-row");
        }
    });

    // Clonar las filas filtradas y agregarlas a la tabla filtrada
    var tablePeticiones2 = $("#tablePeticiones2");
    filteredRows.nodes().to$().clone().appendTo(tablePeticiones2);

    // Tabla   
    var filteredDataTable = tablePeticiones2.DataTable({
        ajax: {
            url: '<?= base_url('peticiones/obtenerPeticiones') ?>',
            method: "POST",
            data: {},
            dataSrc: "",
        },
        columns: [{
                data: null,
                render: function(data, type, row) {
                    ContadorPRC = ContadorPRC + 1;
                    return "<b>" + ContadorPRC + "</b>";
                },
            },
            {
                data: 'asunto'
            },
            {
                data: 'emisor'
            },
            {
                data: 'receptor'
            },
            {
                data: 'fecha_envio_pet'
            },
            {
                data: 'hora_envio_pet'
            },
            {
                data: 'msg_receptor'
            },
            {
                data: 'fecha_res_pet'
            },
            {
                data: 'hora_res_pet'
            },
            {
                data: 'tipo_validacion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="" data-bs-target="#agregarProveedor" data-bs-toggle="modal" width="20"><i class="bi bi-reply-all fs-4" title="Responder Peticion"></i></button>' +
                        '<button class="btn text-primary" onclick="" data-bs-target="#verPeticion" data-bs-toggle="modal" width="20"><i class="bi bi-eye-fill fs-4" title="Ver Peticion"></i></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });
</script>