<link rel="stylesheet" href="<?php echo base_url('css/usuarios/usuarios.css') ?>">
<link rel="stylesheet" href="<?php echo base_url("css/proveedores/proveedores.css") ?>">

<div id="content" class="p-4 p-md-5">
    <h2 class="text-center mb-4"><img style=" width:50px; height:50px; " src="<?php echo base_url('/img/trabajadores-n.png') ?>" /> Trabajadores</h2>
    <div class="table-responsive" style="overflow:scroll-vertical;overflow-y: scroll !important; overflow:scroll-horizontal;overflow-x: scroll !important;height: 600px;background-color:white;">
        <table class="table table-bordered table-sm table-hover" id="tableUsuarios" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Nombres</th>
                    <th scope="col" class="text-center">Apellidos</th>
                    <th scope="col" class="text-center">Tipo Documento</th>
                    <th scope="col" class="text-center">Identificación</th>
                    <th scope="col" class="text-center">Cargo</th>
                    <th scope="col" class="text-center">Direccion</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $contador = 0 ?>
                <?php foreach ($trabajadores as $t) { ?>
                    <tr>
                        <th scope="row" class="text-center"><?= $contador += 1 ?></th>
                        <td class="text-center"><?= $t['nombre_p'] . ' ' . $t['nombre_s'] ?></td>
                        <td class="text-center"><?= $t['apellido_p'] . ' ' . $t['apellido_s'] ?></td>
                        <td class="text-center"><?= $t['tipo_identificacion'] ?></td>
                        <td class="text-center"><?= $t['n_identificacion'] ?></td>
                        <td class="text-center"><?= $t['nombre_cargo'] ?></td>
                        <td class="text-center"><?= $t['direccion'] ?></td>
                        <td class="text-center">
                            <button class="btn" href="#" data-href="<?php echo base_url('/trabajadores/eliminar') . '/' . $t['id_trabajador'] . '/' . 'A'; ?>" data-bs-toggle="modal" data-bs-target="#modalConfirmaP"><img src="<?php echo base_url('icons/delete.svg') ?>" alt="Boton Eliminar" title="Eliminar Trabajador"></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="footer-page">
        <a href="<?= base_url('home') ?>" class="btn btnAccionF"> <img src="<?= base_url('icons/delete.png') ?>" alt="icon-plus" width="20"> regresar</a>
    </div>
</div>


<div class="modal fade" id="modalConfirmaP" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">

        <div class="modal-content" id="modalEliminarContentP">
            <div class="modalContenedorP">
                <div id="contenidoHeaderEliminarP" class="modal-header">
                    <img style=" width:80px; height:60px; margin-bottom: 50px; " src="<?php echo base_url('/img/ingecosmo.png') ?>" />
                </div>

                <div class="contenidoEliminarP">
                    <div class="bloqueModalP">
                        <img style=" width:80px; height:60px; margin:10px; " src="<?php echo base_url('/icons/icon-alerta.png') ?>" />
                        <p class="textoModalP">¿Estas seguro de eliminar este Proveedor?</p>
                    </div>

                </div>
            </div>
            <div id="bloqueBtnP" class="modal-footer">
                <button id="btnNo" class="btn btnRedireccion" data-dismiss="modal">Cerrar</button>
                <a id="btnSi" class="btn btnAccionF">Eliminar</a>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    $('#modalConfirmaP').on('show.bs.modal', function(e) {
        $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    });

    $('#modalActivarP').on('show.bs.modal', function(e) {
        $(this).find('#btnSi').attr('href', $(e.relatedTarget).data('href'));
    });


    $('.btnNo').click(function() {
        $("#modalActivarP").modal("hide");
    });

    //Mostrar mensajes de SwalFire
    function mostrarMensaje(tipo, msg) {
        Swal.fire({
            position: 'center',
            icon: `${tipo}`,
            text: `${msg}`,
            showConfirmButton: false,
            timer: 1500
        })
    }
</script>