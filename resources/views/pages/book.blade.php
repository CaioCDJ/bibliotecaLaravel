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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script src="{{asset('js/alerts.js')}}"></script>

@error('error')
<script>
  console.log('{{$message}}')
  alertError('', '{{$message}}')
</script>
@enderror

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

    <div class="col-7 imgBox">
      <img class="imgBook" src="{{$book->imgUrl}}">
    </div>
    <div class="col-5">

      <div class="row">
        <h2>{{$book->title}}</h2>
      </div>

      <div class="row">
        <ul class="infoUl">
          <li class="info">
            <span>Autor</span>
            <div class="text-secondary">{{$book->author}}</div>
          </li>

          <li class="info">
            <span>Categoria</span>
            <div class="text-secondary">{{$book->category}}</div>
          </li>
          <li class="info">
            <span>Editora</span>
            <div class="text-secondary">{{$book->publisher}}</div>
          </li>
          <li class="info">
            <span>Data de Lançamento</span>
            <div class="text-secondary">{{$book->releaseDt}}</div>
          </li>
          <li class="info">
            <span>Categoria</span>
            <div class="text-secondary">
              @php
              $dt = new DateTime($book->releaseDt);
              @endphp
              {{$dt->format('d/m/Y')}}
            </div>
          </li>
        </ul>
        <div>
          @auth
          <a class="btn btn-outline-success" href="{{route('borrow.new',['book_id'=>$book->id])}}">Requisitar a Locação</a>
          @else
          <a class="btn btn-success" href="{{route('login.index')}}">Requisitar a Locação</a>
          @endauth
        </div>
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
