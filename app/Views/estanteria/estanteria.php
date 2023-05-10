<link rel="stylesheet" href="<?php echo base_url('css/estanteria.css') ?>">
<div id="content" class="p-4 p-md-5">
    <div class="estanteria">
        <h1 class="titulo"><img class="logo1" src="<?php echo base_url('/icons/estante-b.png'); ?>">ORGANIZACIÓN Y ESTANTERIA</h1>

        <div class="contenedorE">
            <div class="contenidoCardE">
                <?php foreach ($estantes as $dato) { ?>
                    <div class="card1">
                        <div class="imagenes">
                            <img class="iconos" src="<?php echo base_url('/img/') . $dato['n_iconos'] ?>">
                        </div>
                        <div class="textoCard">
                            <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:21px; color:black; margin-bottom:0">Estanteria <?php echo $dato['nombre'] ?></h5>
                            <div class="bloqueTextoE" id=<?= $dato['id'] ?>>
                                <p class="subTexto">
                                    Contiene <span id="contador"> </span>
                                </p>
                                <p class="subTexto">Contiene 30 articulos</p>
                            </div>
                            <a href="<?php echo base_url('filas/mostrarFila/') . $dato['id'] ?>" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver fila</a>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="footer-page">
            <button class="btn btnRedireccion" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus" width="20"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>

            <a class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/estanteria'); ?>"><img src="<?= base_url('icons/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</a>
        </div>
    </div>

</div>

<div class="modal fade" id="estanteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div style="background:white; border:5px solid #161666; border-radius:10px; height:500px; width:800px;" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:40px;"><img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">Agregar Categoria</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre">
                        <input hidden id="tp" name="tp">
                        <input hidden id="id" name="id">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Filas</label>
                        <input type="text" class="form-control" id="fila" name="fila">
                        <input hidden id="tp" name="tp">
                        <input hidden id="id" name="id">
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btnCerrar" data-bs-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btnGuardar1" id="btnGuardar">Guardar</button>
            </div>
        </div>
    </div>
</div>

<script>
    cards = $('.card1')
    for (let i = 0; i < cards.length; i++) {
        console.log($('.bloqueTextoE'));
        $.ajax({
            url: '<?= base_url('filas/contadorFilas') ?>',
            type: 'POST',
            data: {
                idEstante: $('#idEstante').val()
            },
            dataType: 'json',
            success: function(data) {
            }
        })
    };
</script>