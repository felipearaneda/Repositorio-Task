<!-- Vista de la página principal -->
<body>
    
    <div>
        <div class="toggleOn">
            Dark Mode:
            <span class="change">OFF</span>
        </div>
        <div class="center">
            <h1>Información tabla Info_Valor</h1>

            <!-- Botón para insertar registro -->
            <button class="btn btn-primary" data-toggle="modal" data-target="#modalNew">Nuevo Registro </button>

            <!-- Botón que lleva al dashboard -->
            <a href="<?= base_url() ?>indicadores/dashboard" class="btn btn-primary"> Dashboard </a> 
        </div>
    </div>
        <!-- Div que contiene la tabla -->
        <div class="table-responsive">
            <!-- Table que contiene el header y un id para que luego DataTables genere el body -->
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>NombreIndicador</th>
                        <th>CodigoIndicador</th>
                        <th>UnidadMedidaIndicador</th>
                        <th>ValorIndicador</th>
                        <th>FechaIndicador</th>
                        <th>OrigenIndicador</th>
                        <th>Editar / Eliminar</th>
                    </tr>
                </thead>
            </table>
        </div>

        <div class="div-fondo"></div>
    

    <!-- Modal New para insertar datos que será llamado por assets/ajax_post para insertar datos según el id del modal #modalNew-->
    <div class="modal" id="modalNew" role="dialog" aria-labelledby="modalLabelNew" aria-hidden="true" style="text-align:left">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Header del modal -->
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Insertar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <!-- Body del modal -->
            <div class="modal-body">
                <!-- Indicación de que es un formulario para las validaciones del controlador indicadores en la función insert -->
                <form action="" method="post" id="formNew">
                    <div class="form-group">
                        <input id="nombre_indicador" type="text" class="form-control" name="nombre_indicador">
                        <label for="">Nombre Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="codigo_indicador" type="text" class="form-control" name="codigo_indicador">
                        <label for="">Código Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="unidad_medida_indicador" type="text" class="form-control" name="unidad_medida_indicador"> 
                        <label for="">Unidad Medida Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="valor_indicador" type="number" class="form-control" name="valor_indicador">
                        <label for="">Valor Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="fecha_indicador" type="date" class="form-control" name="fecha_indicador">
                        <label for="">Fecha Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="origen_indicador" type="text" class="form-control" name="origen_indicador">
                        <label for="">Origen Indicador</label>
                    </div>
                </form>
            </div>
            <!-- Footer del modal -->
            <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="send" class="btn btn-primary" type="submit">Insertar Dato</button>
            </div>
        </div>
        
        </div>
    </div>

    <!-- Modal Edit para Modificar datos que será llamado por assets/ajax_put para actualizar datos según el id del modal #modalEdit-->
    <div class="modal" id="modalEdit" role="dialog" aria-labelledby="modalLabelEdit" aria-hidden="true" style="text-align:left">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- Header del modal -->
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <!-- Body del modal -->
            <div class="modal-body">
                <!-- Indicación de que es un formulario -->
                <form action="" method="post" id="formEdit">
                    <input type="hidden" id="id_indicador_edit" value="">
                    <div class="form-group">
                        <input id="nombre_indicador_edit" type="text" class="form-control">
                        <label for=""> Nombre Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="codigo_indicador_edit" type="text" class="form-control">
                        <label for="">Código Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="unidad_medida_indicador_edit" type="text" class="form-control"> 
                        <label for="">Unidad Medida Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="valor_indicador_edit" type="text" class="form-control">
                        <label for="">Valor Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="fecha_indicador_edit" type="text" class="form-control">
                        <label for="">Fecha Indicador</label>
                    </div>
                    <div class="form-group">
                        <input id="origen_indicador_edit" type="text" class="form-control">
                        <label for="">Origen Indicador</label>
                    </div>
                </form>
            </div>
            <!-- Footer del modal -->
            <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="update" class="btn btn-primary">Editar</button>
            </div>
        </div>
        
        </div>
    </div>


    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <!-- SweetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- JS de bootstrap en assets/js/bootstrap.js -->
    <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>

    <!-- JS de dataTables -->
    <script src="//cdn.datatables.net/2.0.1/js/dataTables.min.js"></script>
<!--     <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script> -->

    <!-- JS de las peticiones de AJAX en assets/js/ -->
    <script src="<?= base_url() ?>assets/js/ajax_get.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_post.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_edit.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_put.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_delete.js"></script>
    <script src="<?= base_url() ?>assets/js/darkMode.js"></script>


</body>
