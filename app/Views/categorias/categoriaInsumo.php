<link rel="stylesheet" href="<?php echo base_url('css/categorias.css') ?>">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

<style>
    html,
    body {
        position: relative;
        height: 100%;
    }

    body {
        background: #eee;
        font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
        font-size: 14px;
        color: #000;
        margin: 0;
        padding: 0;
    }

    swiper-container {
        width: 100%;
        height: 100%;
    }

    swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>


<div id="content" class="p-4 p-md-5">
    <div class="contenedor">
        <h1 class="titulo"><img class="logo" src="<?php echo base_url('/img/imagen11.png'); ?>">INSUMOS</h1>
        <a href="<?php echo base_url('/home'); ?>" class="btn btnRedireccion" id="Regresar">Regresar</a>



        <swiper-container class="fondoCarrusel mySwiper" navigation="true">
            <swiper-slide>
                <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
                    <?php $i = 0;
                    for ($e = 0; $e < count($data);) {
                    ?>
                        <span><?php $e ?></span>
                        <?php
                        $e += 3;
                        $salida = array_slice($data, 0, $e);
                        ?>
                        <div class="card" style="width: 13rem; height:18rem; ">
                            <img class="iconos" src="<?php echo base_url('/img/') . $salida[$i]['n_iconos'] ?>">
                            <div class="textoCard">
                                <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;"><?= $salida[$i]['nombre'] ?></h5>

                                <a href="<?php echo base_url('insumos/mostrarInsumo/') . $salida[$i]['id_param_det'] . '/' . $salida[$i]['nombre'] . '/' . $salida[$i]['n_iconos'] . '/' . $salida[$i]['id_param_det'] ?>" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                            </div>
                        </div>
                        <?php if ($e == 8) { ?>

                        <?php break;
                        }
                        $i++ ?>
                    <?php } ?>

                </div>
            </swiper-slide>
            <swiper-slide><?php $r = 0;
                            for ($a = 0; $a < count($data);) {
                            ?>
                    <span><?php $a ?></span>
                    <?php
                                $a += 3;
                                $salida = array_slice($data, 3, $a);
                    ?>
                    <div class="card" style="width: 13rem; height:18rem;">
                        <img class="iconos" src="<?php echo base_url('/img/') . $salida[$r]['n_iconos'] ?>">
                        <div class="textoCard">
                            <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;"><?= $salida[$r]['nombre'] ?></h5>

                            <a href="<?php echo base_url('insumos/mostrarInsumo/') . $salida[$r]['id_param_det'] . '/' . $salida[$r]['nombre'] . '/' . $salida[$r]['n_iconos'] . '/' . $salida[$r]['id_param_det'] ?>" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                        </div>
                    </div>
                    <?php if ($e == 8) { ?>

                    <?php break;
                                }
                                $r++ ?>
                <?php } ?>
            </swiper-slide>
            <swiper-slide>
                <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">



                    <?php $j = 0;
                    for ($l = 0; $l < count($data);) {
                    ?>
                        <span><?php $l ?></span>
                        <?php
                        $l += 3;
                        $salida = array_slice($data, 6, $l);
                        ?>
                        <div class="card" style="width: 13rem; height:18rem;">
                            <img class="iconos" src="<?php echo base_url('/img/') . $salida[$j]['n_iconos'] ?>">
                            <div class="textoCard">
                                <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;"><?= $salida[$j]['nombre'] ?></h5>

                                <a href="<?php echo base_url('insumos/mostrarInsumo/') . $salida[$j]['id_param_det'] . '/' . $salida[$j]['nombre'] . '/' . $salida[$j]['n_iconos'] . '/' . $salida[$j]['id_param_det'] ?>" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                            </div>
                        </div>
                        <?php if ($e == 8) { ?>

                        <?php break;
                        }
                        $j++ ?>
                    <?php } ?>

                </div>
            </swiper-slide>
            <swiper-slide>
                <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
                    <div class="d-flex" style="gap:10px;">
                        <div class="card1" style="width: 13rem; height:18rem;">
                            <div class="textoCard" title="Agregar una nueva categoria">
                                <button type="submit" class="btn btnAgregar" data-bs-target="#categoriaModal" data-bs-toggle="modal"><i class="bi bi-plus-circle" style="font-size:70px;"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </swiper-slide>
                <div class="swiper-button-next" style="color:black;"></div>
                <div class="swiper-button-prev" style="color:black;"></div>
            </swiper-slide>
        </swiper-container>
        <!-- Slider main container -->
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
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-element-bundle.min.js"></script>
<script>
</script>