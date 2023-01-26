$(document).on("click", "#send", function(e){

    e.preventDefault();

    let postNombre = $("#nombre_indicador").val();
    let postCodigo = $("#codigo_indicador").val();
    let postUnidad = $("#unidad_medida_indicador").val();
    let postValor = $("#valor_indicador").val();
    let postFecha = $("#fecha_indicador").val();
    let postOrigen = $("#origen_indicador").val();

    $.ajax({
        url: "/solutoriatask/indicadores/insert",
        type: 'post',
        datatype: "json",
        data: {
            "nombre_indicador": postNombre,
            "codigo_indicador": postCodigo,
            "unidad_medida_indicador": postUnidad,
            "valor_indicador": postValor,
            "fecha_indicador": postFecha,
            "origen_indicador": postOrigen,
        },
        success: function(data){

            $('#myTable').DataTable().clear().destroy();
            
            fetch();

            $('#modalNew').modal('hide');

        }
    });

    $("#formNew")[0].reset();

})