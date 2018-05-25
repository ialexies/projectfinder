
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
    <script src="/js/app.js"></script>
</head>
<body>

  


  @include('inc.admin_navbar')
  
  <div class="container">
    <!-- @if(Request::is('/'))
      @include('inc.showcase')
    @endif -->
    <div class="row">

      @include('inc.messages')
        <div class="col-md-2 col-lg-2">
          @include('inc.admin_sidebar')
        </div>

      <!--
        <div class="col-md-8 col-lg-8">
          @include('inc.messages')
          @yield('content')
        </div>

      </div> -->

      <div class="col-md-10 col-lg-10">
        @yield('content')
      </div>

  </div>

  <footer id="footer" class="text-center">
    <p>Copyright 2018 &copy; Acme</p>
  </footer>
</body>
</html>