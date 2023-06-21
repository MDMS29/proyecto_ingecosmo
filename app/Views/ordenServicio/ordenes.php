<link rel="stylesheet" href="<?= base_url('css/vehiculos/vehiculos.css') ?>">
<!-- TABLA MOSTRAR VEHICULOS -->
<div id="content" class="p-4 p-md-5" style="background-color:rgba(0, 0, 0, 0.05);">
    <h2 class="text-center mb-4"><img style=" width:45px; height:45px; " src="<?php echo base_url('/img/orden-servicio-b.png') ?>" /> Ordenes de Servicio</h2>
    <div class="table-responsive p-2">
        <div class="d-flex justify-content-center align-items-center flex-wrap ocultar">
            <b class="fs-6 text-black"> Ocultar Columnas:</b> <a class="toggle-vis btn" data-column="1">Cliente</a> - <a class="toggle-vis btn" data-column="2">Responsable</a> - <a class="toggle-vis btn" data-column="4">Modelo</a> - <a class="toggle-vis btn" data-column="5">Marca</a> - <a class="toggle-vis btn" data-column="6">Color</a> - <a class="toggle-vis btn" data-column="7">Kilometraje</a> - <a class="toggle-vis btn" data-column="8">Combustible</a>
        </div>
        <table class="table table-striped" id="tableOrdenes" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col" class="text-center">N° Orden</th>
                    <th scope="col" class="text-center">Cliente</th>
                    <th scope="col" class="text-center">Responsable</th>
                    <th scope="col" class="text-center">Placa</th>
                    <th scope="col" class="text-center">Modelo</th>
                    <th scope="col" class="text-center">Marca</th>
                    <th scope="col" class="text-center">Color</th>
                    <th scope="col" class="text-center">Kilometraje</th>
                    <th scope="col" class="text-center">Combustible</th>
                    <th scope="col" class="text-center">Fecha Entrada</th>
                    <th scope="col" class="text-center">Fecha Salida</th>
                    <th scope="col" class="text-center">Proceso Taller</th>
                    <th scope="col" class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
                <!-- TABLA DE VEHICULOS -->
            </tbody>
        </table>
    </div>
    <div class="footer-page mt-4">
        <button type="button" class="btn btnRedireccion" data-bs-toggle="modal" data-bs-target="#agregarOrden" onclick="seleccionarOrden(<?= 0 . ',' . 1 ?>)"><img src="<?= base_url('img/plus.png') ?>" alt="icon-plus" width="20"> Agregar</button>
    </div>
</div>

