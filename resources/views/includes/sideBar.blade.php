<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
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
          <a href="{{route('admin.dashboard')}}" class="nav-link active">
            <i class="nav-icon bi bi-speedometer"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-book"></i>
            <p>
              Livros
              <i class="right bi bi-caret-left-fill"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.books')}}">
                Livros
                <i></i>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.book.add')}}">
                Adicionar livros
                <i></i>
              </a>
            </li>
            <li class="nav-item">
              <a>Emprestimos</a>
            </li>
          </ul>
        </li>

        <li class="nav-item ">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-person"></i>
            <p>
              Usuarios
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
        </li>
        
        <li class="nav-item dark ">
          <a href="#" class="nav-link ">
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
