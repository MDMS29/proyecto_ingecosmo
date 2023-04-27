<link rel="stylesheet" href="<?php echo base_url('css/categorias.css') ?>">
<div id="content" class="p-4 p-md-5">
    <div class="contenedor">
        <h1 class="titulo"><img class="logo" src="<?php echo base_url('/img/imagen11.png'); ?>">MATERIALES</h1>
        <button class="btnRegresar">Regresar</button>



        <div class="fondoCarrusel">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
                            <div class="card" style="width: 13rem; height:18rem;padding-right:20px; ">
                                <img class="iconos" src="<?php echo base_url('/img/imagen2.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Baterias</h5>
                                    <a href="<?php echo base_url('materiales') ?>"class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>

                            <div class="card" style="width: 13rem; height:18rem; ">
                                <img class="iconos" src="<?php echo base_url('/img/combustible.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Aceites</h5>
                                    <a href="<?php echo base_url('materiales') ?>"class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a> 
                                </div>
                            </div>

                            <div class="card" style="width: 13rem; height:18rem; ">
                                <img class="iconos" src="<?php echo base_url('/img/imagen6.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Pinturas</h5>
                                    <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">

                            <div class="card" style="width: 13rem; height:18rem;padding-right:20px; ">
                                <img class="iconoBombi" src="<?php echo base_url('/img/imagen1.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bombilleria</h5>
                                    <a href="#" class="btnVer" style="font-family: 'Nunito', sans-serif;"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>

                            <div class="card" style="width: 13rem; height:18rem; ">
                                <img class="iconoBroca" src="<?php echo base_url('/img/imagen7.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Brocas</h5>
                                    <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>
                            <div class="card" style="width: 13rem; height:18rem; ">
                                <img class="iconos" src="<?php echo base_url('/img/imagen8.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Remaches</h5>
                                    <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
                            <div class="d-flex" style="gap:10px;">
                                <div class="card" style="width: 13rem; height:18rem;padding-right:20px; ">
                                    <img class="iconos" src="<?php echo base_url('/img/imagen9.png'); ?>">
                                    <div class="textoCard">
                                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Discos</h5>
                                        <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                    </div>
                                </div>

                                <div class="card" style="width: 13rem; height:18rem; ">
                                    <img class="iconos" src="<?php echo base_url('/img/imagen10.png'); ?>">
                                    <div class="textoCard">
                                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Lubricantes</h5>
                                        <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                    </div>
                                </div>
                                <div class="card1" style="width: 13rem; height:18rem;">
                                    <div class="textoCard">
                                        <button type="submit" class="btn btnAgregar" data-bs-target="#categoriaModal" data-bs-toggle="modal"><i class="bi bi-plus-circle" style="font-size:70px;"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="swiper-button-next" style="color:black;"></div>
                <div class="swiper-button-prev" style="color:black;"></div>
            </div>
        </div>

    </div>

</div>


<div class="modal fade" id="categoriaModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div style="background:white;" class="modal-content">
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
                        <label for="message-text" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Imagen</label>
                        <input type="file" class="form-control" id="imagen" name="imagen">
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

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
    var swiper = new Swiper(".mySwiper", {
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>