//Cuando se le haga click a la etiqueta que tenga el id #delete se ejecutará la función que eliminará los datos a través de una petición AJAX que manejará el controlador indicadores en la función delete
$(document).on("click", "#delete", function(e){

    e.preventDefault();

    //Variable que tendrá el value según se le haga click a cada etiqueta con id delete, teniendo entonces el "id" de cada registro
    var del_id = $(this).attr("value");

    /* SweetAlert */
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    
    /* SweetAlert que salta después de hacerle click a la eiqueta de id #delete */
    swalWithBootstrapButtons.fire({
        title: 'Estás seguro?',
        text: "Después no podrás revertirlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, borrar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true

        //Si se presiona confirmar entonces ejecutará el script encargado de eliminar el registro
    }).then((result) => {
        if (result.isConfirmed) {
            //Petición ajax que conectará con la ruta delete
            $.ajax({
                url: "/solutoriatask/indicadores/delete",
                type: "post",
                dataType: "json",
                data: {
                    del_id: del_id
                },
                //data tendrá los valores según el valor de la variable del_id, para luego pasar ese valor a la función delete dentro del controlador y así tener los datos específicos de cada dato
                success: function(data){
                    console.log(data.response);
                    //Si la respuesta es exitosa 
                    if(data.response == "success"){
                        //Se destruye la tabla y se carga nuevamente con fetch() para actualizar los registros
                        $('#myTable').DataTable().destroy();
                        fetch();
                        swalWithBootstrapButtons.fire(
                            'Eliminado!',
                            'El dato ha sido eliminado.',
                            'success'
                        );

                    }

                }
        
            })

            //Mensaje de SweetAlert que mostrará en caso de presion "No, cancelar"
        } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire(
            'Cancelado',
            'El dato está a salvo :)',
            'error'
        )
        }
    })

})