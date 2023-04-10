@extends('layouts/admin')
@section('title','Adicionar livro')
@section('ad-page','Livros')


@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endpush

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script defer src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script defer src="{{asset('js/forms.js')}}"></script>

@endpush


@section('content')

<form method="post" action="{{route('book.add')}}">
  @csrf
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
@endsection
