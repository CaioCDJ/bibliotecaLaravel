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

<section>

{{-- 2 categorias linguagens e derivados --}}

</section>


<section>

</section>

@endsection
