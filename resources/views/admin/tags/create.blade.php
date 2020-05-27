@extends('layouts.app')

@section('content')

@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				
				Create a New Tag

			</div></h3>

		<div class="panel-body">
			
			<form action="{{ route('tags.store') }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Tag</label>

						<input type="text" name="tag" class="form-control">
				</div>

				
				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Store Tag </button>

					</div>
				</div>
				
			</form>
		</div>

		</div>

@endsection