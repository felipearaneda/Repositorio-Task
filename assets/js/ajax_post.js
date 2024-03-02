//Cuando se le haga click a la etiqueta que tenga el id #send se ejecutará la función que identificará los datos a través de una petición AJAX que manejará el controlador indicadores en la función insert
$(document).on("click", "#send", function(e){

    e.preventDefault();

    //Variables que tendrán los valores de cada etiqueta en el modal de id modalNew
    let postNombre = $("#nombre_indicador").val();
    let postCodigo = $("#codigo_indicador").val();
    let postUnidad = $("#unidad_medida_indicador").val();
    let postValor = $("#valor_indicador").val();
    let postFecha = $("#fecha_indicador").val();
    let postOrigen = $("#origen_indicador").val();

    $.ajax({
        //se conecta con la ruta insert para insertar los datos en la base de datos
        url: "/repositorio-task/indicadores/insert",
        type: 'post',
        datatype: "json",
        //data que pasara los valores correspondientes de las variables anterior mencionadas para insertarlas en cada columna de la tabla info_valor en la base de datos
        data: {
            "nombreIndicador": postNombre,
            "codigoIndicador": postCodigo,
            "unidadMedidaIndicador": postUnidad,
            "valorIndicador": postValor,
            "fechaIndicador": postFecha,
            "origenIndicador": postOrigen,
        },
        //Si la inserción de datos es correcta entonces
        success: function(data){
            //Se destruirá el dataTable
            $('#myTable').DataTable().clear().destroy();
            //se llamará a la funcion fetch para traer los datos nuevamente
            fetch();
            //Se ocultará el modal de id modalNew
            $('#modalNew').modal('hide');

        }
    });

    $("#formNew")[0].reset();

})