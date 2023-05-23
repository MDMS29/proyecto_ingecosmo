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

                        <input type="hidden" name="categoria" id="categoria" value="<?= $dato['categoria_material'] ?>">
                        <div class="card2">
                            <div class="imagenes">
                                <img class="iconos" src="<?php echo base_url('/img/') . $dato['icono'] ?>">
                            </div>

                            <div class="textoFila" id="Contenedor">
                                <div class="bloque1">
                                    <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black; margin-bottom:0;">Fila <?php echo $dato['fila']; ?></h5>
                                    <input id='nombreFila' value="<?php echo $dato['fila']; ?>" hidden>
                                    <div class="bloqueTextoE" id="<?php echo $dato['fila']; ?>">
                                    </div>
                                    <!-- INFORMACION DINAMICA -->
                                </div>
                                <div class="bloque2">
                                    <button class="btn btnRedireccion" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus"><i class="bi bi-arrow-left-right"></i> Mover</button>
                                </div>
                            </div>
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
        <div class="modal-dialog modal-dialog-centered">
            <div style="background:white; border:5px solid #161666; border-radius:10px; height:420px; width:800px;" class="modal-content">
                <div class="modal-header">
                    <img class="imagenEncab" src="<?php echo base_url('/img/ingecosmo.png'); ?>">


                    <div class="tituloHeader">
                        <img class="imgAgregar" src="<?php echo base_url('/img/agregar11.png') ?>" />
                        <h1 class="modal-title fs-5" id="exampleModalLabel" style="font-family: 'Nunito', sans-serif; font-size:40px;">Agregar Insumos</h1>
                    </div>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="cerrarX" onclick="limpiarCampos()"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:17px; font-weight: 600;">N° fila</label>
                            <select class="form-select" id="fila" name="fila" style="background: #ECEAEA;">
                                <option selected>-- SELECCIONE UNA FILA --</option>
                                <?php foreach ($filas as $fila) { ?>
                                    <option value=<?php echo $fila['fila']; ?>><?php echo $fila['fila']; ?></option>
                                <?php } ?>
                            </select>
                            <input hidden id="tp" name="tp">
                            <input hidden id="id" name="id">
                        </div>

                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label" style="font-family: 'Nunito', sans-serif; font-size:17px; font-weight: 600;">Nombre Producto</label>
                            <select class="form-select" id="nombreProd" name="nombreProd" style="background: #ECEAEA;">
                            </select>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnCerrar" data-bs-dismiss="modal" onclick="limpiarCampos()">Cerrar</button>
                    <button type="submit" class="btn btnGuardar1" id="btnGuardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="modal fade" id="detallesModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <input type="text" name="id" id="id" hidden>
        <input type="text" name="tp" id="tp" hidden>

        <div class="modal-content" id="modalContentD">

            <div class="modal-header" id="modalHeaderD">
                <div class="header2">
                    <img src="<?php echo base_url('/img/masDetalles.png') ?>" id="imagenDetalle" class="detalles" />
                    <h5 class="modal-title text-center" id="titulo">Detalles</h5>
                </div>
                <img src="<?php echo base_url('/img/ingecosmo.png') ?>" class="logoIngecosmo" />
                <button type="button" class="btn-close" data-bs-toggle="modal" data-bs-target="#detallesModal" aria-label="Close"></button>
            </div>

            <div class="modal-body" id="modalBodyD">

                <div class="d-flex column-gap-3" style="width: 100%">
                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Nombre insumo:</label>
                        <input type="text" class="form-control" id="nombre1" name="nombre1" onInput="validarInput()" placeholder="" disabled>
                        <small id="msgEditar" class="invalido3"></small>
                    </div>

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Precio de Venta:</label>
                        <input type="text" class="form-control" id="precioVenta" name="precioVenta" placeholder="" disabled>
                    </div>

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Precio de Compra:</label>
                        <input type="text" class="form-control" id="precioCompra" name="precioCompra" placeholder="" disabled>
                    </div>

                    <div class="mb-3" style="width: 90%;">
                        <label for="exampleDataList" class="col-form-label">Cantidad Vendida:</label>
                        <input type="text" class="form-control" id="cantidadVendida" name="cantidadVendida" style="margin-left: 15px;" placeholder="" disabled>
                    </div>
                </div>

                <div class="d-flex column-gap-3" style="width: 90%">

                    <div class="mb-3" style="width: 80%;">
                        <label for="exampleDataList" class="col-form-label">Cantidad Actual:</label>
                        <input type="text" class="form-control" id="cantidadActual" name="cantidadActual" placeholder="" disabled>
                    </div>

                    <div class="mb-3" style="width: 80%;">
                        <label for="exampleDataList" class="col-form-label">Estante:</label>
                        <input type="text" class="form-control" id="estante" name="estante" placeholder="" disabled>
                    </div>
                    <div class="mb-3" style="width: 80%;">
                        <label for="exampleDataList" class="col-form-label">Fila:</label>
                        <input type="text" class="form-control" id="filaDetalle" name="fila" disabled>
                    </div>
                </div>

            </div>

            <div class="modal-footer" id="modalFooterD">
                <button type="button" class="btn btnCerrar" data-bs-toggle="modal" onclick="limpiarCampos()" data-bs-target="#detallesModal" id="btnCerrar">Cerrar</button>
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var estanteria = $(".estanteria")
    var inputFila = 0;
    var inputNombreProd = 0;
    var validIFila = true;
    var validINombreProd = true;

    bloque = $('.bloqueTextoE')
    for (let i = 0; i < bloque.length; i++) {
        $.ajax({
            url: '<?php echo base_url('filas/obtenerMaterialesFila/') ?>' + bloque[i].id,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                var cadena = ""
                for (let i = 0; i < res.length; i++) {
                    cadena += `<p class="subTexto"><button onclick="detallesMaterial(${res[i].id_material})" class="verMas" style="background: transparent; border:transparent;"><i class="bi bi-caret-right-fill"></i>${res[i].nombre}</button></p>`
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
            $('#nombreProd').html(cadena)
        }
    })

    $('#agregarFila').on('submit', function(e) {
        e.preventDefault();
        fila = $('#fila').val() //Esto toma el valor por medio del id
        nombreProd = $('#nombreProd').val() //Esto toma el valor por medio del id
        $.ajax({
            url: "<?php echo base_url('/filas/insertar'); ?>",
            type: 'POST',
            data: {
                fila,
                nombreProd
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
        estanteria.ajax.reload(null, false)
    })

    function limpiarCampos() {
        $('#fila').val('-- SELECCIONE UNA FILA --')
        $('#nombreProd').val('')
    }

    // ---------------------------validaciones---------------------------

    //Identificar si el numero de identificacion no este registrado
    $('#fila').on('input', function(e) {
        inputFila = $('#fila').val()
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('srchUsu/') ?>" + id + "/" + inputFila,
            dataType: 'JSON',
            success: function(res) {
                if (res[0]['fila'] == inputFila) {
                    $('#msgDoc').text('')
                    validIFila = true
                } else {
                    buscarFila(0, inputFila)
                }
            }
        })
    })

    function buscarFila(fila, inputFila) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('filas/buscarFilas') ?>" + fila + "/" + inputFila,
            dataType: 'JSON',
            success: function(res) {
                if (res[0] == null) {
                    $('#msgDoc').text('')
                    validIFila = true
                } else if (res[0] != null) {
                    $('#msgDoc').text('* Numero de fila invalido *')
                    validIFila = false
                }
            }
        })
    }

    function detallesMaterial(id_material) {
    dataURL = "<?php echo base_url('/filas/detallesMaterial'); ?>" + "/" + id_material;
    $.ajax({
      type: "POST",
      url: dataURL,
      dataType: "json",
      success: function(rs) {
        console.log(rs[0].fila);
        $('#detallesModal').modal('show')
        $("#titulo").text('Detalles');
        $("#idMaterial").val(rs[0]['id_material']);
        $("#nombre1").val(rs[0]['nombre']);
        $("#precioVenta").val(rs[0]['precio_venta']);
        $("#precioCompra").val(rs[0]['precio_compra']);
        $("#cantidadVendida").val(rs[0]['cantidad_vendida']);
        $("#cantidadActual").val(rs[0]['cantidad_actual']);
        $("#estante").val(rs[0]['nombreEstante']);
        $("#filaDetalle").val(rs[0].fila);
      }
    })
  }
</script>