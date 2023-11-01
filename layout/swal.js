
function swal_succ(txt_succ){
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: txt_succ,
        showConfirmButton: false,
        timer: 2000
    });
    // preventDefault();
}
function swal_err(txt_err){
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: txt_err,
        showConfirmButton: true,
    })
    // preventDefault();
}
