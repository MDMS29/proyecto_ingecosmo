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

                        <input type="hidden" name="categoria" id="categoria" value="<?= $dato['id_estante'] ?>">
                        <div class="card2">
                            <div class="imagenes">
                                <img class="iconos" src="<?php echo base_url('/img/') . $dato['icono'] ?>">
                            </div>
                            <div class="Isabella">
                                <h5 class="card-title" style="font-family: 'Nunito', sans-serif; font-weight: bold; font-size:22px; color:black; margin-bottom:0; margin-left:80px; padding-top: 10px;">Fila <?php echo $dato['nombre']; ?></h5>
                                <div class="textoFilaF" id="Contenedor">
                                    <div class="bloque1">

                                        <input id='nombreFila' value="<?php echo $dato['id_fila']; ?>" hidden>
                                        <div class="bloqueTextoEF" id="<?php echo $dato['id_fila']; ?>">
                                        </div>
                                        <!-- INFORMACION DINAMICA -->
                                    </div>
                                    <!-- <div class="bloque2">
                                    <button class="btn btnRedireccion" id="mover"  onclick="selectMateriales('< ?php echo $dato['fila']?>')" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus"><i class="bi bi-arrow-left-right"></i> Mover</button>
                                </div> -->
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

<!-- modal ver detalles -->
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
                <button type="button" class="btn btnEditar" id="btnUsar1" data-bs-toggle="modal" data-bs-target="#usarMaterial">Usar</button>
            </div>

        </div>
    </div>
</div>

