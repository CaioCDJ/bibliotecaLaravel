
@php

$active = array();


$active[0] = (Route::current()->getName('admin.dashboard') == "admin.dashboard" ) ? "active" :"";
$active[1] = (Route::current()->getName('admin.dashboard') == "admin.books" ) ? "active" :"";
$active[2] = (Route::current()->getName('admin.dashboard') == "admin.book.add" ) ? "active" :"";
$active[3] = (Route::current()->getName('admin.dashboard') == "admin.borrows.index" ) ? "active" :"";

$active[4] = (Route::current()->getName('admin.dashboard') == "admin.users" ) ? "active" :"";
$active[5] = (Route::current()->getName('admin.dashboard') == "admin.admins" ) ? "active" :"";


@endphp


<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-secondary elevation-4">
  <!-- Brand Logo -->
  <a href="{{route('admin.dashboard')}}" class="brand-link">
    <img src="{{URL('imgs/logo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Biblioteca</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav dark nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item ">
          <a href="{{route('admin.dashboard')}}" class="nav-link {{$active[0]}}">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>

        <li class="nav-item ">
          <a href="#" class="nav-link {{$active[1]}}">
            <i class="nav-icon bi bi-book"></i>
            <p>
              Controle dos livros
              <i class="right bi bi-caret-left-fill"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a class="nav-link {{$active[1]}}" href="{{route('admin.books')}}">
                <i class="bi bi-list-ol"></i>
                <p>Livros</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$active[2]}}" href="{{route('admin.book.add')}}">
                <i class="bi bi-plus-circle"></i>
                <p>Adicionar livros</p>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{$active[3]}}" href="{{route('admin.borrows.index')}}">
                <i class="bi bi-patch-check"></i>
                <p>Emprestimos</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a href="{{route('admin.users')}}" class="nav-link {{$active[4]}}">
            <i class="nav-icon bi bi-person"></i>
            <p>
              Usuarios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>

        <li class="nav-item dark ">
          <a href="{{route('admin.admins')}}" class="nav-link {{$active[5]}}">
            <i class="nav-icon bi bi-person-vcard"></i>
            <p>
              Admins
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
