@extends('layouts/admin')
@section('title','admin-users')

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

{{-- Comentario --}}

<div class="container">

  <div class="row">
  </div>
  
  <div class="row">
   <table class="table ">
    <thead>
      <tr class="table-dark">
        <th scope="col">id</th>
        <th scope="col">nome</th>
        <th scope="col">email</th>
        <th scope="col">Endereço</th>
        <th scope="col">Telefone</th>
        <th scope="col">Data de criação</th>
        <th scope="col"></th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
       @foreach($users as $user)
        <tr>
          <th>{{$user->id}}</th>
          <th>{{$user->name}}</th>
          <th>{{$user->email}}</th>
          <th>{{$user->address}}</th>
          <th>{{$user->phone}}</th>
          <th>{{$user->created_at}}</th>
          <th><a>alterar</a></th>
          <th><a>deletar</a></th>
        </tr>
       @endforeach
    </tbody>
   </table>  
  </div>

</div>
@endsection
