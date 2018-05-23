@extends('layouts/app_admin')

@section('content')
    <div class="container">
        <div class="col-md-8 offset-md-2">
            <h1>{{isset($categories)?'Edit':'New'}} Customer</h1>
            <hr/>
            @if(isset($categories))
                {!! Form::model($categories,['method'=>'put']) !!}
            @else
                {!! Form::open() !!}
            @endif

            <div class="form-group row required">
                {!! Form::label("name","Name",["class"=>"col-form-label col-md-3 col-lg-2"]) !!}
                <div class="col-md-8">
                    {!! Form::text("name",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),"autofocus",'placeholder'=>'Name']) !!}
                    {!! $errors->first('name','<span class="invalid-feedback">:message</span>') !!}
                </div>
            </div>
          
            <div class="form-group row">
                <div class="col-md-3 col-lg-2"></div>
                <div class="col-md-4">
                    <a href="{{url('/admin/categories')}}" class="btn btn-danger">
                        Back</a>
                    {!! Form::button("Save",["type" => "submit","class"=>"btn
                btn-primary"])!!}
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection