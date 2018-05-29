


{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Projects')

@section('content_header')
    <h1>Projects</h1>
@stop

@section('content')
  
<div class="pull-right">
      <a href="{{url('/admin/projects/create')}}" class="btn btn-primary">New</a>
    </div>
    {!! Form::open(['method'=>'get']) !!}
      <div class="row">
        <div class="col-sm-5 form-group">
          <div class="input-group">
            <input class="form-control" id="search" value="{{ request('search') }}" placeholder="Search name" name="search" type="text" id="search"/>
            <div class="input-group-btn">
              <button type="submit" class="btn btn-warning">
                Search
              </button>
            </div>
          </div>
        </div>
        <input type="hidden" value="{{request('field')}}" name="field"/>
        <input type="hidden" value="{{request('sort')}}" name="sort"/>
      </div>
    {!! Form::close() !!}
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
          <td >{{ $project->tag_id }}</td>
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

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop