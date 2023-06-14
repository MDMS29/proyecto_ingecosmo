<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

    <div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
        <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon-b.png')  ?>" /> Peticiones</h2>
        <div class="table-responsive p-2">
            <!-- <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
                <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="0">#</a> - <a class="toggle-vis btn" data-column="3">Direccion</a> - <a class="toggle-vis btn" data-column="4">Telefono</a>
            </div> -->
            <table class="table table-striped" id="tablePeticiones" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">N° Orden</th>
                        <th scope="col" class="text-center">Asunto Peticion</th>
                        <th scope="col" class="text-center">Emisor</th>
                        <th scope="col" class="text-center">Fecha</th>
                        <th scope="col" class="text-center">Hora</th>
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

    <script>
        var ContadorPRC = 0; //Contador DataTable


        // Tabla   
        var tablePeticiones = $("#tablePeticiones").DataTable({
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
    </script>