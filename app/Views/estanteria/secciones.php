<link rel="stylesheet" href="<?php echo base_url('css/estanteria.css') ?>">
<div id="content" class="p-4 p-md-5">
    <div class="estanteria">
        <div class="verFilas" id="verFilas">

            <h1 class="titulo" style="text-transform:uppercase;">Bodega de <?php echo $titulo['nombre'] ?></h1>
        </div>

        <div class="contenedorE">
            <div class="contenidoCardF">

                <?php if (empty($data)) { ?>

                    <div class="contenidoCardF">
                        <p>No se encuentran filas - <?php echo $titulo['nombre'] ?></p>
                    </div>
                <?php } else { ?>
                    <?php foreach ($data as $dato) { ?>
                        <input type="hidden" name="categoria" id="categoria" value="<?= $dato['tipo_fila'] ?>">
                        <div class="secciones">
                            <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black; margin-bottom:0; margin-left:80px; padding-top: 10px; padding-right: 80px;"><?php echo $dato['nombre']; ?></h5>
                            <img class="iconoSec" src="<?php echo base_url('/img/') . $dato['iconoF'] ?>">
                            <p>holi fcjnjfdnhnwe</p>
                            <a class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver</a>

                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="footer-page">
            <a class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/estanteria'); ?>"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</a>
        </div>
    </div>
</div>

<form autocomplete="off" id="agregarFila">
    <div class="modal fade" id="estanteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-sm">
            <div style="background:white; border:5px solid #161666; border-radius:10px; height:350px; width:800px;" class="modal-content">
                <div class="modal-header">
                    <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">
                    <div class="bloqueHeader">
                        <!-- <img class="iconosModal" src="< ?php echo base_url('/img/') . $dato['icono'] ?>"> -->
                        <label class="tituloMover" style="font-weight: 400;"><i class="bi bi-arrow-left-right"></i> Mover -</label>
                        <div class="tituloHeader">

                            <!-- <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-size:40px;"><i class="bi bi-arrow-left-right" style="margin-right: 8px;"></i>Mover Insumos</h1> -->
                        </div>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrarX" onclick="limpiarCampos()"></button>
                </div>
                <div class="modal-body">
                    <form>

                        <div class="mb-3">
                            <input type="text" hidden class="" id="idMaterialMove" name="idMaterialMove">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:17px; font-weight: 600;">Fila <i style="color:crimson">*</i></label>
                            <select id="fila1" class="form-select" name="fila">
                                <option value="" selected>-- Seleccione --</option>
                                <?php foreach ($filas as $fila) { ?>
                                    <option id="<?php echo $fila['id_fila']; ?>F" value=<?php echo $fila['id_fila']; ?>> <?php echo $fila['nombre']; ?></option>
                                <?php } ?>
                            </select>
                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                    <button type="button" class="btn btnCerrar" data-bs-dismiss="modal" onclick="limpiarCampos()">Cerrar</button>
                    <button type="submit" class="btn btnGuardar1" id="btnGuardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>