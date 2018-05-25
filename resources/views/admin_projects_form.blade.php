@extends('layouts/app_admin')

@section('content')
    <div class="container">
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
                    {!! Form::text("title",null,["class"=>"form-control".($errors->has('title')?" is-invalid":""),"autofocus",'placeholder'=>'Title']) !!}
                    {!! $errors->first('title','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("lbl_description","Description",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::textarea("description",null,["class"=>"form-control".($errors->has('description')?" is-invalid":""),'placeholder'=>'Description']) !!}
                    {!! $errors->first('description','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("lbl_budget","Budget",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                <div class="input-group">
                  <span class="input-group-addon">Php</span>
                    {!! Form::number("budget",100,["class"=>"form-control".($errors->has('budget')?" is-invalid":""),'placeholder'=>'Budget']) !!}
                    {!! $errors->first('budget','<span class="invalid-feedback">:message</span>') !!}
                </div>
                </div>
            </div>

            <div class="form-group row required">
                {!! Form::label("lbl_category","Category",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
        
                    {!!Form::select('category',  App\Category::pluck('name', 'id'), 'S', ["class"=>"form-control".($errors->has('cagetory')?" is-invalid":""),'placeholder'=>'Category'] ); !!}
                    {!! $errors->first('category','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>

          <div class="form-group row required">
            @php 
              $current_user="user_alex";
            @endphp
                {!! Form::label("lbl_user","User",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!!Form::text("user",$current_user,["class"=>"form-control".($errors->has('user')?" is-invalid":""),'placeholder'=>'User']) !!}
                    {!! $errors->first('user','<span class="invalid-feedback">:message</span>') !!}
                </div>
          </div>


          <div class="form-group row required">
          {!! Form::label("lbl_company","Company",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
          <div class="col-md-8">
          {!!Form::select('company',  App\company::pluck('name', 'id'), 'S', ["class"=>"form-control".($errors->has('tags')?" is-invalid":""),'placeholder'=>'Company'] ); !!}
   
            </div>
          </div>

          <div class="form-group row required">
                {!! Form::label("lbl_tags","Tags Options",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("tags", App\company::pluck('name'),["class"=>"form-control".($errors->has('tags')?" is-invalid":""),'placeholder'=>'Tags']) !!}
                    {!! $errors->first('tags','<span class="invalid-feedback">:message</span>') !!}
                </div>
          </div>

          <div class="form-group row required">
                {!! Form::label("",null,["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::textarea("tags",null,["class"=>"form-control".($errors->has('tags')?" is-invalid":""),'placeholder'=>'Tags','style'=>'max-height: 80px;']) !!}
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
    </div>
@endsection