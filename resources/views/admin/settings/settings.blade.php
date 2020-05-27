 @extends('layouts.app')

@section('content')

@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				Edit blog Settings
				

			</div></h3>

		<div class="panel-body">
			
			<form action="{{ route('settings.update') }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Site Name</label>

						<input type="text" name="site_name" class="form-control" value="{{$settings->site_name}}">
				</div>

				<div class="form-group" >
					<label for="name">Address</label>

						<input type="text" name="address" class="form-control" value="{{$settings->address}}">
				</div>

				<div class="form-group" >
					<label for="name">Contact Number</label>

						<input type="text" name="contact_number" class="form-control" value="{{$settings->contact_number}}">
				</div>

				<div class="form-group" >
					<label for="name">Contact Email</label>

						<input type="text" name="contact_email" class="form-control" value="{{$settings->contact_email}}">
				</div>

				
				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Upddate Site Settings </button>

					</div>
				</div>
				
			</form>
		</div>

		</div>

@endsection