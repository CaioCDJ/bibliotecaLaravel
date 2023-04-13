@extends('layout')
@section('title','Livro')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/book.css') }}">
@endpush

@push('scripts')
<script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endpush


@section('content')

{{-- Comentario 

<div>
 <img src="{{$book->imgUrl}}">
<h1>{{$book->title}}</h1>

<p>{{$book->qtPages}}</p>
<p>{{$book->author}}</p>
<p>{{$book->desc}}</p>
</div>
--}}

<div class="container">

  <div class="row main">

    <div class="col-4">
      <img class="imgBook" src="{{$book->imgUrl}}">
    </div>
    <div class="col-8">

      <div class="row">
        <h2>{{$book->title}}</h2>
      </div>
      <div class="col-12">
        <span class="text-secondary author">{{$book->author}}</span>
      </div>
      <br>
      <div class="col-12 gap-2 mt-12">
        <div class="row">
          <div class="col-6">
            <div class="infoCard bg-green">
              <span>{{$book->qt}}</span>
              <p>Disponiveis</p>
            </div>
          </div>
          <div class="col-6">
            <div class="infoCard bg-warning">
              <span>{{$book->available}}</span>
              <p>Quantidade</p>
            </div>
          </div>
        </div>
      </div>
      
      <div>
          
      </div>
    
    </div>
  </div>

</div>

</div>

<div class="container-fluid desc">
  <h3 class="row">Sinopse </h3>
  <p class="row">{{$book->desc}} </p>
</div>

</div>

</div>


@endsection
