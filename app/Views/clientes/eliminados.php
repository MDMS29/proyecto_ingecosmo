<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">

<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes-b.png') ?>" /> Clientes Eliminados</h2>
    <div class="table-responsive p-2">
        <table class="table table-striped" id="tableClientes" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo de Documento</th>
                    <th scope="col" class="text-center">No. Documento</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Telefono</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <?php $contador = 0 ?>
                <?php if (empty($clientes)) { ?>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>¡No hay Clientes Eliminados!</h3>
                        </td>
                    </tr>
                <?php } ?>
                <!-- texto dinamico -->
            </tbody>
        </table>
    </div>

    <div class="footer-page">
        <a href="<?php echo base_url('/clientes') ?>" class="btn btnRedireccion">Regresar</a>
    </div>

    <!-- Modal Confirma activar -->
    <div class="modal fade" id="modalActivarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">


        <div class="modal-dialog modal-dialog-centered modal-md" role="document">

            <div class="modal-content" id="modalEliminarContentP">
                <div class="modalContenedorP">
                    <div id="contenidoHeaderEliminarP" class="modal-header">
                        <img style=" width:80px; height:80px; margin:0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="contenidoEliminarP">
                        <div class="bloqueModalP">
                            <img style=" width:100px; height:80px; margin:10px; " src="<?php echo base_url('/img/icon-activar.png') ?>" />
                            <p class="textoModalP">¿Estas seguro de reestablece este cliente?</p>
                        </div>

                    </div>
                </div>
                <div id="bloqueBtnP" class="modal-footer">
                    <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                    <a id="btnSi" class="btn btnAccionF">Reestablecer</a>
                </div>

            </div>


        </div>

    </div>
</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    ContadorPRC = 0


    //Cambiar estado de "Inactivo" a "Activo"
    $('#modalActivarP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestablecerCLiente(${$(e.relatedTarget).data('href')})`)
    })

    function ReestablecerCLiente(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('clientes/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#modalActivarP').modal('hide')
            tableClientes.ajax.reload(null, false)
        })
    }

    // Tabla   
    var tableClientes = $("#tableClientes").DataTable({
        ajax: {
            url: '<?= base_url('clientes/obtenerClientes') ?>',
            method: "POST",
            data: {
                estado: 'I'
            },
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
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.nombre_p + " " + data.nombre_s;
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    // Combinar campos
                    return data.apellido_p + " " + data.apellido_s;
                }
            },
            {
                data: 'tipoDoc'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'direccion'
            },
            {
                data: 'telefono'
            },
            {
                data: 'email'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalActivarP"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restablecer" title="Restablecer Cliente" width="20"></button>'
                    );
                },
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        },

    });


    $('.btnNo').click(function() {
        $("#modalActivarP").modal("hide");
    });
</script>