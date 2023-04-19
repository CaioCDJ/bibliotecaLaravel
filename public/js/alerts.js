
const alertError = (title="Erro!", msg) => 
  Swal.fire( {
    icon: 'error',
    title,
    text: msg
  });

const alertSuccess = (title="Sucesso!", msg) =>
  Swal.fire( {
    icon: 'success',
    title,
    text: msg
  });

