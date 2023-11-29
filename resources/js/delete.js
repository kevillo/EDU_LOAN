$('.form-delete').submit(function (e) {
    e.preventDefault();
    swal({
        title: "¿Estás seguro?",
        text: "Una vez eliminado, no podrás recuperar este usuario.",
        icon: "warning",
        buttons: ["Cancelar", "Eliminar"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                this.submit();
            }
        });
});

