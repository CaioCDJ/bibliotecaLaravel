@extends('layout')
@section('title','livros')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/books.css') }}">
@endpush

@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endpush


@section('content')

{{-- Comentario --}}

<aside>

</aside>

<div>
  <ul>
    @foreach($books as $book)
    <li>
      <a href="{{URl("/book/".$book->id)}}">
        <div class="card" style="width: 18rem;">
          <img src="{{$book->imgUrl}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title">{{$book->title}}</h5>
            <p class="card-text">{{$book->desc}}</p>
          </div>
        </div>
      </a>
    </li>
    @endforeach
  </ul>
  @php
    $ex= $books->links('includes/pagination')
    @endphp
    {{$ex}}
</div>

@endsection
