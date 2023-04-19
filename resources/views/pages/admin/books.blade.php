@extends('layouts/admin')
@section('title','admin-books')
@section('ad-page','Livros')


@push('styles')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
@endpush

@push('scripts')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script defer src="https://releases.jquery.com/git/jquery-git.min.js"></script>
<script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script defer src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script defer src="{{asset('js/forms.js')}}"></script>

@endpush

@section('content')

<div class="container">

  <div class="row">
    <div class="col-md-8">
      Lista de livros
    </div>
    <div class="col-6 col-md-4">
      <a href="{{route('admin.book.add')}}">Adicionar Livro</a>
    </div>
  </div>

  <div class="row">
    <table id="table" class="table table-striped-rows">
      <thead>
        <tr class="">
          <th scope="col">id</th>
          <th scope="col">Title</th>
          <th scope="col">Author</th>
          <th scope="col">Editora</th>
          <th scope="col">Paginas</th>
          <th scope="col">lançamento</th>
          <th scope="col">Categoria</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Disponivel</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach($books as $book)
        <tr>
          <th>{{$book->id}}</th>
          <th>{{$book->title}}</th>
          <th>{{$book->author}}</th>
          <th>{{$book->publisher}}</th>
          <th>{{$book->qtPages}}</th>
          <th>
            @php
            $dt = new DateTime($book->releaseDt);
            @endphp
            {{$dt->format('d/m/Y')}}
          </th>
          <th>{{$book->category}}</th>
          <th>{{$book->qt}}</th>
          <th>{{$book->available}}</th>
          <th>
            <a class="tableOp text-primary" title="Modificar">
              <i class="bi bi-pencil-square"></i>
            </a>
          </th>
          <th>
            <a class="tableOp btnDel text-danger" title="Deletar">
              <i class="bi bi-trash"></i>
            </a>
          </th>
        </tr>
        @endforeach
      </tbody>
    </table>

    @php
    $ex= $books->links('includes/pagination')
    @endphp
    {{$ex}}
  </div>

</div>

@endsection
