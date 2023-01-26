function fetch(){

    $('#myTable').DataTable( {
        "ajax": '/solutoriatask/indicadores/fetch',
        "type": "get",
        "dataType": "json",
        "responsive": true,
        "columnDefs":[{
            "defaultContent": "-",
            "targets": "_all"
        }],
        "columns":
        [
            { data : 'id' },
            { data : 'nombre_indicador' },
            { data : 'codigo_indicador' },
            { data : 'unidad_medida_indicador' },
            { data : 'valor_indicador' },
            { data : 'fecha_indicador' },
            { data : 'origen_indicador' },
            { "render": function(data, type, row, meta) {
                var a = 
                `
                    <a href="#" id="edit" value="${row.id}" class="btn btn-primary" data-target="modalUpdate"> Editar </a>
                    <a href="#" id="delete" value="${row.id}" class="btn btn-danger"> Eliminar </a>
                `;
                
                return a;
            } }
        ]
    } );

}

fetch();

/* '<button data-target="#modalUpdate'+value.id+'" data-toggle="modal" id="buttonEdit'+value.id+'"> Editar </button>' + 
                        '<div class="modal" id="modalUpdate'+value.id+'" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left">' +
                            '<div class="modal-dialog" role="document">' +
                                '<div class="modal-content">' +
                                    '<div class="modal-header">' +
                                    '<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>' +
                                    '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
                                        '<span aria-hidden="true">&times;</span>' +
                                    '</button>' +
                                    '</div>' +
                                    '<div class="modal-body">' +
                                        '<form method="POST">' +
                                            '<input id="id_indicador'+value.id+'" type="hidden" value="'+value.id+'" > <label for="nombre_indicador"></label><br> <br>' +
                                            '<input id="nombre_indicadorU" type="text" value="'+value.nombre_indicador+'"> <label for="nombre_indicador"> Nombre Indicador </label><br> <br>' +
                                            '<input id="codigo_indicadorU" type="text" value="'+value.codigo_indicador+'"> <label for="codigo_indicador"></label> Código Indicador <br> <br>' +
                                            '<input id="unidad_medida_indicadorU" type="text" value="'+value.unidad_medidad_indicador+'"> <label for="unidad_medida_indicador">Unidad Medida Indicador</label>  <br> <br>' +
                                            '<input id="valor_indicadorU" type="text" value="'+value.valor_indicador+'"> <label for="valor_indicador">Valor Indicador</label>  <br> <br> ' +
                                            '<input id="fecha_indicadorU" type="text" value="'+date+'"> <label for="fecha_indicador">Fecha Indicador</label>  <br> <br>' +
                                            '<input id="origen_indicadorU" type="text" value="'+value.origen_indicador+'"> <label for="origen_indicador">Origen Indicador</label>  <br> <br> <br>' +
                                        '</form>' +
                                    '</div>' +
                                    '<div class="modal-footer">' +
                                    '<button class="btn btn-secondary" data-dismiss="modal">Close</button>' +
                                    '<button id="update" class="btn btn-primary">Update Data</button>' +
                                    '</div>' +
                                '</div>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +
                '</tr>';


                $("#result").append(content);

            });

            $("#update").click(function(){

                let putId = $("#id_indicadorU").val();
                let putNombre = $("#nombre_indicadorU").val();
                let putCodigo = $("#codigo_indicadorU").val();
                let putUnidad = $("#unidad_medida_indicadorU").val();
                let putValor = $("#valor_indicadorU").val();
                let putFecha = $("#fecha_indicadorU").val();
                let putOrigen = $("#origen_indicadorU").val();
            
                $.ajax({
            
                    url: "/solutoriatask/api/indicadoresapi/indicadores",
                    data: {
                        "id_indicador": putId,
                        "nombre_indicador": putNombre,
                        "codigo_indicador": putCodigo,
                        "unidad_medida_indicador": putUnidad,
                        "valor_indicador": putValor,
                        "fecha_indicador": putFecha,
                        "origen_indicador": putOrigen},
                    type: 'POST',
                    beforeSend: function(){
                        $("#sending").text('Enviando Datos');
                    },
                    success: function(data){
                        $("#id_indicadorU").val('');
                        $("#nombre_indicadorU").val('');
                        $("#codigo_indicadorU").val('');
                        $("#unidad_medida_indicadorU").val('');
                        $("#valor_indicadorU").val('');
                        $("#fecha_indicadorU").val('');
                        $("#origen_indicadorU").val('');
            
                        $("#sending").text('');
                    },
                    error: function(){
            
                    },
                    complete: function(){
            
                    }
            
                })
            
            }) */





