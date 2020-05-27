@extends('layouts.app')

@section('content')

	
	@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				Update Tags: {{$tags->name}}

			</div></h3>

		<div class="panel-body">
			
			<form action="{{ route('tags.update', ['id' => $tags->id ]) }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Tags</label>

						<input type="text" name="tag" class="form-control" value="{{ $tags->tag}}">
				</div>

				
				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Update Tag</button>

					</div>
				</div>
				
			</form>
		</div>

		</div>

@endsection