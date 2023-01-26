$(document).on("click", "#delete", function(e){

    e.preventDefault();

    var del_id = $(this).attr("value");

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
        confirmButton: 'btn btn-success',
        cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })
    
    swalWithBootstrapButtons.fire({
        title: 'Estás seguro?',
        text: "Después no podrás revertirlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí, borrar!',
        cancelButtonText: 'No, cancelar!',
        reverseButtons: true

    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "/solutoriatask/indicadores/delete",
                type: "post",
                dataType: "json",
                data: {
                    del_id: del_id
                },
                success: function(data){
                    console.log(data.response);
                    
                    if(data.response == "success"){
                        $('#myTable').DataTable().destroy();
                        fetch();
                        swalWithBootstrapButtons.fire(
                            'Eliminado!',
                            'El dato ha sido eliminado.',
                            'success'
                        );

                    }else{
                        
                    }

                }
        
            })


        } else if (result.dismiss === Swal.DismissReason.cancel) {
        swalWithBootstrapButtons.fire(
            'Cancelado',
            'El dato está a salvo :)',
            'error'
        )
        }
    })

})