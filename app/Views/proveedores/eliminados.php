<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_cliente.css") ?>">


<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/icon-proveedores.png') ?>" /> Proveedores Eliminados</h2>

    <div class="table-responsive p-2">

        <table class="table table-striped" id="tableProveedores" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody class="text-center">
            <?php $contador = 0 ?>
                <?php if (empty($proveedores)) { ?>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>¡No hay Proveedores Eliminados!</h3>
                        </td>
                    </tr>
                <?php } ?>
                <!-- texto dinamico -->
            </tbody>

        </table>
    </div>

    <div class="footer-page">
        <a href="<?php echo base_url('/proveedores') ?>" class="btn btnRedireccion">Regresar</a>
    </div>

    <!-- Modal Confirma activar -->
    <div class="modal fade" id="modalActivarP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">

            <div class="modal-content" id="modalEliminarContentP">
                <div class="modalContenedorP">
                    <div id="contenidoHeaderEliminarP" class="modal-header">
                        <img style=" width:80px; height:60px; margin-bottom: 0; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                        <button type="button" style="margin:0;" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="contenidoEliminarP">
                        <div class="bloqueModalP">
                            <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/img/icon-alerta.png') ?>" />
                            <p class="textoModalP">¿Estas seguro de activar este Proveedor?</p>
                        </div>

                    </div>
                </div>
                <div id="bloqueBtnP" class="modal-footer">
                    <button id="btnNo" class="btn btnRedireccion" data-bs-dismiss="modal">Cerrar</button>
                    <a id="btnSi" class="btn btnAccionF">Reestablecer</a>
                </div>

            </div>
        </div>
    </div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var ContadorPRC = 0

    //Cambiar estado de "Inactivo" a "Activo"
    $('#modalActivarP').on('shown.bs.modal', function(e) {
        $(this).find('#btnSi').attr('onclick', `ReestablecerProveedor(${$(e.relatedTarget).data('href')})`)
    })

    function ReestablecerProveedor(id) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('proveedores/cambiarEstado') ?>",
            data: {
                id,
                estado: 'A'
            }
        }).done(function(data) {
            mostrarMensaje('success', data)
            ContadorPRC = 0
            $('#modalActivarP').modal('hide')
            tableProveedores.ajax.reload(null, false)
        })
    }

    // Tabla   
    var tableProveedores = $("#tableProveedores").DataTable({
        ajax: {
            url: '<?= base_url('proveedores/obtenerProveedores') ?>',
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
                data: 'razon_social'
            },
            {
                data: 'n_identificacion'
            },
            {
                data: 'direccion'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" data-href=' + data.id_tercero + ' data-bs-toggle="modal" data-bs-target="#modalActivarP"><img src="<?php echo base_url("img/restore.png") ?>" alt="Boton Restablecer" title="Restablecer Proveedor" width="20"></button>'
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