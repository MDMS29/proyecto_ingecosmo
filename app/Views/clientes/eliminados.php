<link rel="stylesheet" href="<?php echo base_url("css/proveedores_clientes/proveedores_clientes.css") ?>">

<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/img/clientes.png') ?>" /> Clientes Eliminados</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo de Documento</th>
                    <th scope="col" class="text-center">No. Documento</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <!-- <th scope="col" class="text-center">Telefono</th>
                    <th scope="col" class="text-center">Email</th> -->
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php if (empty($clientes)) { ?>
                    <tr>
                        <td class="text-center" colspan="7">
                            <h3>¡No hay Clientes Eliminados!</h3>
                        </td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($clientes as $c) { ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                            <td class="text-center"><?php echo $c['nombre_p'] . ' ' . $c['nombre_s']; ?></td>
                            <td class="text-center"><?php echo $c['apellido_p'] . ' ' . $c['apellido_s']; ?></td>
                            <td class="text-center"><?php echo $c['tipo_doc']; ?></td>
                            <td class="text-center"><?php echo $c['n_identificacion']; ?></td>
                            <td class="text-center"><?php echo $c['direccion']; ?></td>
                            <!-- <td class="text-center">< ?php echo $p['numero']; ?></td>
                        <td class="text-center">< ?php echo $p['Email']; ?></td> -->
                            <td class="text-center">

                                <button class="btn" href="#" data-href="<?php echo base_url('/clientes/eliminar') . '/' . $c['id_tercero'] . '/' . 'A'; ?>" data-bs-toggle="modal" data-bs-target="#modalActivarP"><img src="<?php echo base_url("/img/icon-volver.png"); ?>" alt="Boton Reestablecer" title="Reestablecer Proveedor" width="20" height="20"></button>

                            </td>
                        </tr>
                    <?php } ?>
                <?php } ?>
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
                        <img style=" width:80px; height:80px; margin:10px; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                    </div>

                    <div class="contenidoEliminarP">
                        <div class="bloqueModalP">
                            <img style=" width:100px; height:80px; margin:10px; " src="<?php echo base_url('/icons/icon-activar.png') ?>" />
                            <p class="textoModalP">¿Estas seguro de activar este registro?</p>
                        </div>

                    </div>
                </div>
                <div id="bloqueBtnP" class="modal-footer">
                    <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                    <a id="btnSi" class="btn btnAccionF">Activar</a>
                </div>

            </div>


        </div>

    </div>
</div>

</div>

<script>
    $('#modalActivarP').on('show.bs.modal', function(e) {
        $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    });


    $('.btnNo').click(function() {
        $("#modalActivarP").modal("hide");
    });
</script>