


{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Update Record')

@section('content_header')
    <h1>Projects</h1>
@stop

@section('content')
  

        <div class="col-md-8 offset-md-2">
            <h1>{{isset($projects)?'Edit':'New'}} Project</h1>
            <hr/>
            @if(isset($projects))
                {!! Form::model($projects,['method'=>'put']) !!}
            @else
                {!! Form::open() !!}
            @endif

            <div class="form-group row required">
                {!! Form::label("lbl_title","Title",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("title",null,["class"=>"form-control".($errors->has('title')?" is-invalid":""),"autofocus",'placeholder'=>'Title', "required"]) !!}
                    {!! $errors->first('title','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("lbl_description","Description",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::textarea("description",null,["class"=>"form-control".($errors->has('description')?" is-invalid":""),'placeholder'=>'Description', "required"]) !!}
                    {!! $errors->first('description','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("lbl_budget","Budget",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon">Php</span>
                    {!! Form::number("budget",100,["class"=>"form-control".($errors->has('budget')?" is-invalid":""),'placeholder'=>'Budget', "required"]) !!}
                    {!! $errors->first('budget','<span class="invalid-feedback">:message</span>') !!}
                </div>
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("lbl_category","Category",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
        
                    {!!Form::select('category',  App\Category::pluck('name', 'id'), 'S', ["class"=>"form-control".($errors->has('cagetory')?" is-invalid":""),'placeholder'=>'Category', "required"] ); !!}
                    {!! $errors->first('category','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

          <div class="form-group row required">
            @php 
              $current_user="user_alex";
            @endphp
                {!! Form::label("lbl_user","User",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!!Form::text("user",$current_user,["class"=>"form-control".($errors->has('user')?" is-invalid":""),'placeholder'=>'User', "required"]) !!}
                    {!! $errors->first('user','<span class="invalid-feedback">:message</span>') !!}
                </div>
          </div>


          <div class="form-group row required">
          {!! Form::label("lbl_company","Company",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
          <div class="col-md-8">
          {!!Form::select('company',  App\company::pluck('name', 'id'), 'S', ["class"=>"form-control".($errors->has('tags')?" is-invalid":""),'placeholder'=>'Company', "required"] ); !!}
   
            </div>
          </div>


          <div class="form-group row required">
                {!! Form::label("lbl_tags","Tags Options",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
               
                @foreach (App\Tag::all() as $tag_list)
                   <button onclick="alert(this.id)" type="button" class="btn btn-info btn-sm" id="{{ $tag_list->name }}">{{ $tag_list->name }}</button>
                @endforeach

                <br><br>
                <div class="well"></div>
                    {!! $errors->first('tags','<span class="invalid-feedback">:message</span>') !!}
                </div>
          </div>

          <div class="form-group row">
              <div class="col-md-3 col-lg-2"></div>
              <div class="col-md-4">
                  <a href="{{url('/admin/projects')}}" class="btn btn-danger">
                      Back</a>
                  {!! Form::button("Save",["type" => "submit","class"=>"btn
              btn-primary"])!!}
              </div>
          </div>

            {!! Form::close() !!}
        </div>
  

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop