@extends('layouts.app')

@section('content')

@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				
				Create a New Category

			</div></h3>

		<div class="list-group-item">
			
			<form action="{{ route('category.store') }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Name</label>

						<input type="text" name="name" class="form-control">
				</div>

				
				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Store Category </button>

					</div>
				</div>
				
			</form>
		</div>

		</div>

@endsection