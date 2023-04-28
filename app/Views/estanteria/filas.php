<link rel="stylesheet" href="css/estanteria.css">
<div id="content" class="p-4 p-md-5">
    <div class="estanteria">
        <h1 class="titulo"><img class="logo1" src="<?php echo base_url('/icons/estante-b.png'); ?>">ESTANTERIA BATERIAS</h1>

        <div class="contenedorE">
            <div class="contenidoCardF">

                <div class="card2">
                    <div class="imagenes">
                        <img class="iconos" src="<?php echo base_url('/img/baterias.png'); ?>">
                    </div>
                    <div class="textoFila">
                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black;">Fila 1</h5>
                        <div class="bloqueTextoE">
                            <p class="subTexto">4 baterias A4K</p>
                            <p class="subTexto">4 baterias bd5</p>
                            <p class="subTexto">4 baterias as2</p>
                            <p class="subTexto">4 baterias gr4</p>
                        </div>
                    </div>
                </div>

                <div class="card2">
                    <div class="imagenes">
                        <img class="iconos" src="<?php echo base_url('/img/baterias.png'); ?>">
                    </div>
                    <div class="textoFila">
                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black;">Fila 2</h5>
                        <div class="bloqueTextoE">
                            <p class="subTexto">4 baterias A4K</p>
                            <p class="subTexto">4 baterias bd5</p>
                            <p class="subTexto">4 baterias as2</p>
                            <p class="subTexto">4 baterias gr4</p>
                        </div>
                    </div>
                </div>
                <div class="card2">
                    <div class="imagenes">
                        <img class="iconos" src="<?php echo base_url('/img/baterias.png'); ?>">
                    </div>
                    <div class="textoFila">
                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black;">Fila 3</h5>
                        <div class="bloqueTextoE">
                            <p class="subTexto">4 baterias A4K</p>
                            <p class="subTexto">4 baterias bd5</p>
                            <p class="subTexto">4 baterias as2</p>
                            <p class="subTexto">4 baterias gr4</p>
                        </div>
                    </div>
                </div>
                <div class="card2">
                    <div class="imagenes">
                        <img class="iconos" src="<?php echo base_url('/img/baterias.png'); ?>">
                    </div>
                    <div class="textoFila">
                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black;">Fila 4</h5>

                        <div class="bloqueTextoE">
                            <p class="subTexto">4 baterias A4K</p>
                            <p class="subTexto">4 baterias bd5</p>
                            <p class="subTexto">4 baterias as2</p>
                            <p class="subTexto">4 baterias gr4</p>
                        </div>
                    </div>
                </div>

                <div class="card2">
                    <div class="imagenes">
                        <img class="iconos" src="<?php echo base_url('/img/baterias.png'); ?>">
                    </div>
                    <div class="textoFila">
                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black;">Fila 5</h5>
                        <div class="bloqueFila"> 
                        <div class="bloqueTextoE">
                            <p class="subTexto">4 baterias A4K</p>
                            <p class="subTexto">4 baterias bd5</p>
                            <p class="subTexto">4 baterias as2</p>
                            <p class="subTexto">4 baterias gr4</p>
                        </div>
                        <div class="bloqueTextoE">
                            <p class="subTexto">4 baterias A4K</p>
                            <p class="subTexto">4 baterias bd5</p>
                            <p class="subTexto">4 baterias as2</p>
                            <p class="subTexto">4 baterias gr4</p>
                        </div>
                    </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="footer-page">
            <button class="btn btnRedireccion" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus" width="20"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>

            <button class="btn btnRedireccion" alt="icon-plus" width="20"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
        </div>
    </div>

</div>

<div class="modal fade" id="estanteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div style="background:white; border:5px solid #161666; border-radius:10px; height:400px; width:800px;" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:40px;"><img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">Agregar Categoria</h1>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Nombre</label>
                        <input type="text" class="inputNombreC" id="nombre" name="nombre">
                        <input hidden id="tp" name="tp">
                        <input hidden id="id" name="id">
                    </div>

                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Filas</label>
                        <input type="text" id="fila" name="fila">
                        <input hidden id="tp" name="tp">
                        <input hidden id="id" name="id">
                    </div>

                    <div class="mb-3">
                        <label for="message-text" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Imagen</label>
                        <input type="file" id="imagen" name="imagen" accept="image/*">
                    </div>

                    <div class="mb-3">
                        <button class="contenedor-btn-file">
                            <i class="fas fa-file"></i>
                            Adjuntar archivo
                            <label for="btn-file"></label>
                            <input type="file" id="btn-file">
                        </button>
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