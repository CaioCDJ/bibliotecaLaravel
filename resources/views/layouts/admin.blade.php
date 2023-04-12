
<!DOCTYPE html>
  <html lang="pt-br">

  <head>
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{csrf_token()}}"> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
  </head>
 
  <body class="sidebar-mini layout-fixed layout-navbar-fixed sidebar-closed sidebar-collapse sidebar-dark">

    <div class="wrapper">

      @include('includes/headerAdmin')

      @include('includes/sidebar')
      
      <div class="content-wrapper">
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">@yield('title')</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">@yield('ad-page')</li>
                </ol>
              </div>
            </div>
          </div>

        </div>
        
        <section class="content">
          @yield('content')
        </section>

      </div>

    </div>


    @include('includes/footer')
    @stack('scripts')

  </body>

  </html>
