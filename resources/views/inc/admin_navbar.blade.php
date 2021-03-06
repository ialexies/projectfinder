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
        <li class="{{Request::is('admin') ? 'active' : ''}}" ><a href="/admin">Dashboard</a></li>
        <li class="{{Request::is('admin_tags') ? 'active' : ''}}" ><a href="/admin/projects">Projects</a></li>
        <li class="{{Request::is('admin_tags') ? 'active' : ''}}" ><a href="/admin/companies">Companies</a></li>
        <li class="{{Request::is('admin_tags') ? 'active' : ''}}" ><a href="/admin/categories">Categories</a></li>
        <li class="{{Request::is('admin_tags') ? 'active' : ''}}" ><a href="/admin/tags">Tags</a></li>
        <li class="{{Request::is('admin_tags') ? 'active' : ''}}" ><a href="/">Home</a></li>
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