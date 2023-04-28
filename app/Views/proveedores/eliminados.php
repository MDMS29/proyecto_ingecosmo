<link rel="stylesheet" href="<?php echo base_url("css/proveedores/proveedores.css") ?>">

<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:40px; height:40px; " src="<?php echo base_url('/icons/icon-proveedores.png') ?>" /> Proveedores Eliminados</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">Id</th>
                    <th scope="col" class="text-center">Razon Social</th>
                    <th scope="col" class="text-center">NIT</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php foreach ($proveedores as $p) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                        <td class="text-center"><?php echo $p['razon_social']; ?></td>
                        <td class="text-center"><?php echo $p['n_identificacion']; ?></td>
                        <td class="text-center"><?php echo $p['direccion']; ?></td>
                        <td class="text-center">

                            <input class="btnEditar" style="border: solid #161666 1px;" href="#" data-href="<?php echo base_url('/proveedores/eliminar') . '/' . $p['id_tercero'] . '/' . 'A'; ?>" data-bs-toggle="modal" data-bs-target="#modalActivarP" type="image" src="<?php echo base_url("/img/icon-volver.png"); ?>" width="16" height="16" title="Activar"></input>


                        </td>
                    </tr>
                <?php } ?>
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