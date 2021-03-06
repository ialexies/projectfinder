
<div class="jumbotron text-center">
  <div class="container">
    <h1>Mowelfund Project Finder</h1>
    <p class="lead">Welcome to our brand new Laravel Powered Website. This site uses laravel vs. 5.0</p>
  </div>
</div>
<div class="row">
  <div class="col-md-3">
    <div class="well">
      <h4><b>Filters</b></h4>
      <hr>
      <div class="sidebar-heading">Project Type</div>
      <div class=" sidebar-subcontent  ">              
        @foreach($categories as $category)
        <div class="checkbox">
          <label><input type="checkbox" value="">{{$category->name}}</label>
        </div>
        @endforeach
      </div>
      <div class="sidebar-heading">Tags</div>
      <div class=" sidebar-subcontent  ">   
        <div class="form-group">
          <p>           
            @foreach($tags as $tag)
              {{$tag->name}}
            @endforeach
          </p>
        </div>
      </div>
      <center>
        <button type="button" class="btn btn-primary  btn-block"><i class="material-icons" style="font-size:14px;">line_style</i> Filter</button>
      </center>
    </div>    
    
  </div>
  <div class="col-md-9">
    <div id="content-project">



      <nav class="navbar navbar-inverse">
      <div class="container-fluid">

        {{ Form::open(array('method' => 'get', 'class'=>'navbar-form navbar-left', )) }}
          <div class="input-group">
            <input class="form-control" id="search" value="{{ request('search') }}" placeholder="Search title" name="search" type="text" id="search"/>
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        {!! Form::close() !!}

        <div class="navbar-header">
        <a class="navbar-brand" href="#">{{count($projects)}} Results</a>
        </div>
        <ul class="nav navbar-nav">
        <li ><a href="#">SortBy</a></li>
        </ul>
      </div>
      </nav>
      
      @foreach($projects as $project)
        <div class="project-item">
          <div class="row">
            <div class="col-md-9">
              <i class="material-icons project-item-icon" style="font-size:14px;">card_travel</i><div class="project-item-title"><h5 > <b> {{$project->title}}</b></h5></div>
              <p>{{substr( $project->description, 0, 400 ) }}   ...<a>More</a></p>
              <p><b>
                [
                  @php 
                    $Project_tags=App\Project::findorFail(12);
                        foreach($Project_tags->tags as $role){
                        echo $role->name . ",";
                    }
                  @endphp
                ]
               </b></p>
            </div>
            <div class="col-md-3">
              <center>
                <h4><b><p>{{$project->budget}}</p></b></h4>
                <button type="button" class="btn btn-primary  btn-block"> Details</button>
              </center>
            </div>
          </div>
        </div>
        <hr>
      @endforeach
    </div>
    <nav>
      <ul class="pagination pull-right">
        
        {{$projects->setPath('/projects')->links('vendor.pagination.bootstrap-4')}}
      </ul>
    </nav>
  </div>
</div>