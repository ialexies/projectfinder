
{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Companies')

@section('content_header')
    <h1>List of Companies</h1>
@stop

@section('content')
  
<div class="companies-div"> 
    <div class="pull-right">
      <a href="{{url('/admin/companies/create')}}" class="btn btn-primary">New</a>
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
        <a href="{{url('admin/companies')}}?search={{request('search')}}&field=name&sort={{request('sort','asc')=='asc'?'desc':'asc'}}">
          Category Name
        </a>
        {{request('field','name')=='name'?(request('sort','asc')=='asc'?'&#9652;':'&#9662;'):''}}
      </th>
      <th >Contact No.</th>
      <th >Address</th>
      <th >Action</th>

      </thead>

      <tbody>
        @php
          $i=1;
        @endphp
        @foreach($companies as $company)
          <tr>
          <th >{{$i++}}</th>
            <td >{{ $company->name }}</td>
            <td >{{ $company->contactno }}</td>
            <td >{{ $company->address}}</td>
            <td  align="center">
              <form id="frm_{{$company->id}}" action="{{url('/admin/companies/delete/'.$company->id)}}"  method="post">
                <a class="btn btn-primary btn-sm" title="Edit"  href="{{url('/admin/companies/update/'.$company->id)}}">
                  Edit</a>
                <input type="hidden" name="_method" value="delete"/>
                {{csrf_field()}}
                <a class="btn btn-danger btn-sm" title="Delete"  href="javascript:if(confirm('Are you sure want to delete?')) $('#frm_{{$company->id}}').submit()">
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
        {{$companies->setPath('/admin/companies')->links('vendor.pagination.bootstrap-4')}}
      </ul>
    </nav>
  </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop