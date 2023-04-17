@extends('layout')
@section('title','Home')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endpush

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script defer src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script defer>
  document.querySelector("#btnDel").addEventListener("click", () => {
    Swal.fire({
      title: 'Voce tem certeza?',
      text: `Sua conta sera deletada permanentemente.`,
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'confirmar!'
    }).then((result) => {

      if (result.isConfirmed) {
        location.assign("{{route('user.del',['id'=>$user->id])}}");
      }
    });
  });

  document.querySelector("#btnPassword").addEventListener("click", () => {
    Swal.fire({
      showCancelButton: false,
      showConfirmButton: false,
      html: `
 <form method="POST" action="{{route('user.password',['id'=> $user->id])}}">
 @csrf
 <h3>Alteração de Senha</h3>
  <input name="password" class="form-control" type="password" placeholder="Digite a sua senha atual">
  <input name="newPassword" class="form-control" type="password" placeholder="Digite sua nova senha">
  <input name="confirmPassword" class="form-control" type="password" placeholder="Digite sua nova senha novamente">
  <div class="container-fluid">
    <input class="btn bnt-primary" type="submit" value="Confirmar">
  </div>
</form>
        `
    });
  });

  document.querySelector("#btnAlt").addEventListener("click", () => {
    Swal.fire({
      showCancelButton: false,
      showConfirmButton: false,
      html: `
 <form method="POST" action="{{route('user.update',['id'=> $user->id])}}">
 @csrf
 <h3>Alteração de dados</h3>
 <input class="form-control" name="name" type="text" placeholder="Nome:" value="{{$user->name}}">
 <input class="form-control" name="phone" type="text" placeholder="Telefone:" value="{{$user->phone}}">
 <input class="form-control" name="address" type="text" placeholder="Endereço:" value="{{$user->address}}">
  <div class="container-fluid">
    <input class="btn bnt-primary" type="submit" value="Confirmar">
  </div>
</form> `
    });
  });
</script>

@endpush

@section('content')

{{-- Comentario --}}



<div class="container-fluid">
  <div class="row">

    @error('password')
    <div class="alert alert-danger" role="alert">
      {{$message}}
    </div>
    @enderror

  </div>
  <div class="row">

    <div class="col-6">
      <div class="col-12">
        <ul>
          <li>{{$user->name}}</li>
          <li>{{$user->email}}</li>
          <li>{{$user->address}}</li>
          <li>{{$user->phone}}</li>
        </ul>
      </div>
      <div class="col-12">
        <button id="btnAlt">altearar usuario</button>
        <button id="btnPassword">Mudar senha</button>
        <button id="btnDel">Deletar usuario</button>
      </div>
    </div>

    <div class="col-6">
      <table class="table">
        <thead>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </thead>
        <tbody>
          @foreach($user->borrows as $borrow)
          <tr>
            <td>{{$borrow->id}}</td>
            <td>{{$borrow->returned}}</td>
            <td>{{$borrow->book->title}}</td>
          </tr>

          @endforeach
        </tbody>
      </table>
    </div>

  </div>

</div>

@endsection
