const message = $('.info-data').data('infodata');

if( message == "sukses" ) {
    Swal.fire({
        icon: 'success',
        title: 'Sukses',
        text: 'Berhasil!',
        timer: 3000
      })      
}
else if( message == "gagal" ) {
    Swal.fire({
        icon: 'error',
        title: 'Gagal',
        text: 'Gagal!',
        timer: 3000
      })
}

$('.delete-data').on('click', function(e) {
    e.preventDefault();
    var getLink = $(this).attr('href');
    Swal.fire({
        title: 'Apa kamu yakin?',
        text: "Data akan dihapus secara permanen!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.fire({
            icon: 'success',
            title: 'Sukses',
            text: 'Berhasil menghapus data!',
            timer: 3000
          })
          window.location.href = getLink;
        }
      })   
});

