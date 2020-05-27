@extends('layouts.app')

@section('content')

@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				
				Create a New User

			</div></h3>

		<div class="panel-body">
			
			<form action="{{ route('user.store') }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Name</label>

						<input type="text" name="name" class="form-control">
				</div>

				<div class="form-group" >
					<label for="name">Email</label>

						<input type="text" name="email" class="form-control">
				</div>

				
				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Submit </button>

					</div>
				</div>
				
			</form>
		</div>

		</div>

@endsection