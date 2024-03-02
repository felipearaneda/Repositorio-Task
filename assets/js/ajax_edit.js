//Cuando se le haga click a la etiqueta que tenga el id #edit se ejecutará la función que identificará los datos a través de una petición AJAX que manejará el controlador indicadores en la función edit
$(document).on("click", "#edit", function(e){

    e.preventDefault();

    //Variable que tendrá el value según se le haga click a cada etiqueta con id edit, teniendo entonces el "id" de cada registro
    var edit_id = $(this).attr("value");
    
    $.ajax({
        //Petición ajax que conectará con la ruta edit
        url: "/repositorio-task/indicadores/edit",
        type: 'post',
        datatype: "json",
        data: {
            edit_id: edit_id
        },
        //data tendrá los valores según el valor de la variable edit_id, para luego pasar ese valor a la función edit dentro del controlador y así tener los datos específicos de cada dato
        success: function(data){
            console.log(data);
            var res = JSON.parse(data); //Se le realiza un parse a data para tener los datos en formato JSON y trabajarlos más fácil
            console.log(res);
            //Se muestra el modal de id modalEdit
            $("#modalEdit").modal('show');
            //A cada etiqueta dentro del modal edit se identificará con su respectivo ID para luego entregarle el valor ya obtenido en la variable res que contiene los datos específicos según el click realizado anteriormente a cada etiqueta de id "edit"
            $("#id_indicador_edit").val(res.id);
            $("#nombre_indicador_edit").val(res.nombreIndicador);
            $("#codigo_indicador_edit").val(res.codigoIndicador);
            $("#unidad_medida_indicador_edit").val(res.unidadMedidaIndicador);
            $("#valor_indicador_edit").val(res.valorIndicador);
            $("#fecha_indicador_edit").val(res.fechaIndicador);
            $("#origen_indicador_edit").val(res.origenIndicador);

            console.log(res);

        }
    });
})