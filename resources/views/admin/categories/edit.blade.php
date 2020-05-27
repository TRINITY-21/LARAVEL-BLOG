@extends('layouts.app')

@section('content')

	
	@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				Update Category: {{$category->name}}

			</div></h3>

		<div class="list-group-item">
			
			<form action="{{ route('category.update', ['id' => $category->id ]) }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Name</label>

						<input type="text" name="name" class="form-control" value="{{ $category->name}}">
				</div>

				
				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Update Category </button>

					</div>
				</div>
				
			</form>
		</div>

		</div>

@endsection