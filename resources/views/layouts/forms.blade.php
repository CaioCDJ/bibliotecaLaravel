<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>@yield('title')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  @stack('styles') 
</head>

<body>

  <main>
    <div class="flex-center divLeft">
      <h1>Seja bem vindo a biblioteca </h1>
    </div>
    <div class="flex-center divForm">
      @yield("content")
    </div>
  </main>
  @stack('scripts') 
</body>

</html>
