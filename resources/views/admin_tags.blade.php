



{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Tags')

@section('content_header')
  <h1>Project Tags</h1>
@stop

@section('content')

  <div class="pull-right">
    <a href="{{url('/admin/tags/create')}}" class="btn btn-primary">New</a>
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
      <a href="{{url('admin/tags')}}?search={{request('search')}}&field=name&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">
        Tag Name
      </a>
      {{request('field','name')=='name'?(request('sort','asc')=='asc'?'&#9652;':'&#9662;'):''}}
    </th>

    <th >Action</th>

    </thead>

    <tbody>
      @php
        $i=1;
      @endphp
      @foreach($tags as $tag)
        <tr>
        <th >{{$i++}}</th>
          <td >{{ $tag->name }}</td>
          <td  align="center">
            <form id="frm_{{$tag->id}}" action="{{url('/admin/tags/delete/'.$tag->id)}}"  method="post">
              <a class="btn btn-primary btn-sm" title="Edit"  href="{{url('/admin/tags/update/'.$tag->id)}}">
                Edit</a>
              <input type="hidden" name="_method" value="delete"/>
              {{csrf_field()}}
              <a class="btn btn-danger btn-sm" title="Delete"  href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$tag->id}}').submit()">
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
      
      {{$tags->setPath('/admin/tags')->links('vendor.pagination.bootstrap-4')}}
    </ul>
  </nav>

@stop

@section('css')
  <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
  <script> console.log('Hi!'); </script>
@stop