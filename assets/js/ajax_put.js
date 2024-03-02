//Cuando se le haga click a la etiqueta que tenga el id #update se ejecutará la función que identificará los datos a través de una petición AJAX que manejará el controlador indicadores en la función update
$(document).on("click", "#update", function(e){

    e.preventDefault();

    //Variables que tendrán los valores de cada etiqueta en el modal de id modalEdit
    var id_indicador_edit = $("#id_indicador_edit").val();
    var nombre_indicador_edit = $("#nombre_indicador_edit").val();
    var codigo_indicador_edit = $("#codigo_indicador_edit").val();
    var unidad_medida_indicador_edit = $("#unidad_medida_indicador_edit").val();
    var valor_indicador_edit = $("#valor_indicador_edit").val();
    var fecha_indicador_edit = $("#fecha_indicador_edit").val();
    var origen_indicador_edit = $("#origen_indicador_edit").val();

    $.ajax({
        //Se conectará con la ruta update para actualizar los datos en la tabla info_valor de la base de datos
        url: "/repositorio-task/indicadores/update",
        type: 'post',
        datatype: "json",
        //data que se encargará de indicar a la función update en el controlador indicadores para actualizar los datos corespondientes los datos correspondientes
        data: {
            id_indicador_edit: id_indicador_edit,
            nombre_indicador_edit: nombre_indicador_edit,
            codigo_indicador_edit: codigo_indicador_edit,
            unidad_medida_indicador_edit: unidad_medida_indicador_edit,
            valor_indicador_edit: valor_indicador_edit,
            fecha_indicador_edit: fecha_indicador_edit,
            origen_indicador_edit: origen_indicador_edit
        },
        //Si la petición AJAX es exitosa entonces  
        success: function(data){
            console.log(data);
            //Se destruirá el datatable
            $('#myTable').DataTable().clear().destroy();
            //se llamará a la función fetch para traer los datos nuevamente
            fetch();
            //Se ocultará el modal de id modalEdit
            $('#modalEdit').modal('hide');
        }
    });
})