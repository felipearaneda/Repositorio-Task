$(document).on("click", "#update", function(e){

    e.preventDefault();

    var id_indicador_edit = $("#id_indicador_edit").val();
    var nombre_indicador_edit = $("#nombre_indicador_edit").val();
    var codigo_indicador_edit = $("#codigo_indicador_edit").val();
    var unidad_medida_indicador_edit = $("#unidad_medida_indicador_edit").val();
    var valor_indicador_edit = $("#valor_indicador_edit").val();
    var fecha_indicador_edit = $("#fecha_indicador_edit").val();
    var origen_indicador_edit = $("#origen_indicador_edit").val();

    $.ajax({

        url: "/solutoriatask/indicadores/update",
        type: 'post',
        datatype: "json",
        data: {
            id_indicador_edit: id_indicador_edit,
            nombre_indicador_edit: nombre_indicador_edit,
            codigo_indicador_edit: codigo_indicador_edit,
            unidad_medida_indicador_edit: unidad_medida_indicador_edit,
            valor_indicador_edit: valor_indicador_edit,
            fecha_indicador_edit: fecha_indicador_edit,
            origen_indicador_edit: origen_indicador_edit
        },
        success: function(data){
            console.log(data);

            $('#myTable').DataTable().clear().destroy();

            fetch();

            $('#modalEdit').modal('hide');
        }
    });
})