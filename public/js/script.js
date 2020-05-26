$('.button-delete').on('click', function (e) {
    e.preventDefault();
    const url = $(this).attr('href');
    swal({
            title: 'Jeste li sigurni?',
            text: 'Nećete moći vratiti ovaj oglas!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Ne, natrag',
            confirmButtonText: 'Da, obriši oglas',
            
        }).then(function(value) {
        if (value) {
            swal(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
            window.location.href = url;
        }
    });
    });

    Dropzone.options.dropzone =
        {
            maxFilesize: 10,
            renameFile: function (file) {
                var dt = new Date();
                var time = dt.getTime();
                return time + file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 60000,
            success: function (file, response) {
                console.log(response);
            },
            error: function (file, response) {
                return false;
            }
        };