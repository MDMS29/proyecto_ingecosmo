<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/buzon-b.png')  ?>" /> Peticiones Recibidas</h2>

    <div class="table-responsive p-2">
        <table class="table table-striped" id="tablePeticiones" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">N° Peticion</th>
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
    <div class="footer-page mt-4">
        <a href="<?= base_url('peticiones/enviadosAdmin') ?>" class="btn btnRedireccion"> <img src="<?php echo base_url('/img/buzon.png')  ?>" alt="Enviados" width="20"> Peticiones Enviadas</a>
    </div>
</div>

<!-- modal Responder Peticion -->
<form autocomplete="off" id="formularioPeticiones">
    <div class="modal fade" id="responderPeticion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" hidden>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="body-R">
                <div class="modal-content" style="height: 100%;">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                        <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><i class="bi bi-reply-all fs-4" title="Responder Peticion"></i><span id="tituloModal"><!--texto--> </span> </h1>
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
                                    <input type="time" name="horaP" class="form-control" id="horaP" disabled>
                                </div>
                            </div>
                            <br>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <details open>
                                        <summary>Descripcion del Envio</summary>
                                        <textarea disabled name="txtDescripcion" id="txtDescripcion" class="form-control w-100 p-1" rows="3"></textarea>
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
                                    <label for="estado" class="col-form-label">Estado:</label>
                                    <select class="form-select form-select" name="cargo" id="cargo">
                                        <option selected value="">-- Seleccione --</option>
                                        <?php foreach ($estados as $e) { ?>
                                            <option value="<?= $e['id_param_enc'] ?>"><?= $e['nombre'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaRespuesta" class="col-form-label">Fecha de Respuesta:</label>
                                    <div class="d-flex">
                                        <input disabled type="date" name="fechaRespuesta" id="fechaRespuesta" class="form-control">
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
                        <button type="submit" class="btn btnAccionF" id="btnGuardar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>


<script>
    var ContadorPRC = 0; //Contador DataTable


    var tablaAdminRecibidos = $("#tablePeticiones").DataTable({
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
                data: 'nomEmisor'
            },
            {
                data: 'fecha_envio_pet'
            },
            {
                data: 'hora_envio_pet'
            },
            {
                data: 'estado'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarPeticion(' + data.id_peticion + ')" data-bs-target="#responderPeticion" data-bs-toggle="modal" width="20"><i class="bi bi-reply-all fs-4" title="Responder Peticion"></i></button>'
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
            $('#tituloModal').text('Responder Peticion - ' + id)
            $('#fechaRespuesta').attr('disabled', '')
            $('#id').val(res[0]['id_peticion'])
            $('#asunto').val(res[0]['asunto'])
            $('#emisor').val(res[0]['emisor'])
            $('#fechaP').val(res[0]['fecha_envio_pet'])
            $('#horaP').val(res[0]['hora_envio_pet'])
            $('#txtDescripcion').val(res[0]['msg_emisor'])
            $('#receptor').val(res[0]['receptor'])
            $('#estado').val(res[0]['tipo_validacion'])
            $('#fechaRespuesta').val(res[0]['fecha_res_pet'])
            $('#respuesta').val(res[0]['msg_receptor'])
        })
    }
</script>