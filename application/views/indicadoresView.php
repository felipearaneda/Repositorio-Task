<body>
    
    <div style="text-align:center">
        <h1 style="text-align:center">Información tabla Info_Valor</h1>

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalNew">Nuevo Registro </button>
        <a href="<?= base_url() ?>indicadores/dashboard" class="btn btn-primary"> Dashboard </a> 

        <div class="table-responsive">
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
    </div>

    <!-- Modal New -->
    <div class="modal" id="modalNew" role="dialog" aria-labelledby="modalLabelNew" aria-hidden="true" style="text-align:left">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Insertar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="send" class="btn btn-primary" type="submit">Insertar Dato</button>
            </div>
        </div>
        
        </div>
    </div>

    <!-- Modal Edit -->
    <div class="modal" id="modalEdit" role="dialog" aria-labelledby="modalLabelEdit" aria-hidden="true" style="text-align:left">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal Editar</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
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
            <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button id="update" class="btn btn-primary">Editar</button>
            </div>
        </div>
        
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="<?= base_url() ?>assets/js/bootstrap.js"></script>
    <script src="//cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.3.1/js/dataTables.fixedHeader.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>

    <script src="<?= base_url() ?>assets/js/ajax_get.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_post.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_edit.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_put.js"></script>
    <script src="<?= base_url() ?>assets/js/ajax_delete.js"></script>


</body>