<!-- modal usar -->
<div class="modal fade" id="usarMaterial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form id="formularioUsar" autocomplete="off">

        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">

            <div class="modal-content" id="modalContentUsar">

                <div class="modal-header flex justify-content-between align-items-center w-100">
                    <input type="text" name="idMaterial" id="idMaterial" hidden>
                    <img src="<?= base_url('img/logo_empresa.png') ?>" class="logoEmpresa" width="100">
                    <div class="d-flex align-items-center justify-content-center" style="width:auto;">
                        <img src="<?= base_url('img/usarlogo.png') ?>" width="30" height="30" style="margin-right: 5px;" />
                        <h1 class="modal-title fs-5 text-center" id="tituloModal">Usar Insumo</h1>
                    </div>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>


                <div class="modal-body" id="modalBodyUsar">
                    <div class="d-flex column-gap-3" style="width: 100%">
                    </div>

                    <div class="d-flex column-gap-3" style="width: 100%">
                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Nombre del insumo:</label>
                            <input class="form-control" id="nombreInsumo" name="nombreInsumo" placeholder="" disabled>
                        </div>

                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Cantidad Existente:</label>
                            <input class="form-control" id="cantidadExistente" name="cantidadExistente" placeholder="" disabled>
                        </div>
                    </div>

                    <div class="d-flex column-gap-3" style="width: 100%">

                        <div class="mb-3" style="width: 50%;">
                            <label for="exampleDataList" class="col-form-label">Precio Venta:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input class="form-control" type="number" id="PrecioDeVenta" name="PrecioDeVenta" disabled>
                            </div>
                        </div>

                        <div class="mb-3" style="width: 50%">
                            <label for="exampleDataList" class="col-form-label">Cantidad a Usar: <i style="color:crimson">*</i></label>
                            <div>
                                <input type="number" class="form-control" id="cantidadUsar" name="cantidadUsar" onInput="validarInput()" placeholder="">
                                <small id="msgUsar" class="invalido"></small>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex column-gap-3" style="width: 50%">

                        <div class="mb-3" style="width: 100%">
                            <label for="exampleDataList" class="col-form-label">Subtotal:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">$</span>
                                <input class="form-control" type="number" id="subtotal" name="subtotal" disabled>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <label class="campObl" style="color: gray; margin-inline-end: auto;">(*) Campos obligatorios.</label>
                    <button type="button" class="btn btnCerrar" onclick="limpiarCampos()" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btnEditar" id="btnValidar">Usar</button>


                </div>
            </div>
        </div>
    </form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    var estanteria = $(".estanteria")
    var inputFila = 0;
    var inputNombreProd = 0;
    var validIFila = true;
    var validINombreProd = true;
    var filasDina = 0
    var tituloMover = $(".tituloHeader")


    bloque = $('.bloqueTextoEF')
    for (let i = 0; i < bloque.length; i++) {
        let fila = $(`#${bloque[i].id}`)
        fila = fila[0].id
        console.log(fila+"hi");
        $.ajax({
            url: '<?php echo base_url('filas/obtenerMaterialesFila/') ?>' + fila,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                var cadena = ""
                var vacio = ""
                console.log(res);
                if (res.length == 0) {
                    cadena += `
                    <div class="textoVacio " style="color: #000000; font-size:15px; margin-left: 60px; display:flex; justify-content:center;  align-items:center; flex-direction:column;">
                    <i class="bi bi-exclamation-circle" style="color:#fab83c; font-size:25px;"></i>
                    <p> ¡No hay materiales en la fila! </p> 
                    </div>`;
                    $(`#${bloque[i].id}`).html(cadena)

                } else {
                    for (let i = 0; i < res.length; i++) {
                        cadena += `
                    <div class="sumary-flex">
                    <p class="subTexto">
                    <details class="detail">
                    <summary >
                    <button onclick="detallesMaterial(${res[i].id_material})" class="verMas" style="background: transparent; border:transparent;">${res[i].nombre}</button>
                    </summary>

                    <button class="btn btnMover" id="mover"  onclick="selectMateriales('${fila}','${res[i].nombre}','${res[i].id_material}')" data-bs-target="#estanteModal" data-bs-toggle="modal" alt="icon-plus"><i class="bi bi-arrow-left-right">mover</i> </button>
                    </details></p>
                    </div>`;
                    }
                    $(`#${bloque[i].id}`).html(cadena)
                    console.log("first")
                }
            }
        })
    }



    function selectMateriales(fila, nombre, id_material) {
        var tituloMover = $(".tituloHeader")
        tituloMover.text(nombre)
        $('#idMaterialMove').val(id_material)
        categoria = $('#categoria').val()

        $.ajax({
            url: '<?php echo base_url('filas/obtenerMaterialesCate/') ?>' + categoria + '/' + fila + '/' + id_fila,
            type: 'POST',
            dataType: 'json',
            success: function(res) {
                console.log(res)
                if (id_fila == fila) {
                    console.log("holaa gy")
                    filasDina = $(`#${res[0].fila}F`).attr('disabled', '');

                } else {

                }
                // var cadena
                // cadena = `<option value="" selected>-- SELECCIONE PRODUCTOS --</option>`
                // for (let i = 0; i < res.length; i++) {

                //     cadena += `<option value=${res[i].id_material}>${res[i].nombre}</option>`
                // // }
                // $('#nombreProd').html(cadena)
            }
        })
    }

    $('#agregarFila').on('submit', function(e) {
        e.preventDefault();
        fila = $('#fila1').val()
        id_material = $('#idMaterialMove').val()
        if ([fila, id_material].includes("")) {
            return Swal.fire({
                position: "center",
                icon: "error",
                text: "¡Campos Vacios!",
                showConfirmButton: false,
                timer: 1000
            })
        } else {
            $.ajax({
                url: "<?php echo base_url('/filas/moverMaterial'); ?>",
                type: 'POST',
                data: {
                    fila,
                    id_material
                },
                dataType: 'json',
                success: function(res) {
                    if (res == 1) {
                        mostrarMensaje('success', '¡Se ha movido el insumo correctamente!');
                        setTimeout(() => {
                            window.location.reload()
                        }, 2000)
                    }
                }
            })
            estanteria.ajax.reload(null, false)

        }
    })

    function limpiarCampos() {
        $('#fila').val('-- SELECCIONE UNA FILA --')
        $('#nombreProd').val('')
        filasDina.removeAttr('disabled', '');

        $("#subtotal").val('');
        $("#cantidadUsar").val('');
        $('#msgUsar').text('')
        $('#msgAgregar').text('')
        $("#imagenDetalle").attr('src', '<?php echo base_url('/img/masDetalles.png') ?>');

    }

    // ---------------------------validaciones---------------------------

    //Identificar si el numero de identificacion no este registrado
    // $('#fila').on('input', function(e) {
    //     inputFila = $('#fila').val()
    //     $.ajax({
    //         type: 'POST',
    //         url: "< ?php echo base_url('srchUsu/') ?>" + id + "/" + inputFila,
    //         dataType: 'JSON',
    //         success: function(res) {
    //             if (res[0]['fila'] == inputFila) {
    //                 $('#msgDoc').text('')
    //                 validIFila = true
    //             } else {
    //                 buscarFila(0, inputFila)
    //             }
    //         }
    //     })
    // })

    // function buscarFila(fila, inputFila) {
    //     $.ajax({
    //         type: 'POST',
    //         url: "< ?php echo base_url('filas/buscarFilas') ?>" + fila + "/" + inputFila,
    //         dataType: 'JSON',
    //         success: function(res) {
    //             if (res[0] == null) {
    //                 $('#msgDoc').text('')
    //                 validIFila = true
    //             } else if (res[0] != null) {

    //                 $('#msgDoc').text('* Numero de fila invalido *')
    //                 validIFila = false
    //             }
    //         }
    //     })
    // }

    function detallesMaterial(id_material) {

        $('#btnUsar1').attr('onclick', `usarMaterial(${id_material},2)`)

        dataURL = "<?php echo base_url('/filas/detallesMaterial'); ?>" + "/" + id_material;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                $('#detallesModal').modal('show')
                $("#titulo").text('Detalles');
                $("#idMaterial").val(rs[0]['id_material']);
                $("#nombre1").val(rs[0]['nombre']);
                $("#precioVenta").val(rs[0]['precio_venta']);
                $("#precioCompra").val(rs[0]['precio_compra']);
                $("#cantidadVendida").val(rs[0]['cantidad_vendida']);
                $("#cantidadActual").val(rs[0]['cantidad_actual']);
                $("#estante").val(rs[0]['nombreEstante']);
                $("#filaDetalle").val(rs[0]['filaNombre']);
            }
        })
    }

    function usarMaterial(id_material) {
        dataURL = "<?php echo base_url('/materiales/usarMaterial'); ?>" + "/" + id_material;
        $.ajax({
            type: "POST",
            url: dataURL,
            dataType: "json",
            success: function(rs) {
                $("#idMaterial").val(rs[0]['id_material']);
                $("#nombreInsumo").val(rs[0]['nombre']);
                $("#cantidadExistente").val(rs[0]['cantidad_actual']);
                $("#PrecioDeVenta").val(rs[0]['precio_venta']);
                $("#cantidadVendida").val(rs[0]['cantidad_vendida']);

            }
        })
    }

    // operaciones con el input usar

    $('#cantidadUsar').on('input', function(e) {
        idMaterial = $("#idMaterial").val()

        cantidad = $('#cantidadUsar').val()
        valorVenta = $("#PrecioDeVenta").val()
        cantidadExistente = $('#cantidadExistente').val()
        if (parseInt(cantidad) > parseInt(cantidadExistente)) {
            $('#msgUsar').text(' *Valor invalido*')
            $("#btnValidar").attr('disabled', '');
            validUsar = false
            $('#subtotal').val(0)
        } else {
            $('#msgUsar').text('')
            validUsar = true
            $('#subtotal').val(cantidad * valorVenta)
        }
    })



    // formulario usar

    $("#formularioUsar").on("submit", function(e) {
        e.preventDefault()

        idMaterial = $("#idMaterial").val()
        trabajador = $("#trabajadores").val()
        ordenes = $("#ordenes").val()
        cantidadExistente = $("#cantidadExistente").val()
        cantidadUsar = $("#cantidadUsar").val()
        precioVenta = $("#PrecioDeVenta").val()
        subtotal = $("#subtotal").val()
        console.log(idMaterial)
        if ([subtotal, cantidadExistente, cantidadUsar, precioVenta, trabajador, ordenes].includes("")) {
            return mostrarMensaje('error', '¡Campos Vacios!')
        }
        $.post({
            url: '<?php echo base_url('insumos/usar') ?>',
            data: {
                idMaterial,
                trabajador,
                ordenes,
                precioVenta,
                cantidadExistente,
                cantidadUsar,
                subtotal
            },
            success: function(data) {
                if (data == 1) {
                    mostrarMensaje('success', '¡Insumo usado con exito!')
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000)
                } else {
                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                }
            }
        })

    })
</script>