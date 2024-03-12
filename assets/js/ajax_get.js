//Función que traerá los valores de la ruta fetch a través de una petición AJAX que manejará el controlador indicadores en la función fetch
function fetch(){

    //Se inicia el DataTable identificando a la etiqueta canvas de id #myTable
    $('#myTable').DataTable( {
        //Se conecta a la ruta fetch para traer los datos
        "ajax": '/api-crud/indicadores/fetch',
        "type": "get",
        "dataType": "json",
        "responsive": true,
        "columnDefs":[{
            "defaultContent": "-",
            "targets": "_all",
            "className": "column"
        }],
        "columns":
        [
            //Se le indica el valor que tendrá cada columna con los datos traídos de la función fetch
            { data : 'id' },
            { data : 'nombreIndicador' },
            { data : 'codigoIndicador' },
            { data : 'unidadMedidaIndicador' },
            { data : 'valorIndicador' },
            { data : 'fechaIndicador' },
            { data : 'origenIndicador' },
            //function render para poder cargar las etiquetas a con id "edit" y "delete" que luego seran utilizados por las peticiones ajax "edit" y "delete"
            { "render": function(data, type, row, meta) {
                //Variable que contendrá los botones para luego ser retornada y así mostrarse en cada registro mostrado en el datatable y cada botón tendra el id correspondiente
                //gracias al parámetro row que permite obtener el id de cada registro
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
