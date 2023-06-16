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
            <table class="table table-striped" id="tablePeticionesRecibidos" width="100%" cellspacing="0">
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
            <table class="table table-striped" id="tablePeticionesEnviados" width="100%" cellspacing="0">
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

<script>
    var ContadorPRC = 0; //Contador DataTable


    // Tabla   
    var tablePeticionesRecibidos = $("#tablePeticionesRecibidos").DataTable({
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

    // Tabla   
    var tablePeticionesEnviados = $("#tablePeticionesEnviados").DataTable({
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