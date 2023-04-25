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
                                <img class="iconos" src="<?php echo base_url('/img/bodega.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bodega 1</h5>
                                    <p class="subTexto" style="color: white;">Aseguradora:</p>
                                    <p class="subTexto" style="color:white">Solidaria</p>
                                    <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>

                            <div class="card" style="width: 13rem; height:18rem; ">
                                <img class="iconos" src="<?php echo base_url('/img/bodega.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bodega 2</h5>
                                    <p class="subTexto" style="color: white;">Aseguradora:</p>
                                    <p class="subTexto" style="color:white">Sura</p>
                                    <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="swiper-slide">
                <div class="d-flex justify-content-center  flex-wrap" style="gap:10px;">
    
                            <div class="card" style="width: 13rem; height:18rem;padding-right:20px; ">
                                <img class="iconos" src="<?php echo base_url('/img/bodega.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bodega 3</h5>
                                    <p class="subTexto" style="color: white;">Aseguradora:</p>
                                    <p class="subTexto" style="color:white">Bolivar</p>
                                    <a href="#" class="btnVer" style="font-family: 'Nunito', sans-serif;"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>

                            <div class="card" style="width: 13rem; height:18rem; ">
                                <img class="iconos" src="<?php echo base_url('/img/bodega.png'); ?>">
                                <div class="textoCard">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:25px;">Bodega 4</h5>
                                    <p class="subTexto" style="color: white;">Aseguradora:</p>
                                    <p class="subTexto" style="color:white">Colpatria</p>
                                    <a href="#" class="btnVer"><i class="bi bi-arrows-fullscreen" style="font-size:18px; margin-right:5px; margin-left:5px;"></i>Ver mas</a>
                                </div>
                            </div>
                            
                        </div>
                </div>
                
            </div>
            <div class="swiper-button-next" style="color:black"></div>
            <div class="swiper-button-prev"style="color:black"></div>
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