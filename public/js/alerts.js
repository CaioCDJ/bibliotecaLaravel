
function error(title = "error", msg) {

  Swal.fire( {
    icon: 'error',
    title,
    text: msg
  });
}
