@extends('layout')
@section('title','Home')
@section('conteudo')

  {{-- Comentario --}}

  <h1>ola, {{ $id }}</h1>

@include('includes/footer')

<div class="alert alert-secondary" role="alert">
  {{$id}}
</div>

@endsection
