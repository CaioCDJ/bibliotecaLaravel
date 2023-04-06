<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('styles')
  </head>
  <body class="bg-light">
   
  @yield('conteudo')

  @stack('scripts')
  
  </body>
</html>