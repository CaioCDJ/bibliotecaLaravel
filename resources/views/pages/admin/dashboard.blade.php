@extends('layouts/admin')
@section('title','admin-books')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endpush

@push('scripts')
<script src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush


@section('content')

{{--
    Comentario 
  - qt livros
  - numeros de emprestimos
  - numero de usuarios cadastrados
  - numero de admins cadastrados
  --}}

<div class="container-fluid">

  <div class="row">

    <div class="col-lg-3 col-6">

      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$dashboardInfo[0]}}</h3>
          <p>Quantidade de Livros</p>
        </div>
        <div class="icon">
          <i class="bi bi-book"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle"></i></a>
      </div>
    </div>


    <div class="col-lg-3 col-6">

      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$dashboardInfo[1]}}</h3>
          <p>Usuarios</p>
        </div>
        <div class="icon">
          <i class="bi bi-people"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>150</h3>
          <p>Quantidade de Emprestimos</p>
        </div>
        <div class="icon">
          <i class="bi bi-bookmark"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle"></i></a>
      </div>
    </div>

    <div class="col-lg-3 col-6">

      <div class="small-box bg-danger">
        <div class="inner">
          <h3>150</h3>
          <p>Emprestimos Vencidos</p>
        </div>
        <div class="icon">
          <i class="bi bi-bookmark-x"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="bi bi-arrow-right-circle"></i></a>
      </div>
    </div>
  </div>

  <div class="row"></div>


</div>


@endsection