/*             $('#load-data').on('click', function(){

                $.get('/solutoriatask/api/indicadoresapi/indicadores', function(data) {
            
                        $(document).on("click", "#delete", function(e){
            
                            e.preventDefault();
            
                            var delete_id = $(this).attr("value");
                            alert(delete_id);
            
                            if(delete_id == "") {
                                alert("ID is required");
            
                            }else{
            
                                const swalWithBootstrapButtons = Swal.mixin({
                                    customClass: {
                                      confirmButton: 'btn btn-success',
                                      cancelButton: 'btn btn-danger mr-2'
                                    },
                                    buttonsStyling: false
                                  })
                                  
                                  swalWithBootstrapButtons.fire({
                                    title: 'Estás seguro que deseas borrar este elemento?',
                                    text: "Esto no se puede deshacer!",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonText: 'Sí, borrar!',
                                    cancelButtonText: 'No, cancelar!',
                                    reverseButtons: true
                                  }).then((result) => {
                                    if (result.isConfirmed) {
            
                                        $.ajax({
                                            url: "api/indicadoresApi/deleteIndicador/"+delete_id,
                                            type: "post",
                                            datatype: "json",
                                            data: {
                                                delete_id: delete_id
                                            },
                                            success: function(data){
                                                fetch();
                                                console.log(data);
                                            }
                                        });
            
                                      swalWithBootstrapButtons.fire(
                                        'Borrado!',
                                        'El dato ha sido eliminado.',
                                        'success'
                                      )
                                    } else if (
                                      result.dismiss === Swal.DismissReason.cancel
                                    ) {
                                      swalWithBootstrapButtons.fire(
                                        'Cancelado',
                                        'El dato no se ha eliminado :)',
                                        'error'
                                      )
                                    }
                                  })
            
                            }
                         });
            
                         $(document).on("click", "#update", function(e){
            
                            e.preventDefault();
            
                            var update_id = $(this).attr("value");
                            alert(update_id);
            
                            if(update_id == "") {
            
                                alert("Id is required");
            
                            }else{
                                $.ajax({
            
                                    url: "<api/indicadoresApi/updateIndicador/"+update_id,
                                    type: "post",
                                    dataType: "json",
                                    data: {
                                        update_id: update_id
                                    },
                                    success: function(data){
                                        if(data.response == "success"){
            
                                            $('#modalUpdate').modal('show');
                                            $("nombre_indicadorU").val(data.post.id_indicador);
                                            $("nombre_indicadorU").val(data.post.nombre_indicador);
                                            $("codigo_indicadorU").val(data.post.codigo_indicador);
                                            $("unidad_medida_indicadorU").val(data.post.unidad_medidad_indicador);
                                            $("valor_indicadorU").val(data.post.valor_indicador);
                                            $("fecha_indicadorU").val(data.post.fecha_indicador);
                                            $("origen_indicadorU").val(data.post.origen_indicador);
            
                                        }else{
            
            
            
                                        }
                                    }
                                })
                            }
            
                         });
                    
                });
            }); */
 


    


        /*         $.ajax({

            url: "http://localhost/solutoriatask/indicadores/fetch",
            type: "get",
            datatype: "json",
            success: function(data){

                $('#myTable').DataTable({
                    "columns": [
                        { data : 'id' },
                        { data : 'nombre_indicador' },
                        { data : 'codigo_indicador' },
                        { data : 'unidad_medida_indicador' },
                        { data : 'valor_indicador' },
                        { data : 'fecha_indicador' },
                        { data : 'tiempo_indicador' },
                        { data : 'origen_indicador' },
                        { "render": function(data, type, row, meta) {
            
                            var a = 
                            `
                                <a href = "#" id="update" value="${row.id}" class="btn btn-primary" data-target="modalUpdate"> Editar </a>
                                <a href = "#" id="delete" value="${row.id}" class="btn btn-danger"> Eliminar </a>
                            `
                            return a;
                        } }
                    ]
                })
            }
        }) */