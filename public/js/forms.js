

function addBook(url){
Swal.fire({
    html: `
    <form method="post" action="http://biblioteca.test/book">
      <input required type="text" name="title" placeholder="titulo">
      <input required type="text" name="author" placeholder="autor">
      <input required type="text" name="publisher" placeholder="editora">
      <input required type="number" name="qtPages" placeholder="numero de paginas">
      <input required type="date" name="releaseDt" placeholder="data de lançamento">
      <select required name="category">
        <option>Linguagens</option>
        <option>Arquitetura</option>
        <option>Banco de dados</option>
        <option>Redes</option>
      </select>
      <input required type="text" name="imgUrl" placeholder="url img">
      <input required type="number" name="qt" placeholder="Quantidade:">
      <textarea name="desc">
      </textarea>
      <input required type="submit" value="Enviar">
    </form>
  `,
  showConfirmButton: false
  });
}
