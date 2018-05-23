<nav class="navbar top-nav navbar-static-top ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"><img  src={{asset('img/mowelfund_logo.png')}} alt="Logo" style="height: -webkit-fill-available;"></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="{{Request::is('/') ? 'active' : ''}}" ><a href="/">Home</a></li>
        <li class="{{Request::is('about') ? 'active' : ''}}" ><a href="/about">About</a></li>
        <li class="{{Request::is('projects') ? 'active' : ''}}" ><a href="/projects">Projects</a></li>
        <li class="{{Request::is('projects') ? 'active' : ''}}" ><a href="/admin">Admin</a></li>
      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>

<nav class="navbar min-navbar navbar-static-top ">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
   
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="" ><a href="/">Home</a></li>

      </ul>
    </div><!--/.nav-collapse -->
  </div>
</nav>