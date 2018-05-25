@extends('layouts/app_admin')

	@section('content')
    <div class="pull-right">
          <a href="{{url('/admin/projects/create')}}" class="btn btn-primary">New</a>
      </div>

    <table class="table">
        <thead class="bg-dark">
        <th >No</th>
        <th >
            <a href="{{url('admin/projects')}}?search={{request('search')}}&field=title&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">
                Name
            </a>
            {{request('field','title')=='title'?(request('sort','asc')=='asc'?'&#9652;':'&#9662;'):''}}
        </th>
        <th>Description</th>
        <th>Budget</th>
        <th>Category</th>
        <th>Tags</th>
        <th>Client</th>
        <th>Company</th>
        <th >Action</th>

        </thead>

        <tbody>
            @php
                $i=1;
            @endphp
            @foreach($projects as $project)

                <tr>
                <th >{{$i++}}</th>
                    <td >{{ $project->title }}</td>
                    <td >{{ substr( $project->description, 0, 50 )   }}...</td>
                    <td >{{ $project->budget }}</td>
                    
                    <td> {{  App\Project::find($project->id)->category->name }}  </td>
                    <td> 
                    @php
                    $tags = App\Project::find($project->id)->tags;
                    foreach($tags as $tag){
                        echo $tag->name;
                        echo "<br>";
                    }
                    @endphp

                    </td>
                    <td> {{  App\Project::find($project->id)->user->name }}  </td>
                    <td> {{  App\Project::find($project->id)->company->name }}  </td>
                    <td  align="center">
                        <form id="frm_{{$project->id}}" action="{{url('/admin/tags/delete/'.$project->id)}}"  method="post">
                            <a class="btn btn-primary btn-sm" title="Edit"  href="{{url('/admin/tags/update/'.$project->id)}}">
                                Edit</a>
                            <input type="hidden" name="_method" value="delete"/>
                            {{csrf_field()}}
                            <a class="btn btn-danger btn-sm" title="Delete"  href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$project->id}}').submit()">
                                Delete
                            </a>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav>
          <ul class="pagination pull-right">
              
              {{$projects->setPath('/admin/projects')->links('vendor.pagination.bootstrap-4')}}
          </ul>
      </nav>

@stop