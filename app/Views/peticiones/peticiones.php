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
<div class="modal fade" id="responderPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <input type="text" name="id" id="id" hidden>
    <div class="modal-dialog modal-xl">
        <div class="body">
            <div class="modal-content">
                <div class="modal-header flex align-items-center">
                    <div class="logo">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                    </div>
                    <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-eye-fill fs-4 text-primary"></i><span id="tituloModal"><!-- TEXTO DINAMICO--></span></h1>
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
                                <label for="apellido_s" class="col-form-label">Fecha de la Peticion:</label>
                                <input type="text" name="apellido_s" class="form-control" id="apellidoS" disabled>
                            </div>
                            <div class="mb-3" style="width: 100%">
                                <div class="">
                                    <label for="nIdenti" class="col-form-label">Hora de la Peticion:</label>
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