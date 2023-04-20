@extends('layout')
@section('title','Home')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endpush

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
  document.querySelector("#form").addEventListener('submit', e => {
    e.preventDefault();
    location.assign("http://biblioteca.test/books?search=" + document.querySelector("#txt").value);
  });
</script>
@endpush


@section('content')

<div id="firstView" class="flex-center">

  <h1 class="text-white">Seja bem vindo a sua biblioteca virtual</h1>
  <form id="form" name="searchForm" action="">
    <input id="txt" name="txt" type="text" placeholder="Buscar livro">
  </form>

</div>

<section class="category">

  <h3 class="secTitle">Categorias Disponiveis</h3>
  <div class="d-grid">
    <a href="{{route('books',['category'=>'linguagens'])}}" class="border border-primary">Linguagens</a>
    <a href="{{route('books',['category'=>'arquitetura'])}}" class="border border-primary">Arquitetura</a>
    <a href="{{route('books',['category'=>'banco de dados'])}}" class="border border-primary">Banco de Dados</a>
    <a href="{{route('books',['category'=>'redes'])}}" class="border border-primary">Redes</a>
    <a href="{{route('books',['category'=>'seguranca'])}}" class="border border-primary">Segurança</a>
    <a href="{{route('books',['category'=>'derivados'])}}" class="border border-primary">Derivados</a>
  </div>

</section>


<section class="container-fluid added">

  <div class="row">
    <div class="col-md-6 col-sm-12 added-info">
      <h3 class="added-title">Livros Recém Adicionados</h3>
      <p class="text-secondary">
        Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et culpa duis.
      </p>
      <ul>
        <li>Alguma vantagem</li>
        <li>Alguma desvantagem</li>
        <li>Alguma coisa boa</li>
        <li>Escolhe um e leva logo seu animal</li>
      </ul>
    </div>
    <div class="col-md-6 col-sm-12">

      <div class="added-books">
        @foreach($books as $book)

        <div class="bookAdded">
          <div class="card text-bg-dark">
            <img src="{{$book->imgUrl}}" class="card-img" alt="...">
            <div class="card-img-overlay">
              <p class="card-text">
                <span>Autor: </span>{{$book->author}}
              </p>
              <hr>
              <p class="card-text">
                @php
                $dt = new DateTime($book->releaseDt);
                @endphp
                Lançamento {{$dt->format('d/m/Y')}}
                </small>
              </p>
              <hr>
              <p class="card-text">
                <span>Editora: </span>{{$book->publisher}}
              </p>
              <hr>
              <a href="{{route('book',['id'=>$book->id])}}">Ir a pagina</a>
            </div>
          </div>
        </div>

        @endforeach
      </div>
    </div>
  </div>

</section>

<section class="container-fluid account">
  <div class="flex-center info">
    <a class="icon"><i class="bi bi-person-circle"></i></a>
    <h3>Ficou interessado em algum livro?</h3>
    <p>Não perca seu tempo e ja realize o seu pedido.</p>
    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
      <a class="btn btn-success">Faça o Login</a>
      <a class="btn btn-info">Cadastre-se</a>
    </div>
  </div>
</section>

<section class="container-fluid about">

  <div class="row">
    <div class="col-5 about-img">
      <img src="https://images.unsplash.com/photo-1532294220147-279399e4e00f?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjAwfHxib29rfGVufDB8MHwwfHw%3D&auto=format&fit=crop&w=500&q=60">
    </div>
    <div class="col-7 about-info ">
      <h3>Sobre a Biblioteca</h3>
      <hr>
      <p>
        Lorem ipsum dolor sit amet, officia excepteur ex fugiat reprehenderit enim labore culpa sint ad nisi Lorem pariatur mollit ex esse exercitation amet. Nisi anim cupidatat excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem est aliquip amet voluptate voluptate dolor minim nulla est proident. Nostrud officia pariatur ut officia. Sit irure elit esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor Lorem duis laboris cupidatat officia voluptate. Culpa proident adipisicing id nulla nisi laboris ex in Lorem sunt duis officia eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt velit enim. Voluptate laboris sint cupidatat ullamco ut ea consectetur et est culpa et culpa duis.
      </p>
      <p>Lorem ipsum dolor sit amet, qui minim labore adipisicing minim sint cillum sint consectetur cupidatat.</p>

      <a class="btn btn-outline-info">Saiba mais</a>
    </div>
  </div>

</section>

@endsection
