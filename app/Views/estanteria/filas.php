<link rel="stylesheet" href="<?php echo base_url('css/estanteria.css') ?>">
<div id="content" class="p-4 p-md-5">
    <div class="estanteria">
        <div class="verFilas" id="verFilas">

            <h1 class="titulo" style="text-transform:uppercase;">ESTANTERIA DE <?php echo $titulo['nombre'] ?></h1>

        </div>

        <div class="contenedorE">
            <div class="contenidoCardF">

                <?php if (empty($data)) { ?>
                    <div class="contenidoCardF">
                        <p>No se encuentran filas - <?php echo $titulo['nombre'] ?></p>
                    </div>
                    <?php } else { ?>
                        <?php foreach ($data as $dato) { ?>
                            
                            <input type="hidden" name="categoria" id="categoria" value="<?= $dato['categoria_material']?>">
                            <div class="card2">
                            <div class="imagenes">
                                <img class="iconos" src="<?php echo base_url('/img/'). $dato['icono'] ?>">
                            </div>
                            <div class="textoFila" id="Contenedor">
                                <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black; margin-bottom:0;">Fila <?php echo $dato['fila']; ?></h5>
                                <input id='nombreFila' value="<?php echo $dato['fila']; ?>" hidden>
                                <div class="bloqueTextoE" id="<?php echo $dato['fila']; ?>">
                                    <!-- INFORMACION DINAMICA -->
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="footer-page">
            <button class="btn btnRedireccion" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus" width="20"><img src="<?= base_url('icons/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>

            <a class="btn btnRegresar" style="background: #E25050; color:white;" href="<?php echo base_url('/estanteria'); ?>"><img src="<?= base_url('icons/regresa.png') ?>" alt="icon-plus" width="16"> Regresar</a>
        </div>
    </div>
</div>



<form autocomplete="off" id="agregarFila">
    <div class="modal fade" id="estanteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div style="background:white; border:5px solid #161666; border-radius:10px; height:420px; width:800px;" class="modal-content">
                <div class="modal-header">
                    <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">


                    <div class="tituloHeader">
                        <img class="imgAgregar" src="<?php echo base_url('/img/agregar11.png') ?>" />
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:40px;">Agregar Categoria</h1>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrarX"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">N° fila</label>
                            <select class="form-select" id="fila" name="fila">
                                <option selected>-- SELECCIONE UNA FILA --</option>
                                <?php foreach ($filas as $fila) { ?>
                                    <option value=<?php echo $fila['fila']; ?>><?php echo $fila['fila']; ?></option>
                                <?php } ?>
                            </select>
                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:20px; color:black;">Nombre producto</label>
                            <select class="form-select" id="nombre_prod" name="nombre_prod">
                            </select>
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
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    bloque = $('.bloqueTextoE')
    for (let i = 0; i < bloque.length; i++) {
        $.ajax({
            url: '<?php echo base_url('filas/obtenerMaterialesFila/') ?>' + bloque[i].id,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                var cadena = ""
                for (let i = 0; i < res.length; i++) {
                    cadena += `<p class="subTexto"><i class="bi bi-caret-right-fill"></i> ${res[i].nombre}</p>`
                }
                $(`#${bloque[i].id}`).html(cadena)
            }
        })
    }


    categoria = $('#categoria').val()
    $.ajax({
        url: '<?php echo base_url('filas/obtenerMaterialesCate/') ?>' + categoria,
        type: 'POST',
        dataType: 'json',
        success: function(res) {
            var cadena
            cadena = `<option value="" selected>-- SELECCIONE PRODUCTOS --</option>`
            for (let i = 0; i < res.length; i++) {

                cadena += `<option value=${res[i].id_material}>${res[i].nombre}</option>`
            }
            $('#nombre_prod').html(cadena)
        }
    })

    $('#agregarFila').on('submit', function(e) {
        e.preventDefault();
        fila = $('#fila').val() //Esto toma el valor por medio del id
        nombre_prod = $('#nombre_prod').val() //Esto toma el valor por medio del id
        $.ajax({
            url: "<?php echo base_url('/filas/insertar'); ?>",
            type: 'POST',
            data: {
                fila,
                nombre_prod
            },
            dataType: 'json',
            success: function(res) {
                if (res == 1) {
                    mostrarMensaje('success', '¡Se ha guardado el insumo en la fila!');
                    setTimeout(() => {
                        window.location.reload()
                    }, 2000)
                }
            }
        })
    })
</script>