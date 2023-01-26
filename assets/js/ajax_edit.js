$(document).on("click", "#edit", function(e){

    e.preventDefault();

    var edit_id = $(this).attr("value");

    $.ajax({

        url: "/solutoriatask/indicadores/edit",
        type: 'post',
        datatype: "json",
        data: {
            edit_id: edit_id
        },
        success: function(data){
            console.log(data);
            var res = JSON.parse(data);
            console.log(res);
            $("#modalEdit").modal('show');
            $("#id_indicador_edit").val(res.id);
            $("#nombre_indicador_edit").val(res.nombre_indicador);
            $("#codigo_indicador_edit").val(res.codigo_indicador);
            $("#unidad_medida_indicador_edit").val(res.unidad_medida_indicador);
            $("#valor_indicador_edit").val(res.valor_indicador);
            $("#fecha_indicador_edit").val(res.fecha_indicador);
            $("#origen_indicador_edit").val(res.origen_indicador);

            console.log(res);

        }
    });
})