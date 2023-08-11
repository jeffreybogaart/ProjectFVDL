$(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");

  
                  Swal.fire({
                    title: 'Let op!',
                    text: "Gegevens verwijderen?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Verwijderen',
                    cancelButtonText: 'Annuleren'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Verwijderd!',
                        'Gegevens zijn verwijderd.',
                        'success'
                      )
                    }
                  }) 


    });

  });
  
