<main>
  <form action="{{route('signin.req')}}" method="post">
    @csrf
    <h1>Cadastro</h1>
    <input required type="text" name="name" placeholder="Nome: " >
    <input required type="email" name="email" placeholder="Email:" >
    <input required type="number" name="phone" placeholder="Numero de telefone:" >
    <input required type="text" name="address" placeholder="Endereço:" >
    <input required type="password" name="password" placeholder="Senha:" >
    <input required type="password" name="confirmPassword" placeholder="Confirmar Senha:" >
    <input class="btnForm" required type="submit" value="Confirmar">
  </form>
  <p>Não tem uma conta?</p>
  <button class="btnForm"></button>
</main>
