<link rel="stylesheet" href="<?= base_url('css/carrito.css') ?>">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- contenedor card -->
<div id="content" class="p-4 p-md-5">
    <div class="detallesCarrito" id="detallesCarrito">
        <h2>Detalles</h2>
    </div>


    <div class="contenedor-d">
        <aside class="product-detail">
            <div class="title-container">

                <!-- <button class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/home'); ?>"><img src="<?= base_url('img/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</button> -->
                <p class="title">Carrito materiales</p>
            </div>



            <scroll-container>
                <div class="my-order-content">
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/remaches.png" width="30" height="30" alt="remaches">
                        </figure>
                        <p>Remache3</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/pinturas.png" width="20" height="20" alt="remaches">
                        </figure>

                        <p>Pintura34</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>

                        <div class="cerrar">

                            <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                        </div>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/lubricantes.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Lubricante23</p>

                        <div class="contadorProductos">


                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>

                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/discos.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Disco32</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/remaches.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Remache3</p>

                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>

                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/pinturas.png" width="20" height="20" alt="remaches">
                        </figure>

                        <p>Pintura34</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/lubricantes.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Lubricante23</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/discos.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Disco32</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/remaches.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Remache3</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/pinturas.png" width="20" height="20" alt="remaches">
                        </figure>

                        <p>Pintura34</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/lubricantes.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Lubricante23</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>
                    <div class="shopping-cart">
                        <figure>
                            <img src="<?php echo base_url(); ?>/img/discos.png" width="30" height="30" alt="remaches">
                        </figure>

                        <p>Disco32</p>
                        <div class="contadorProductos">
                            <input class="btn btnAccionF btn-sm" type="button" title="Agregar Producto" Value="+" onclick="agregar()"> 1
                            <input class="btn btnRedireccion btn-sm" type="button" title="Borrar Producto" Value="-" onclick="borrar()">
                        </div>
                        <button class="btn btnRegresar"><img src="<?= base_url('img/cerrar-ventana.png') ?>" width="30" height="30" alt="icon-plus"></button>
                    </div>

                </div>
            </scroll-container>
            <div class=botonCheckout>
                <button class="primary-button">
                    Checkout
                </button>
            </div>
    </div>

    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/remaches.png" width="50" height="50" alt="remaches">
        <p>Remache3</p>
        
    </div>
    <hr class="lala" />

    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/pinturas.png" width="50" height="50" alt="remaches">
        <p>Pintura34</p>
    </div>
    <hr class="lala" />
    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/lubricantes.png" width="50" height="50" alt="remaches">
        <p>Lubricante23</p>
    </div>
    <hr class="lala" />

    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/discos.png" width="50" height="50" alt="remaches">
        <p>Disco32</p>
    </div>
    <hr class="lala" />

    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/remaches.png" width="50" height="50" alt="remaches">
        <p>Remache3</p>
    </div>
    <hr class="lala" />

    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/pinturas.png" width="50" height="50" alt="remaches">
        <p>Pintura34</p>
    </div>
    <hr class="lala" />
    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/lubricantes.png" width="50" height="50" alt="remaches">
        <p>Lubricante23</p>
    </div>
    <hr class="lala" />

    <div class="shopping-cart1">

        <img src="<?php echo base_url(); ?>/img/discos.png" width="50" height="50" alt="remaches">
        <p>Disco32</p>
    </div>
    <hr class="lala" />

    </aside>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

</script>