<!-- FORMULARIO PARA AGREGAR - EDITAR VEHICULO -->
<form autocomplete="off" id="formularioOrdenes">
    <div class="modal fade" id="agregarOrden" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <input type="text" name="id" id="id" hidden>
        <input type="text" name="tp" id="tp" hidden>
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="body-R">
                <div class="modal-content">
                    <div class="modal-header d-flex align-items-center justify-content-between">
                        <img src="<?= base_url('img/logo_empresa.png') ?>" alt="Logo Empresa" class="logoEmpresa" width="100">
                        <h1 class="modal-title fs-5 text-center d-flex align-items-center gap-2"><img id="imgModal" src=""><span id="tituloModal"><!-- TEXTO DINAMICO--></span> </h1>
                        <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="ordenTrabajo" class="col-form-label">Orden de Servicio:</label>
                                    <input type="number" name="ordenTrabajo" class="form-control" id="ordenTrabajo">
                                    <small id="msgOrden" class="invalido"></small>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="vehiculo" class="col-form-label">Placa:</label>
                                    <!-- INPUT PARA SABER CUANDO SE AGREGA UN VEHICULO NUEVO -->
                                    <input type="text" id="aggVehi" value="0" placeholder="Ej: QWE123" hidden>
                                    <div class="d-flex">
                                        <input type="text" maxlength="6" class="form-control" id="vehiculoT" hidden>
                                        <select class="form-select form-control" name="vehiculo" id="vehiculo">
                                            <option selected value="">-- Seleccione --</option>
                                            <!-- SELECT DINAMICO -->
                                        </select>
                                        <button class="btn" type="button" style="border:none;background-color:gray;color:white;" id="btnAgg" title="Agregar Vehiculo">+</button>
                                    </div>
                                    <small id="msgPlaca" class="invalido"></small>
                                </div>
                            </div>
                            <!-- INFORMACION RESPONSABLE -->
                            <details open>
                                <summary>Informacion Responsable</summary>
                                <div class="d-flex column-gap-3" style="width: 100%">
                                    <div class="mb-3" style="width: 100%">
                                        <label for="tipoCliente" class="col-form-label">Tipo Responsable:</label>
                                        <select class="form-select form-control" name="tipoCliente" id="tipoCliente">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($tipoClientes as $cliente) { ?>
                                                <option value="<?= $cliente['id'] ?>"><?= $cliente['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3" style="width: 100%">
                                        <label for="cliente" class="col-form-label">Responsable:</label>
                                        <select class="form-select form-control" name="cliente" id="cliente">
                                            <option value="" selected="selected">-- Seleccione --</option>
                                            <!-- SELECT DINAMICO -->

                                        </select>
                                    </div>
                                </div>

                                <div class="column-gap-3 d-flex flex-column" style="width: 100%; display:none;" id="divResponsable">
                                    <div class="d-flex gap-3" style="width: 100%">
                                        <div class="mb-3" style="width: 100%">
                                            <label for="tipoDocRes" class="col-form-label">Tipo Identificación:</label>
                                            <select class="form-select form-select" name="tipoDocRes" id="tipoDocRes" disabled>
                                                <option value="1" selected>Cedula de Ciudadania</option>
                                                <option>-- Seleccione --</option>
                                            </select>
                                        </div>
                                        <div class="mb-3" style="width: 100%">
                                            <label for="nIdentiRes" class="col-form-label">N° Identificación:</label>
                                            <input type="text" class="form-control" name="nIdentiRes" id="nIdentiRes">
                                        </div>
                                    </div>
                                    <div class="d-flex gap-3" style="width: 100%">
                                        <div class="mb-3" style="width: 100%">
                                            <label for="nombreRespon" class="col-form-label">Nombres:</label>
                                            <input type="text" name="nombreRespon" class="form-control" id="nombreRespon">
                                        </div>
                                        <div class="mb-3" style="width: 100%">
                                            <label for="apellidoRespon" class="col-form-label">Apellidos:</label>
                                            <input type="text" class="form-control" name="apellidoRespon" id="apellidoRespon">
                                        </div>
                                    </div>
                                </div>
                            </details>
                            <!-- INFORMACION VEHICULO  -->
                            <details open>
                                <summary>Informacion Automovil</summary>
                                <div class="d-flex column-gap-3" style="width: 100%">
                                    <div class="mb-3" style="width: 100%">
                                        <label for="marca" class="col-form-label">Marca:</label>
                                        <select class="form-select form-control" name="marca" id="marca">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($marcas as $marca) { ?>
                                                <option value="<?= $marca['id_marca'] ?>"><?= $marca['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="mb-3" style="width: 100%">
                                        <label for="nFabrica" class="col-form-label">No. Fabrica:</label>
                                        <select class="form-select form-control" name="nFabrica" id="nFabrica">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php $years = range(2035, 1990); ?>
                                            <?php foreach ($years as $year) : ?>
                                                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex column-gap-3" style="width: 100%">
                                    <div class="mb-3" style="width: 100%">
                                        <div class="">
                                            <label for="color" class="col-form-label">Color:</label>
                                            <input type="text" name="color" class="form-control" id="color" minlength="4">
                                        </div>
                                    </div>
                                    <div class="mb-3" style="width: 100%">
                                        <label for="kms" class="col-form-label">Kilometraje:</label>
                                        <div class="d-flex">
                                            <input type="number" name="kms" class="form-control" id="kms">
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex column-gap-3" style="width: 100%">
                                    <div class="mb-3" style="width: 100%">
                                        <label for="combustible" class="col-form-label">Combustible:</label>
                                        <select class="form-select form-control" name="combustible" id="combustible">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($combustible as $com) { ?>
                                                <option value="<?= $com['id'] ?>"><?= $com['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </details>
                            <!-- INVENTARIO DE VEHICULO -->
                            <details id="datailInv">
                                <summary>Inventario Vehiculo</summary>
                                <input type="text" id="tpInventario" hidden>
                                <table class="table table-striped" id="tableOrdenes" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="text-center">
                                            <th hidden></th>
                                            <th>Item</th>
                                            <th>Check</th>
                                            <th colspan="1" style="width:20px;">Cantidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idGrua"></td>
                                            <td>Grua</td>
                                            <td><input type="checkbox" name="grua" id="grua"></td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idLlaves"></td>
                                            <td>Llaves</td>
                                            <td><input type="checkbox" name="llaves" id="llaves"></td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idDocu"></td>
                                            <td>Documentos</td>
                                            <td><input type="checkbox" name="documentos" id="documentos"></td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idRetro"></td>
                                            <td>Retrovisores</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="retrovisores" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><!-- <input class="text-center" type="number" id="cantRetro" style="width:35px; padding:1px 2px;"> --></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idRetroInter"></td>
                                            <td>Retrovisores Internos</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="retroInter" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><!-- <input class="text-center" type="number" id="cantRetro" style="width:35px; padding:1px 2px;"> --></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idPanora"></td>
                                            <td>Panorámicos</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="panoramicos" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><input class="text-center" type="number" id="cantPano" style="width:35px; padding:1px 2px;"></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idRadio"></td>
                                            <td>Radio</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="radio" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>0
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idParlan"></td>
                                            <td>Parlantes</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="parlantes" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><input class="text-center" type="number" id="cantParlan" style="width:35px; padding:1px 2px;"></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idRejillas"></td>
                                            <td>Rejillas A/A</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="rejillas" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><input class="text-center" type="number" id="cantRejillas" style="width:35px; padding:1px 2px;"></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idEncen"></td>
                                            <td>Encendedor</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="encendedor" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>0
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idPito"></td>
                                            <td>Pito</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="pito" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>0
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idPlumi"></td>
                                            <td>Plumillas</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="plumillas" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><input class="text-center" type="number" id="cantPlumi" style="width:35px; padding:1px 2px;"></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idCintu"></td>
                                            <td>Cinturones</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="cinturones" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><input class="text-center" type="number" id="cantCintu" style="width:35px; padding:1px 2px;"></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idMani"></td>
                                            <td>Manijas</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="manijas" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td><input class="text-center" type="number" id="cantMani" style="width:35px; padding:1px 2px;"></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idComando"></td>
                                            <td>Comando ptas</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="comando" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idTaSol"></td>
                                            <td>Tapa Soles</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="tapaSoles" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input class="text-center" type="number" id="cantTaSol" style="width:35px; padding:1px 2px;">
                                            </td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idTape"></td>
                                            <td>Tapetes</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="tapetes" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td>
                                                <input class="text-center" type="number" id="cantTape" style="width:35px; padding:1px 2px;">
                                            </td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idTapi"></td>
                                            <td>Tapizado</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="tapizado" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idLuz"></td>
                                            <td>Luz Techo</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="luzTecho" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idTapa"></td>
                                            <td>Tapa Gasolina</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="tapaGaso" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idLlavePer"></td>
                                            <td>Llave Pernos</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="llavePer" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idHerra"></td>
                                            <td>Herramientas</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="herramientas" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idKit"></td>
                                            <td>Kit de Carretera</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="kitCarrete" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idGato"></td>
                                            <td>Gato</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="gato" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idExtintor"></td>
                                            <td>Extintor</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="extintor" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idSensores"></td>
                                            <td>Sensores</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="sensores" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idCamara"></td>
                                            <td>Camara de Rever</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="camaraRe" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idControl"></td>
                                            <td>Control de Alarma</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="controlAlarma" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idBateria"></td>
                                            <td>Bateria</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="bateria" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">B</option>
                                                    <option value="2">R</option>
                                                    <option value="3">G</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>

                                        <tr class="text-center">
                                            <td hidden><input type="text" id="idCombustible"></td>
                                            <td>Combustible</td>
                                            <td style="display: flex;justify-content: center;">
                                                <select class="text-center form-select form-control" id="tipocombustible" style="width: 155px;">
                                                    <option value="" selected>-- Seleccione --</option>
                                                    <option value="1">ID</option>
                                                    <option value="2">IT</option>
                                                    <option value="3">R</option>
                                                    <option value="4">DD</option>
                                                    <option value="5">DT</option>
                                                </select>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </details>
                            <div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <input type="text" id="idObser" hidden>
                                        <label for="observaciones" class="col-form-label d-block">Observaciones:</label>
                                        <textarea name="txtObser" id="txtObser" class="form-control w-100 p-1" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3" style="width: 100%">
                                    <div class="mb-3">
                                        <label for="estado" class="col-form-label">Estado:</label>
                                        <select class="form-select form-control" name="estado" id="estado">
                                            <option selected value="">-- Seleccione --</option>
                                            <?php foreach ($estadosVehi as $estado) { ?>
                                                <option value="<?= $estado['id'] ?>" <?php echo $estado['id'] == 38 ? 'hidden' : ($estado['id'] == 43 ? 'hidden' : '') ?>><?= $estado['nombre'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex column-gap-3" style="width: 100%">
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaEntrada" class="col-form-label">Fecha Entrada:</label>
                                    <div class="d-flex">
                                        <input type="date" name="fechaEntrada" id="fechaEntrada" class="form-control">
                                    </div>
                                </div>
                                <div class="mb-3" style="width: 100%">
                                    <label for="fechaEntrada" class="col-form-label">Fecha Salida:</label>
                                    <div class="d-flex">
                                        <input type="date" name="fechaSalida" id="fechaSalida" class="form-control">
                                    </div>
                                    <small id="msgFecha" class="normal"></small>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btnAccionF" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btnRedireccion" id="btnGuardar"><!-- TEXTO DIANMICO --></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<!-- MODAL CAMBIAR ESTADO DEL VEHICULO -->
<div class="modal fade" id="cambiarEstado" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="body-R">
            <div class="modal-content">
                <input type="hidden" name="idVehi" id="idVehi">
                <div class="modal-header flex justify-content-between align-items-center">
                    <img src="<?= base_url('img/ingecosmo.png') ?>" alt="logo-empresa" width="100" height="60">
                    <h1 class="modal-title fs-5 text-center " id="tituloModalEstado"><img src="<?= base_url('img/plus-b.png') ?>" alt="" width="30" height="30"><!-- TEXTO DINAMICO  --></h1>
                    <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close" onclick="limpiarCampos('#estadoVehiculo')">X</button>
                </div>
                <div class="modal-body">
                    <div class="container p-4" style="background-color: #d9d9d9;border-radius:10px;">
                        <label for="prioridad" class="col-form-label">Cambiar Estado:</label>
                        <select class="form-select form-control" name="estadoVehiculo" id="estadoVehiculo">
                            <option selected value="">-- Seleccione --</option>
                            <?php foreach ($estadosVehi as $estado) { ?>
                                <option value="<?= $estado['id'] ?>"><?= $estado['nombre'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btnAccionF" data-bs-toggle="modal" data-bs-target="#agregarUsuario" onclick="limpiarCampos('#estadoVehiculo')">Cerrar</button>
                    <button type="button" class="btn btnRedireccion" id="btnCambiarEstado">Agregar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-pdf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <iframe id="ifr_PDF" width="auto" height="700"></iframe>
        </div>
    </div>
</div>

<script>
    var validOrden = true
    var validPlaca = true
    var validFecha = true
    var validInv = true
    var arrayInven = []
    //Limitar fecha de entrada y salida hasta la fecha actual
    let fechaFormateada = formatearFecha(Date()) //Funcion: formatearFecha() se encuentra en el sidebar
    let fechaLimite = `${fechaFormateada[2]}-${fechaFormateada[1]}-${fechaFormateada[0]}`
    $('#fechaEntrada').attr('max', fechaLimite)
    // Agregar atributo disabled
    function agregarDisabled() {
        //Disabled
        $('#tipoCliente').attr('disabled', '')
        $('#cliente').attr('disabled', '')
        $('#placaHidden').attr('disabled', '')
        $('#marca').attr('disabled', '')
        $('#nFabrica').attr('disabled', '')
        $('#color').attr('disabled', '')
        $('#combustible').attr('disabled', '')
    }
    //Limpiar campos
    function limpiarCampos(input, accion) {
        $(`${input}`).val('')
        if (accion == 1) {

            $('#tipoCliente').val('')
            $('#cliente').val('')
            $('#divResponsable').removeClass('d-flex')
            $('#nombreRespon').val('')
            $('#apellidoRespon').val('')
            $('#nIdentiRes').val('')
            $('#vehiculo').val('')
            $('#marca').val('')
            $('#nFabrica').val('')
            $('#color').val('')
            $('#kms').val('')
            $('#combustible').val('')
            $('#estado').val('')
            $('#fechaEntrada').val('')
            $('#fechaSalida').attr('min', fechaLimite)
            $('#fechaSalida').val('')
        }
    }
    //Mostrar Ocultar Columnas
    $('a.toggle-vis').on('click', function(e) {
        e.preventDefault();
        // Get the column API object
        var column = tablaOrdenes.column($(this).attr('data-column'));
        // Toggle the visibility
        column.visible(!column.visible());
    });
    //Div ocualtar columnas de la tabla
    var botones = $(".ocultar a");
    botones.click(function() {
        if ($(this).attr('class').includes('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    })
    //Select placa de vehiculos
    function obtenerVehiculos() {
        $.ajax({
            url: '<?= base_url('vehiculos/obtenerVehiculos'); ?>',
            type: 'POST',
            success: function(res) {
                res = JSON.parse(res)
                var cadena
                cadena = `<option selected value=""> -- Seleccione -- </option>`
                for (let i = 0; i < res.length; i++) {

                    cadena += `<option value=${res[i].id_vehiculo}>${res[i].placa }</option>`
                }
                $('#vehiculo').html(cadena)
            }
        })
    }
    obtenerVehiculos()
    //Tabla de vehiculos
    var tablaOrdenes = $('#tableOrdenes').DataTable({
        ajax: {
            url: '<?= base_url('ordenServicio/obtenerOrdenes') ?>',
            method: "POST",
            dataSrc: "",
        },
        order: [
            [0, 'desc']
        ],
        columns: [{
                data: "n_orden"
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<span id="spanCliente" class=${row.estadoTercer == 'I' ? 'invalido' : ''} >
                    ${row.tipo_tercero == 5 ? row.cliente : row.nombreAliado} ${row.estadoTercer == 'I' ? ' - Inactivo' : ''}
                    </span>`
                }
            },
            {
                data: null,
                render: function(data, type, row) {
                    return `<span id="spanCliente" class=${row.estadoTercer == 'I' ? 'invalido' : ''} >
                    ${row.tipo_tercero == 5 ? 'Cliente' : row.razon_social} ${row.estadoTercer == 'I' ? ' - Inactivo' : ''}
                    </span>`

                }
            },
            {
                data: "placa",
                render: function(data, type, row) {
                    return (
                        '<span class="text-uppercase">' + row.placa + '</span>'
                    )
                }
            },
            {
                data: 'modelo'
            },
            {
                data: 'marca'
            },
            {
                data: 'color'
            },
            {
                data: 'kms'
            },
            {
                data: 'combustible'
            },
            {
                data: "fecha_entrada",
                render: function(data, type, row) {
                    var fechaTe = new Date(data);
                    var fecha = new Date(data);
                    var anio = fecha.getFullYear();
                    var mes = fecha.getMonth() + 1;
                    var dia = fecha.getDate() + 1;
                    return anio + "-" + (mes < 10 ? '0' + mes : mes) + "-" + (dia < 10 ? '0' + dia : dia);
                }
            },

            {
                data: "fecha_salida",
                render: function(data, type, row) {
                    let fechaValid;
                    var fecha = new Date(data);
                    fecha.setDate(fecha.getDate() + 1);
                    var anio = fecha.getFullYear();
                    var mes = fecha.getMonth() + 1;
                    var dia = fecha.getDate();
                    var fechaData = anio + "-" + (mes < 10 ? '0' + mes : mes) + "-" + (dia < 10 ? '0' + dia : dia);
                    //Validar fecha
                    var fechaTem = (dia < 10 ? dia : dia) + "/" + (mes < 10 ? mes : mes) + "/" + anio;
                    var fechaActual = new Date();
                    if (row.proceso == 'Entregado') {
                        fechaValid = 'entregado'
                    } else if (fechaActual.toLocaleDateString() === fecha.toLocaleDateString()) {
                        fechaValid = 'hoy';
                    } else if (fechaActual > fecha) {
                        fechaValid = 'pasada';
                    } else {
                        fechaValid = '';
                    }
                    return '<span id="spanValid" class="' + fechaValid + '"> ' + fechaData + ' </span>';
                }

            },
            {
                data: 'proceso'
            },
            {
                data: null,
                render: function(data, type, row) {
                    return (
                        '<button class="btn" onclick="seleccionarOrden(' + data.id_orden + ',2)" data-bs-target="#agregarOrden" data-bs-toggle="modal"><img src="<?php echo base_url('img/edit.svg') ?>" alt="Boton Editar" title="Editar Vehiculo"></button>' +
                        '<button class="btn" data-href=' + data.id_orden + ' data-bs-toggle="modal" data-bs-target="#cambiarEstado"><img src="<?php echo base_url("img/cambiar-estado.png") ?>" alt="Cambiar Estado" title="Cambiar Estado" width="20"></button>' +
                        '<button class="btn" title="Descargar Orden" onclick="pdf(' + data.id_orden + ')"><img src="<?= base_url("img/pdf.png") ?>" width="25"/></button>'
                    )
                }
            }
        ],
        "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
        }
    });
    //Descargar PDF
    function pdf(id) {
        var ruta = "<?php echo base_url(); ?>ordenServicio/pdf/" + id;
        var iframe = document.getElementById("ifr_PDF");
        iframe.setAttribute("src", ruta);
        $('#modal-pdf').modal('show');
    }
    //Seleccionar vehiculo
    $('#vehiculo').on('change', function(e) {
        id = $('#vehiculo').val()
        $.ajax({
            url: "<?= base_url('vehiculos/buscarVehiculo') ?>",
            type: 'POST',
            data: {
                orden: '',
                placa: '',
                id
            },
            success: function(data) {
                data = JSON.parse(data)
                verTipoCliente(data['tipo_propietario'], data['cliente'])
                $('#tipoCliente').val(data['tipo_propietario'])
                if ($('#tipoCliente').val() != 5) {
                    $('#nombreRespon').val(data['nomRespon'])
                    $('#apellidoRespon').val(data['apeRespon'])
                    $('#nIdentiRes').val(data['n_identificacion'])
                    $('#divResponsable').addClass('d-flex')
                } else {
                    $('#divResponsable').removeClass('d-flex')
                    $('#nombreRespon').val('')
                    $('#apellidoRespon').val('')
                    $('#nIdentiRes').val('')
                }
                $('#tipoCliente').val(data['tipo_propietario'])
                $('#cliente').val(data['cliente'])
                $('#marca').val(data['id_marca'])
                $('#nFabrica').val(data['modelo'])
                $('#color').val(data['color'])
                $('#kms').val(data['kms'])
                $('#combustible').val(data['combustible'])
            }
        })
    })

    function limpiarInventario() {
        $('#idGrua').val('')
        $('#idLlaves').val('')
        $('#idDocu').val('')
        $('#idRetro').val('')
        $('#idRetroInter').val('')
        $('#idPanora').val('')
        $('#idRadio').val('')
        $('#idParlan').val('')
        $('#idRejillas').val('')
        $('#idEncen').val('')
        $('#idPito').val('')
        $('#idPlumi').val('')
        $('#idCintu').val('')
        $('#idMani').val('')
        $('#idComando').val('')
        $('#idTaSol').val('')
        $('#idTape').val('')
        $('#idTapi').val('')
        $('#idLuz').val('')
        $('#idTapa').val('')
        $('#idLlavePer').val('')
        $('#idHerra').val('')
        $('#idKit').val('')
        $('#idGato').val('')
        $('#idExtintor').val('')
        $('#idSensores').val('')
        $('#idCamara').val('')
        $('#idControl').val('')
        $('#idBateria').val('')
        $('#idCombustible').val('')
        $('#idObser').val('')

        $('#grua')[0].checked = false
        $('#llaves')[0].checked = false
        $('#documentos')[0].checked = false

        $('#retrovisores').val('')
        $('#retroInter').val('')
        $('#panoramicos').val('')
        $('#radio').val('')
        $('#parlantes').val('')
        $('#rejillas').val('')
        $('#encendedor').val('')
        $('#pito').val('')
        $('#plumillas').val('')
        $('#cinturones').val('')
        $('#manijas').val('')
        $('#comando').val('')
        $('#tapaSoles').val('')
        $('#tapetes').val('')
        $('#tapizado').val('')
        $('#luzTecho').val('')
        $('#tapaGaso').val('')
        $('#llavePer').val('')
        $('#herramientas').val('')
        $('#kitCarrete').val('')
        $('#gato').val('')
        $('#extintor').val('')
        $('#sensores').val('')
        $('#camaraRe').val('')
        $('#controlAlarma').val('')
        $('#bateria').val('')
        $('#tipocombustible').val('')
        $('#txtObser').val('')

        $('#cantPano').val('')
        $('#cantParlan').val('')
        $('#cantRejillas').val('')
        $('#cantPlumi').val('')
        $('#cantCintu').val('')
        $('#cantMani').val('')
        $('#cantTaSol').val('')
        $('#cantTape').val('')
    }
    //Tomar informacion del vehiculo
    function seleccionarOrden(id, tp) {
        if (tp == 2) {
            $.ajax({
                url: "<?= base_url('ordenServicio/buscarOrden') ?>",
                type: 'POST',
                data: {
                    orden: '',
                    placa: '',
                    id
                },
                dataType: 'json',
                success: function(data) {
                    verTipoCliente(data['tipo_propietario'], data['cliente'])
                    $('#datailInv').removeAttr('open')
                    $('#tp').val(2)
                    $('#id').val(id)
                    $('#ordenTrabajo').removeAttr('disabled')
                    $('#ordenTrabajo').val(data['n_orden'])
                    $('#tipoCliente').val(data['tipo_propietario'])
                    $('#cliente').val(data['cliente'])
                    if ($('#tipoCliente').val() != 5) {
                        $('#nombreRespon').val(data['nomRespon'])
                        $('#apellidoRespon').val(data['apeRespon'])
                        $('#nIdentiRes').val(data['n_identificacion'])
                        $('#divResponsable').addClass('d-flex')
                    } else {
                        $('#divResponsable').removeClass('d-flex')
                        $('#nombreRespon').val('')
                        $('#apellidoRespon').val('')
                        $('#nIdentiRes').val('')
                    }
                    $('#vehiculo').val(data['id_vehiculo'])
                    $('#placaHidden').val(data['placa'])
                    $('#marca').val(data['id_marca'])
                    $('#nFabrica').val(data['modelo'])
                    $('#color').val(data['color'])
                    $('#kms').val(data['kms'])
                    $('#combustible').val(data['combustible'])
                    $('#estado').val(data['proceso'])
                    $('#fechaEntrada').val(data['fecha_entrada'])
                    $('#fechaSalida').removeAttr('min', fechaLimite)
                    $('#fechaSalida').val(data['fecha_salida'])
                    $('#tituloModal').text('Editar')
                    $('#imgModal').attr('src', '<?= base_url('img/editar1.png') ?>')
                    $('#imgModal').attr('width', '25')
                    $('#btnGuardar').text('Actualizar')
                    $('#msgPlaca').text('')
                    $('#msgOrden').text('')

                    //Inventario de orden
                    $.ajax({
                        type: 'POST',
                        url: '<?= base_url('inventarioOrden/buscarInventario') ?>',
                        dataType: 'json',
                        data: {
                            id: data['id_orden']
                        },
                        success: function(res) {
                            if (res.filter(r => r.item == 'Grua')[0] == undefined) {
                                $('#tpInventario').val(1)
                                limpiarInventario()
                            } else {
                                $('#tpInventario').val(2)
                                $('#idGrua').val(res.filter(r => r.item == 'Grua')[0].id_inv_orden)
                                $('#idLlaves').val(res.filter(r => r.item == 'Llaves')[0].id_inv_orden)
                                $('#idDocu').val(res.filter(r => r.item == 'Documentos')[0].id_inv_orden)
                                $('#idRetro').val(res.filter(r => r.item == 'Retrovisores')[0].id_inv_orden)
                                $('#idRetroInter').val(res.filter(r => r.item == 'Retrovisor Interno')[0].id_inv_orden)
                                $('#idPanora').val(res.filter(r => r.item == 'Panoramicos')[0].id_inv_orden)
                                $('#idRadio').val(res.filter(r => r.item == 'Radio')[0].id_inv_orden)
                                $('#idParlan').val(res.filter(r => r.item == 'Parlantes')[0].id_inv_orden)
                                $('#idRejillas').val(res.filter(r => r.item == 'Rejillas A/A')[0].id_inv_orden)
                                $('#idEncen').val(res.filter(r => r.item == 'Encendedor')[0].id_inv_orden)
                                $('#idPito').val(res.filter(r => r.item == 'Pito')[0].id_inv_orden)
                                $('#idPlumi').val(res.filter(r => r.item == 'Plumillas')[0].id_inv_orden)
                                $('#idCintu').val(res.filter(r => r.item == 'Cinturones')[0].id_inv_orden)
                                $('#idMani').val(res.filter(r => r.item == 'Manijas')[0].id_inv_orden)
                                $('#idComando').val(res.filter(r => r.item == 'Comando ptas')[0].id_inv_orden)
                                $('#idTaSol').val(res.filter(r => r.item == 'Tapa Soles')[0].id_inv_orden)
                                $('#idTape').val(res.filter(r => r.item == 'Tapetes')[0].id_inv_orden)
                                $('#idTapi').val(res.filter(r => r.item == 'Tapizado')[0].id_inv_orden)
                                $('#idLuz').val(res.filter(r => r.item == 'Luz Techo')[0].id_inv_orden)
                                $('#idTapa').val(res.filter(r => r.item == 'Tapa Gasolina')[0].id_inv_orden)
                                $('#idLlavePer').val(res.filter(r => r.item == 'Llave Pernos')[0].id_inv_orden)
                                $('#idHerra').val(res.filter(r => r.item == 'Herramientas')[0].id_inv_orden)
                                $('#idKit').val(res.filter(r => r.item == 'Kit Carretera')[0].id_inv_orden)
                                $('#idGato').val(res.filter(r => r.item == 'Gato')[0].id_inv_orden)
                                $('#idExtintor').val(res.filter(r => r.item == 'Extintor')[0].id_inv_orden)
                                $('#idSensores').val(res.filter(r => r.item == 'Sensores')[0].id_inv_orden)
                                $('#idCamara').val(res.filter(r => r.item == 'Camara Rever')[0].id_inv_orden)
                                $('#idControl').val(res.filter(r => r.item == 'Control Alarma')[0].id_inv_orden)
                                $('#idBateria').val(res.filter(r => r.item == 'Bateria')[0].id_inv_orden)
                                $('#idCombustible').val(res.filter(r => r.item == 'TipoCombustible')[0].id_inv_orden)
                                $('#idObser').val(res.filter(r => r.item == 'Observacion')[0].id_inv_orden)

                                $('#grua')[0].checked = res.filter(r => r.item == 'Grua')[0].checked == 'true' ? true : false
                                $('#llaves')[0].checked = res.filter(r => r.item == 'Llaves')[0].checked == 'true' ? true : false
                                $('#documentos')[0].checked = res.filter(r => r.item == 'Documentos')[0].checked == 'true' ? true : false

                                $('#retrovisores').val(res.filter(r => r.item == 'Retrovisores')[0].checked)
                                $('#retroInter').val(res.filter(r => r.item == 'Retrovisor Interno')[0].checked)
                                $('#panoramicos').val(res.filter(r => r.item == 'Panoramicos')[0].checked)
                                $('#radio').val(res.filter(r => r.item == 'Radio')[0].checked)
                                $('#parlantes').val(res.filter(r => r.item == 'Parlantes')[0].checked)
                                $('#rejillas').val(res.filter(r => r.item == 'Rejillas A/A')[0].checked)
                                $('#encendedor').val(res.filter(r => r.item == 'Encendedor')[0].checked)
                                $('#pito').val(res.filter(r => r.item == 'Pito')[0].checked)
                                $('#plumillas').val(res.filter(r => r.item == 'Plumillas')[0].checked)
                                $('#cinturones').val(res.filter(r => r.item == 'Cinturones')[0].checked)
                                $('#manijas').val(res.filter(r => r.item == 'Manijas')[0].checked)
                                $('#comando').val(res.filter(r => r.item == 'Comando ptas')[0].checked)
                                $('#tapaSoles').val(res.filter(r => r.item == 'Tapa Soles')[0].checked)
                                $('#tapetes').val(res.filter(r => r.item == 'Tapetes')[0].checked)
                                $('#tapizado').val(res.filter(r => r.item == 'Tapizado')[0].checked)
                                $('#luzTecho').val(res.filter(r => r.item == 'Luz Techo')[0].checked)
                                $('#tapaGaso').val(res.filter(r => r.item == 'Tapa Gasolina')[0].checked)
                                $('#llavePer').val(res.filter(r => r.item == 'Llave Pernos')[0].checked)
                                $('#herramientas').val(res.filter(r => r.item == 'Herramientas')[0].checked)
                                $('#kitCarrete').val(res.filter(r => r.item == 'Kit Carretera')[0].checked)
                                $('#gato').val(res.filter(r => r.item == 'Gato')[0].checked)
                                $('#extintor').val(res.filter(r => r.item == 'Extintor')[0].checked)
                                $('#sensores').val(res.filter(r => r.item == 'Sensores')[0].checked)
                                $('#camaraRe').val(res.filter(r => r.item == 'Camara Rever')[0].checked)
                                $('#controlAlarma').val(res.filter(r => r.item == 'Control Alarma')[0].checked)
                                $('#bateria').val(res.filter(r => r.item == 'Bateria')[0].checked)
                                $('#tipocombustible').val(res.filter(r => r.item == 'TipoCombustible')[0].checked)
                                $('#txtObser').val(res.filter(r => r.item == 'Observacion')[0].observacion)

                                $('#cantPano').val(res.filter(r => r.item == 'Panoramicos')[0].cantidad)
                                $('#cantParlan').val(res.filter(r => r.item == 'Parlantes')[0].cantidad)
                                $('#cantRejillas').val(res.filter(r => r.item == 'Rejillas A/A')[0].cantidad)
                                $('#cantPlumi').val(res.filter(r => r.item == 'Plumillas')[0].cantidad)
                                $('#cantCintu').val(res.filter(r => r.item == 'Cinturones')[0].cantidad)
                                $('#cantMani').val(res.filter(r => r.item == 'Manijas')[0].cantidad)
                                $('#cantTaSol').val(res.filter(r => r.item == 'Tapa Soles')[0].cantidad)
                                $('#cantTape').val(res.filter(r => r.item == 'Tapetes')[0].cantidad)
                            }
                        }
                    })

                    $('#aggVehi').val(0)
                    $('#vehiculo').removeClass('d-none')
                    $('#btnAgg').attr('hidden', '')
                    $('#vehiculoT').attr('hidden', '')

                }
            })
        } else {
            $.ajax({
                url: "<?= base_url('OrdenServicio/obtenerUltimaOrden') ?>",
                type: 'POST',
                data: {},
                dataType: 'json',
                success: function(data) {
                    $('#ordenTrabajo').attr('disabled', '')
                    $('#ordenTrabajo').val(parseInt(data['n_orden']) + 1)
                }
            })
            $('#datailInv').removeAttr('open')
            $('#tp').val(1)
            $('#id').val(id)
            $('#aggVehi').val(0)
            $('#vehiculo').removeClass('d-none')
            $('#vehiculoT').attr('hidden', '')
            limpiarCampos('', 1)
            limpiarInventario()

            $('#tpInventario').val(1)

            $('#btnGuardar').text('Guardar')
            $('#tituloModal').text('Agregar')
            $('#imgModal').attr('src', '<?= base_url('img/plus-b.png') ?>')
            $('#imgModal').attr('width', '25')
            $('#btnAgg').removeAttr('hidden')

            $('#msgOrden').text('')
            $('#msgPlaca').text('')

        }
        agregarDisabled()
    }
    //Input dinamico para los clientes
    function verTipoCliente(id, idCliente) {
        $.ajax({
            url: '<?= base_url('vehiculos/buscarResponsable'); ?>',
            data: {
                idTipo: id
            },
            type: 'POST',
            success: function(res) {
                res = JSON.parse(res)
                var cadena
                cadena = `<option selected value=""> -- Seleccione -- </option>`
                for (let i = 0; i < res.length; i++) {
                    nombre = `${res[i].nombre_p} ${res[i].nombre_s} ${res[i].apellido_p} ${res[i].apellido_s}`;
                    cadena += `<option ${res[i].estado == 'I' ? 'disabled' : ''} value=${res[i].id_tercero}>${res[i].tipo_tercero == 5  ? nombre : res[i].razon_social} ${res[i].estado == 'I' ? ' - Inactivo' : ''}</option>`
                }
                $('#cliente').html(cadena)
                $('#cliente').val(idCliente)
            }
        })
    }
    $('#tipoCliente').on('change', function(e) {
        id = $('#tipoCliente').val()
        verTipoCliente(id, '')
        if (id == 56) {
            $('#divResponsable').addClass('d-flex')
        } else {
            $('#divResponsable').removeClass('d-flex')
        }
    })
    //Verificacion de Orden de Trabajo y Placa del vehiculo 
    function verificarOrdenPlaca(url, data, input, tipo) {
        tp = $('#tp').val()
        $.post(url, data, function(res) {
            if (JSON.parse(res) == null) {
                $(`#${input}`).text('')
                validOrden = true
                validPlaca = true
            } else {
                if (tp == 2) {
                    vehi = JSON.parse(res)
                    placa = $('#placaHidden').val()
                    if (placa == vehi.placa) {
                        $(`#${input}`).text('')
                        validOrden = true
                        validPlaca = true
                    } else {
                        $(`#${input}`).text(`* ${tipo} ya registrada *`)
                        validOrden = false
                        validPlaca = false
                    }
                } else {
                    $(`#${input}`).text(`* ${tipo} ya registrada *`)
                    validOrden = false
                    validPlaca = false
                }
            }
        })
    }
    $('#ordenTrabajo').on('input', function(e) {
        data = {
            orden: $('#ordenTrabajo').val(),
            placa: ''
        }
        verificarOrdenPlaca("<?= base_url('vehiculos/buscarVehiculo') ?>", data, 'msgOrden', 'Orden de Trabajo')
    })
    $('#vehiculoT').on('input', function(e) {
        data = {
            orden: '',
            placa: $('#vehiculoT').val()
        }
        verificarOrdenPlaca("<?= base_url('vehiculos/buscarVehiculo') ?>", data, 'msgPlaca', 'Placa')
    })
    //Verificacion de fecha entrada y salida
    $('#fechaEntrada').on('change', function(e) {
        fechaSalida = $('#fechaSalida').val()
        fechaEntrada = $('#fechaEntrada').val()
        $('#fechaSalida').attr('min', fechaEntrada)
        if (fechaSalida != '') {
            $('#msgFecha').text('')
            validFecha = true
        } else
        if (fechaSalida >= fechaEntrada) {
            $('#msgFecha').text('')
            validFecha = true
        } else {
            $('#msgFecha').text('* La fecha salida debe ser mayor a la de entrada *')
            validFecha = true
        }
    })
    $('#fechaSalida').on('change', function(e) {
        fechaSalida = $('#fechaSalida').val()
        fechaEntrada = $('#fechaEntrada').val()
        if (fechaEntrada == '') {
            $('#msgFecha').text('* Ingrese una fecha de entrada *')
            validFecha = false
        } else
        if (fechaSalida >= fechaEntrada) {
            $('#msgFecha').text('')
            validFecha = true
        } else {
            $('#msgFecha').text('* La fecha salida debe ser mayor a la de entrada *')
            validFecha = false
        }
    })
    //Agregar vehiculo
    $('#btnAgg').on('click', function(e) {
        if ($('#aggVehi').val() == 1) {
            $('#aggVehi').val(0)
            $('#vehiculo').removeClass('d-none')
            $('#vehiculoT').attr('hidden', '')
            agregarDisabled()
        } else {
            $('#aggVehi').val(1)
            $('#vehiculo').addClass('d-none')
            $('#vehiculoT').attr('placeholder', 'Ej: QWE123')
            $('#vehiculoT').removeAttr('hidden')
            //Quitar disabled
            $('#tipoCliente').removeAttr('disabled')
            $('#cliente').removeAttr('disabled')
            $('#placaHidden').removeAttr('disabled')
            $('#marca').removeAttr('disabled')
            $('#nFabrica').removeAttr('disabled')
            $('#color').removeAttr('disabled')
            $('#kms').removeAttr('disabled')
            $('#combustible').removeAttr('disabled')

            limpiarCampos('', 1)
        }
    })
    //Formulario para agregar o editar Vehiculo
    $('#formularioOrdenes').on('submit', function(e) {
        e.preventDefault()
        aggVehi = $('#aggVehi').val()
        tp = $('#tp').val()
        tpInv = $('#tpInventario').val()
        id = $('#id').val()
        orden = $('#ordenTrabajo').val()

        tipoCliente = $('#tipoCliente').val()
        cliente = $('#cliente').val()

        vehiculo = $('#vehiculo').val() //Select
        nuevoVehiculo = $('#vehiculoT').val() //Input

        // Si se agrega un nuevo vehiculo
        placa = $('#placa').val()
        marca = $('#marca').val()
        nFabrica = $('#nFabrica').val()
        color = $('#color').val()
        kms = $('#kms').val()
        combustible = $('#combustible').val()

        nombreRespon = $('#nombreRespon').val()
        apellidoRespon = $('#apellidoRespon').val()
        tipoDocRes = $('#tipoDocRes').val()
        nIdentiRes = $('#nIdentiRes').val()

        estado = $('#estado').val()
        fechaEntrada = $('#fechaEntrada').val()
        fechaSalida = $('#fechaSalida').val()


        //Inventario
        // IDs
        idGrua = $('#idGrua').val()
        idLlaves = $('#idLlaves').val()
        idDocs = $('#idDocu').val()
        idRetro = $('#idRetro').val()
        idRetroInter = $('#idRetroInter').val()
        idPanora = $('#idPanora').val()
        idRadio = $('#idRadio').val()
        idParlan = $('#idParlan').val()
        idRejillas = $('#idRejillas').val()
        idEncen = $('#idEncen').val()
        idPito = $('#idPito').val()
        idPlumi = $('#idPlumi').val()
        idCintu = $('#idCintu').val()
        idMani = $('#idMani').val()
        idComando = $('#idComando').val()
        idTaSol = $('#idTaSol').val()
        idTape = $('#idTape').val()
        idTapi = $('#idTapi').val()
        idLuz = $('#idLuz').val()
        idTapa = $('#idTapa').val()
        idLlavePer = $('#idLlavePer').val()
        idHerra = $('#idHerra').val()
        idKit = $('#idKit').val()
        idGato = $('#idGato').val()
        idExtintor = $('#idExtintor').val()
        idSensores = $('#idSensores').val()
        idCamara = $('#idCamara').val()
        idControl = $('#idControl').val()
        idBateria = $('#idBateria').val()
        idCombustible = $('#idCombustible').val()
        idObser = $('#idObser').val()

        // Checkeds
        grua = $('#grua')[0].checked
        llaves = $('#llaves')[0].checked
        documentos = $('#documentos')[0].checked

        // Selects
        retrovisores = $('#retrovisores').val()
        retroInter = $('#retroInter').val()
        panoramicos = $('#panoramicos').val()
        radio = $('#radio').val()
        parlantes = $('#parlantes').val()
        rejillas = $('#rejillas').val()
        encendedor = $('#encendedor').val()
        pito = $('#pito').val()
        plumillas = $('#plumillas').val()
        cinturones = $('#cinturones').val()
        manijas = $('#manijas').val()
        comando = $('#comando').val()
        tapaSoles = $('#tapaSoles').val()
        tapetes = $('#tapetes').val()
        tapizado = $('#tapizado').val()
        luzTecho = $('#luzTecho').val()
        tapaGaso = $('#tapaGaso').val()
        llavePer = $('#llavePer').val()
        herramientas = $('#herramientas').val()
        kitCarrete = $('#kitCarrete').val()
        gato = $('#gato').val()
        extintor = $('#extintor').val()
        sensores = $('#sensores').val()
        camaraRe = $('#camaraRe').val()
        controlAlarma = $('#controlAlarma').val()
        bateria = $('#bateria').val()
        tipocombustible = $('#tipocombustible').val()
        txtObser = $('#txtObser').val()

        //Cantidades
        cantPano = $('#cantPano').val()
        cantParlan = $('#cantParlan').val()
        cantRejillas = $('#cantRejillas').val()
        cantPlumi = $('#cantPlumi').val()
        cantCintu = $('#cantCintu').val()
        cantMani = $('#cantMani').val()
        cantTaSol = $('#cantTaSol').val()
        cantTape = $('#cantTape').val()


        arrayInven = [{
                n: 1,
                idInv: idGrua,
                item: 'Grua',
                checked: grua,
                observacion: '',
                cantidad: 0
            },
            {
                n: 2,
                idInv: idLlaves,
                item: 'Llaves',
                checked: llaves,
                observacion: '',
                cantidad: 0
            },
            {
                n: 3,
                idInv: idDocs,
                item: 'Documentos',
                checked: documentos,
                observacion: '',
                cantidad: 0
            },
            {
                n: 4,
                idInv: idRetro,
                item: 'Retrovisores',
                checked: retrovisores,
                observacion: '',
                cantidad: 0
            },
            {
                n: 5,
                idInv: idRetroInter,
                item: 'Retrovisor Interno',
                checked: retroInter,
                observacion: '',
                cantidad: 0
            },
            {
                n: 6,
                idInv: idPanora,
                item: 'Panoramicos',
                checked: panoramicos,
                observacion: '',
                cantidad: cantPano
            },
            {
                n: 7,
                idInv: idRadio,
                item: 'Radio',
                checked: radio,
                observacion: '',
                cantidad: 0
            },
            {
                n: 8,
                idInv: idParlan,
                item: 'Parlantes',
                checked: parlantes,
                observacion: '',
                cantidad: cantParlan
            },
            {
                n: 9,
                idInv: idRejillas,
                item: 'Rejillas A/A',
                checked: rejillas,
                observacion: '',
                cantidad: cantRejillas
            },
            {
                n: 10,
                idInv: idEncen,
                item: 'Encendedor',
                checked: encendedor,
                observacion: '',
                cantidad: 0
            },
            {
                n: 11,
                idInv: idPito,
                item: 'Pito',
                checked: pito,
                observacion: '',
                cantidad: 0
            },
            {
                n: 12,
                idInv: idPlumi,
                item: 'Plumillas',
                checked: plumillas,
                observacion: '',
                cantidad: cantPlumi
            },
            {
                n: 13,
                idInv: idCintu,
                item: 'Cinturones',
                checked: cinturones,
                observacion: '',
                cantidad: cantCintu
            },
            {
                n: 14,
                idInv: idMani,
                item: 'Manijas',
                checked: manijas,
                observacion: '',
                cantidad: cantMani
            },
            {
                n: 15,
                idInv: idComando,
                item: 'Comando ptas',
                checked: comando,
                observacion: '',
                cantidad: 0
            },
            {
                n: 16,
                idInv: idTaSol,
                item: 'Tapa Soles',
                checked: tapaSoles,
                observacion: '',
                cantidad: cantTaSol
            },
            {
                n: 17,
                idInv: idTape,
                item: 'Tapetes',
                checked: tapetes,
                observacion: '',
                cantidad: cantTape
            },
            {
                n: 18,
                idInv: idTapi,
                item: 'Tapizado',
                checked: tapizado,
                observacion: '',
                cantidad: 0
            },
            {
                n: 19,
                idInv: idLuz,
                item: 'Luz Techo',
                checked: luzTecho,
                observacion: '',
                cantidad: 0
            },
            {
                n: 20,
                idInv: idTapa,
                item: 'Tapa Gasolina',
                checked: tapaGaso,
                observacion: '',
                cantidad: 0
            },
            {
                n: 21,
                idInv: idLlavePer,
                item: 'Llave Pernos',
                checked: llavePer,
                observacion: '',
                cantidad: 0
            },
            {
                n: 22,
                idInv: idHerra,
                item: 'Herramientas',
                checked: herramientas,
                observacion: '',
                cantidad: 0
            },
            {
                n: 23,
                idInv: idKit,
                item: 'Kit Carretera',
                checked: kitCarrete,
                observacion: '',
                cantidad: 0
            },
            {
                n: 24,
                idInv: idGato,
                item: 'Gato',
                checked: gato,
                observacion: '',
                cantidad: 0
            },
            {
                n: 25,
                idInv: idExtintor,
                item: 'Extintor',
                checked: extintor,
                observacion: '',
                cantidad: 0
            },
            {
                n: 26,
                idInv: idSensores,
                item: 'Sensores',
                checked: sensores,
                observacion: '',
                cantidad: 0
            },
            {
                n: 27,
                idInv: idCamara,
                item: 'Camara Rever',
                checked: camaraRe,
                observacion: '',
                cantidad: 0
            },
            {
                n: 27,
                idInv: idControl,
                item: 'Control Alarma',
                checked: controlAlarma,
                observacion: '',
                cantidad: 0
            },
            {
                n: 28,
                idInv: idBateria,
                item: 'Bateria',
                checked: bateria,
                observacion: '',
                cantidad: 0
            },
            {
                n: 29,
                idInv: idCombustible,
                item: 'TipoCombustible',
                checked: tipocombustible,
                observacion: '',
                cantidad: 0
            },
            {
                n: 30,
                idInv: idObser,
                item: 'Observacion',
                checked: true,
                observacion: txtObser,
                cantidad: 0
            },
        ]
        $('#btnGuardar').attr('disabled', '')
        arrayInven.forEach(elem => elem.checked == '' ? validInv = false : validInv = true)
        if ([orden, vehiculo = aggVehi == 0 ? vehiculo : nuevoVehiculo, cliente, txtObser, estado, kms, fechaEntrada].includes('') || !validOrden || !validPlaca || !validFecha) {
            return mostrarMensaje('error', '¡Hay campos vacios o invalidos!')
        } else if (!validInv) {
            return mostrarMensaje('error', '¡Debe completar todos los campos del inventario!')
        } else {
            $.ajax({
                url: '<?= base_url('ordenServicio/insertar') ?>',
                type: 'POST',
                data: {
                    aggVehi,
                    tp,
                    id,
                    orden,

                    vehiculo: aggVehi == 0 ? vehiculo : nuevoVehiculo,

                    kms,
                    infoVehi: aggVehi == 0 ? null : {
                        placa,
                        marca,
                        nFabrica,
                        color,
                        combustible
                    },

                    tipoCliente,
                    cliente,

                    nombreRespon,
                    apellidoRespon,
                    tipoDocRes,
                    nIdentiRes,

                    estado,
                    fechaEntrada,
                    fechaSalida
                },
                success: function(data) {
                    data = JSON.parse(data)
                    arrayInven.forEach(elem => {
                        $.ajax({
                            type: 'POST',
                            url: "<?= base_url('inventarioOrden/insertar') ?>",
                            data: {
                                tp: tpInv,
                                n: elem.n,
                                idInv: elem.idInv,
                                idOrden: data,
                                item: elem.item,
                                checked: elem.checked,
                                observacion: elem.observacion,
                                cantidad: Number(elem.cantidad)
                            },
                            dataType: 'json',
                            success: function(data) {
                                if (data == 2) {
                                    return mostrarMensaje('error', '¡Ha ocurrido un error!')
                                }
                            }
                        })
                    })
                    if (tp == 1) {
                        mostrarMensaje('success', '¡Se ha Guardado la Orden se Servicio!')
                    } else {
                        mostrarMensaje('success', '¡Se ha Actualizado la Orden se Servicio!')
                    }
                    $('#agregarOrden').modal('hide')
                    $('#agregarOrden').modal('hide')
                    $('#vehiculo').removeClass('d-none')
                    $('#vehiculoT').val('')
                    $('#vehiculoT').attr('hidden', '')
                    obtenerVehiculos()
                    $('#btnGuardar').remove('disabled')
                    tablaOrdenes.ajax.reload(null, false)
                }
            })
        }
    })
    // Cambiar estado del vehiculo
    $('#cambiarEstado').on('show.bs.modal', function(e) {
        $.ajax({
            url: '<?= base_url('ordenServicio/buscarOrden') ?>',
            type: 'POST',
            dataType: 'json',
            data: {
                id: $(e.relatedTarget).data('href')
            },
            success: function(data) {
                $('#tituloModalEstado').text('Cambiar Estado - ' + data.n_orden)
                $('#estadoVehiculo').val(data.proceso)
                $('#idVehi').val($(e.relatedTarget).data('href'))
            }
        })
    })
    $('#btnCambiarEstado').click(function(e) {
        id = $('#idVehi').val()
        estado = $('#estadoVehiculo').val()
        if (estado == '') {
            return mostrarMensaje('error', '¡Hay campos vacios!')
        } else {
            $.ajax({
                url: '<?= base_url('ordenServicio/cambiarEstado') ?>',
                dataType: 'json',
                type: 'POST',
                data: {
                    id,
                    estado
                },
                success: function(data) {
                    if (data == 1) {
                        mostrarMensaje('success', '¡Se ha cambiado el estado del Vehiculo!')
                        tablaOrdenes.ajax.reload(null, false)
                        $('#cambiarEstado').modal('hide')
                        $('#idVehi').val('')
                        $('#estadoVehiculo').val('')
                    }
                }
            })
        }
    })
</script>