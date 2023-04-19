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

<section id="firstView" class="flex-center">

  <h1 class="text-white">Seja bem vindo a sua biblioteca virtual</h1>
  <form id="form" name="searchForm" action="">
    <input id="txt" name="txt" type="text" placeholder="Buscar livro">
  </form>

</section>

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


<section class="added">

  <div class="row">
    <h3 class="secTitle">Livros Recem Adicionados</h3>
  </div>

  <div class=books>

    @foreach($books as $book)

    <div class="col">
      <a href="{{route('book',['id'=>$book->id])}}">
        <div class="card" style="width: 18rem;">
          <img src="{{$book->imgUrl}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$book->author}}</h5>
            <p class="card-text" style=" text-overflow: ellipsis;overflow: hidden;white-space: nowrap;">{{$book->desc}}</p>
          </div>
        </div>
      </a>
    </div>
    @endforeach
  </div>

</section>

<section class="container-fluid standout">

  <div class="row">
    <h3 class="secTitle">Livro Destaque</h3>
  </div>

  <div class="row">
    <div class="col-6 standoutImg">
      <img src="{{$mostAvailable->imgUrl}}">
    </div>

    <div class="col-6 standoutInfo">
      <ul>
        <li class="border-bottom border-secondary">
          <span>Titulo</span>
          <div>{{$mostAvailable->title}}</div>
        </li>
        <li class="border-bottom border-secondary">
          <span>Autor</span>
          <div>{{$mostAvailable->author}}</div>
        </li>
        <li class="border-bottom border-secondary">
          <span>Editora</span>
          <div>{{$mostAvailable->publisher}}</div>
        </li>
        <li class="border-bottom border-secondary">
          <span>Categoria</span>
          <div>{{$mostAvailable->category}}</div>
        </li>
        <li class="border-bottom border-secondary">
          <span>Numero de Paginas</span>
          <div>{{$mostAvailable->qtPages}}</div>
        </li>
        <li class="d-grid">
          <a href="{{route('book',['id'=>$mostAvailable->id])}}" class="btn btn-outline-primary">Ver mais</a>
        </li>
      </ul>
    </div>
  </div>
</section>


<section class="container-fluid">

  <a class="btn btn-outline-primary">Saiba mais</a>
</section>

@endsection
