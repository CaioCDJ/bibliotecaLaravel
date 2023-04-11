
const url = 'http://biblioteca.test/admin/book/';

const rows = document.querySelector('tbody').querySelectorAll("tr");

rows.forEach(row => {

  const ths = row.querySelectorAll("th");

  row.querySelector('.btnDel').addEventListener('click', async () => {
    await remove(
      ths[0].innerText,
      ths[1].innerText
    );
  });
})


function remove(id, title) {
  Swal.fire({
    title: 'Voce tem certeza?',
    text: `O ${title} sera deletado.`,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'confirmar!'
  }).then((result) => {

    if (result.isConfirmed) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
      $.ajax({
          url: url+id,
          type:'POST',
          cache: false,
          processData: false,
          success:function(response){
            location.reload();
          }
        })
    }
  })
}

