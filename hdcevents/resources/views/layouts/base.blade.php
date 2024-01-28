<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>

  <style>
    body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    margin: 0;
}
  </style>
  
  @stack('css')
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">

</head>
@yield('conteudo')
<body>


  <footer class="footer" style="margin-top: auto;">
    <div class="content has-text-centered">
      <p>
        © 2024 eBooks - Todos os direitos reservados.
      </p>
      <p>
        Desenvolvido por <a href="https://github.com/Propfend" target="blank"><strong>Luiz Miguel</strong></a>
      </p>
      <p>
          <div>
            <a href="https://github.com/Propfend" target="_blank"><img src="{{asset('imagens/github.png')}}" alt="gitHub" style="width: 50px;"></a>
              <a href="https://www.linkedin.com/in/luiz-miguel-1154bb277/" target="_blank"><img src="{{asset('imagens/linkedin.png')}}" alt="linkedIn" style="width: 50px;"> </a>
              <a href="https://wa.me/5583988869118" target="_blank"><img src="{{asset('imagens/zap.png')}}" alt="discord" style="width: 51px;" ></a>
              <div>
      </p>
    </div>
  </footer>

</body>
</html>