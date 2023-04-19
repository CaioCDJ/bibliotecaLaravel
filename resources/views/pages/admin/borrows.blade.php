@extends('layouts/admin')
@section('title','Emprestimos')
@section('ad-page','Emprestimos')


@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
@endpush

@push('scripts')
<script defer src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script defer src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>

@endpush

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-8">
      Lista de livros
    </div>
  </div>

  <div class="row">
    <table id="table" class="table table-striped-rows">
      <thead>
        <tr class="table-dark">
          <th scope="col">id</th>
          <th scope="col">Usuario</th>
          <th scope="col">Titulo</th>
          <th scope="col">Data da retirada</th>
          <th scope="col">Data de retorno</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @php
          $today = new DateTime('now');
        @endphp

        @foreach($borrows as $borrow)

        @php
         $dateB = new DateTime($borrow->returnDt);
          $class = ( $dateB< $today ) ?"bg-danger text-white" :"" ; 
        @endphp 

        <tr class="{{$class}}">
          <th>{{$borrow->id}}</th>
          <th>{{$borrow->name}}</th>
          <th>{{$borrow->title}}</th>
          <th>{{$borrow->created_at}}</th>
          <th>{{$borrow->returnDt}}</th>
          <th>
            <a class="tableOp text-primary" title="Renovar">
              <i class="bi bi-pencil-square"></i>
            </a>
          </th>
          <th>
            <a class="tableOp btnOk text-success" href="{{route('admin.borrows.returned',['id' =>$borrow->id])}}" title="Retorno">
              <i class="bi bi-check-circle"></i>
            </a>
          </th>
          </tr>
          @endforeach
      </tbody>
    </table>
  </div>

</div>

@endsection
