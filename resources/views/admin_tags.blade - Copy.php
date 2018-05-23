@extends('layouts/app_admin')

	@section('content')

		<div class="table-responsive tag-div"> 
			<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Add Tags</a>
				</h4>
			</div>
			<div id="collapse3" class="panel-collapse collapse">
				<div class="panel-body">
				{!! Form::open(['url' => '/admin_tags/store']) !!}
						<div class="form-group">
							{{FORM::text ('tagname', '', ['class'=>'form-control','placeholder'=>'Enter Name'])}}  
						</div>
						<div>
							{{FORM::submit('Submit', ['class'=>'btn btn-primary pull-right'])}}
						</div>
					{!! Form::close() !!}
				</div>
			</div>
			</div>
						
				<table class="table table-striped  table-hover " > 
					<thead> 
						<tr> 
							<th>No.</th> 
							<th>Tag Name</th>  
							<th></th>
						</tr> 
					</thead> 
					<tbody> 
						@foreach($tags as $tag)
							<tr id="{{$tag->id}}"> 
								<td scope="row" class="table-counter">{{$loop->index+1}}</td>
								<td>{{$tag->name}}</td> 
								<td > 
									<div class="btn-group pull-right" role="group" aria-label="...">

									<div class="btn-group">
										<button type="button" class="btn btn-primary">Update</button>
										{!! Form::open(['method' => 'DELETE','route' => ['tags.destroy', $tag->id],'style'=>'display:inline']) !!}
											<button type="submit" class="btn btn-primary">Delete</button>
										{!! Form::close() !!}

									</div>

									</div>
								</td>
							</tr> 
						@endforeach
					</tbody> 
				</table>
		</div>
	@stop