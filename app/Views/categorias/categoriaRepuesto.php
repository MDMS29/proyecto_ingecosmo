<link rel="stylesheet" href="<?php echo base_url('css/categorias.css') ?>" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
<div id="content" class="p-4 p-md-5">
    <div class="contenedor">
        <h1 class="titulo"><img class="logo" src="<?php echo base_url('/img/imagen11.png'); ?>" width="50"> REPUESTOS</h1>

        <div class="fondoCarrusel">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
                            <?php $s = 0;
                            for ($e = 0; $e < count($data);) {
                            ?>
                                <span><?php $e ?></span>
                                <?php
                                $e += 2;
                                $salida = array_slice($data, 0, $e);
                                ?>
                                <div class="card" style="width: 13rem; height:18rem; ">
                                    <img class="iconos" src="<?php echo base_url('/img/') . $salida[$s]['n_iconos'] ?>">
                                    <div class="textoCard">
                                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bodega <?= $salida[$s]['nombre'] ?></h5>

                                        <a href="<?php echo base_url('repuestos/mostrarBodega/') . $salida[$s]['id'] . '/' . $salida[$s]['nombre'] . '/' . $salida[$s]['n_iconos'] ?>" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                    </div>
                                </div>
                                <?php if ($e == 4) { ?>

                                <?php break;
                                }
                                $s++ ?>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
                            <?php $t = 0;
                            for ($o = 0; $o < count($data);) {
                            ?>
                                <span><?php $o ?></span>
                                <?php
                                $o += 2;
                                $salida = array_slice($data, 2, $o);
                                ?>
                                <div class="card" style="width: 13rem; height:18rem; ">
                                    <img class="iconos" src="<?php echo base_url('/img/') . $salida[$t]['n_iconos'] ?>">
                                    <div class="textoCard">
                                        <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bodega <?= $salida[$t]['nombre'] ?></h5>

                                        <a href="<?php echo base_url('repuestos/mostrarBodega/') . $salida[$t]['id'] . '/' . $salida[$t]['nombre'] . '/' . $salida[$t]['n_iconos'] ?>" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                    </div>
                                </div>
                                <?php if ($o == 4) { ?>

                                <?php break;
                                }
                                $t++ ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next" style="color:black"></div>
                <div class="swiper-button-prev" style="color:black"></div>
            </div>

        </div>
    </div>
    <div class="bloqueFooter">
        <div class="footer-page">
            <a class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/home'); ?>"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</a>
        </div>
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