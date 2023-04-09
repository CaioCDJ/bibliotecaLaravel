@extends('layout')
@section('title','Sobre')

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endpush

@push('scripts')
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
@endpush


@section('content')

{{-- Comentario --}}

  <h1>Sobre a Biblioteca</h1>

 <section>
    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1498&q=80">
    <div>
      <h3>Sub-titulo</h3>
       <p>
        Lorem ipsum dolor sit amet, officia excepteur ex fugiat 
        reprehenderit enim labore culpa sint ad nisi Lorem pariatur 
        mollit ex esse exercitation amet. Nisi anim cupidatat 
        excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem 
        est aliquip amet voluptate voluptate dolor minim nulla est 
        proident. Nostrud officia pariatur ut officia. Sit irure elit 
        esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor 
        Lorem duis laboris cupidatat officia voluptate. Culpa proident 
        adipisicing id nulla nisi laboris ex in Lorem sunt duis officia 
        eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt 
        velit enim. Voluptate laboris sint cupidatat ullamco ut ea 
        consectetur et est culpa et culpa duis.
      </p>
    </div>
  </section> 
 
 <section>
    <div>
      <h3>Sub-titulo</h3>
       <p>
        Lorem ipsum dolor sit amet, officia excepteur ex fugiat 
        reprehenderit enim labore culpa sint ad nisi Lorem pariatur 
        mollit ex esse exercitation amet. Nisi anim cupidatat 
        excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem 
        est aliquip amet voluptate voluptate dolor minim nulla est 
        proident. Nostrud officia pariatur ut officia. Sit irure elit 
        esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor 
        Lorem duis laboris cupidatat officia voluptate. Culpa proident 
        adipisicing id nulla nisi laboris ex in Lorem sunt duis officia 
        eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt 
        velit enim. Voluptate laboris sint cupidatat ullamco ut ea 
        consectetur et est culpa et culpa duis.
      </p>
    </div>
    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1498&q=80">
  </section> 
 
 <section>
    <img src="https://images.unsplash.com/photo-1512820790803-83ca734da794?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1498&q=80">
    <div>
      <h3>Sub-titulo</h3>
       <p>
        Lorem ipsum dolor sit amet, officia excepteur ex fugiat 
        reprehenderit enim labore culpa sint ad nisi Lorem pariatur 
        mollit ex esse exercitation amet. Nisi anim cupidatat 
        excepteur officia. Reprehenderit nostrud nostrud ipsum Lorem 
        est aliquip amet voluptate voluptate dolor minim nulla est 
        proident. Nostrud officia pariatur ut officia. Sit irure elit 
        esse ea nulla sunt ex occaecat reprehenderit commodo officia dolor 
        Lorem duis laboris cupidatat officia voluptate. Culpa proident 
        adipisicing id nulla nisi laboris ex in Lorem sunt duis officia 
        eiusmod. Aliqua reprehenderit commodo ex non excepteur duis sunt 
        velit enim. Voluptate laboris sint cupidatat ullamco ut ea 
        consectetur et est culpa et culpa duis.
      </p>
    </div>
  </section> 

@endsection
