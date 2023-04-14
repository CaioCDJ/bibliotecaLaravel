@extends('layouts/forms')
@section('title','cadastro')
@section('content')

<form class="flex-center" method="post" action="{{ route('signin.req') }}">
  @csrf
  <img  src="{{URL('imgs/logo.png')}}" alt="">
  <h2>Cadastro</h2>
    <input required type="text" name="name" placeholder="Nome: " >
    <input required type="email" name="email" placeholder="Email:" >
    <input required type="number" name="phone" placeholder="Numero de telefone:" >
    <input required type="text" name="address" placeholder="Endereço:" >
    <input required type="password" name="password" placeholder="Senha:" >
    <input required type="password" name="confirmPassword" placeholder="Confirmar Senha:" >
    <input class="btnForm" required type="submit" value="Confirmar">
  <p>
    Já possui uma conta?
    <a href="{{route('login.index')}}" >Faça o login</a>
  </p>

</form>

@error('email')
{{$message}}
@enderror
@error('email')
{{$message}}
@enderror

@endsection

@push("scripts")
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/formsStyles.css') }}">
@endpush
