@extends('layouts.app')

@section('content')

@include('admin.inc.errors')

		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				
				Edit Profile

			</div></h3>

		<div class="panel-body">
			
			<form action="{{ route('user.profile.update') }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="name">Username</label>

						<input type="text" name="name" class="form-control" value="{{ $user->name}}">
				</div>

				<div class="form-group" >
					<label for="name">Email</label>

						<input type="email" name="email" class="form-control" value="{{ $user->email}}">
				</div>
				
				<div class="form-group" >
					<label for="name">New Password</label>

						<input type="password" name="password" class="form-control"  value="{{ $user->password}}">
				</div>

				<div class="form-group" >
					<label for="name">Upload New Avatar</label>

						<input type="file" name="avatar" class="form-control">
				</div>

				<div class="form-group" >
					<label for="name">Facebook Profile</label>

						<input type="text" name="facebook" class="form-control"  value="{{ $user->profile->facebook}}">
				</div>

				<div class="form-group" >
					<label for="name">Youtube Profile</label>

						<input type="text" name="youtube" class="form-control" value="{{ $user->profile->youtube}}">
				</div>

				<div class="form-group" >
					<label for="name">Your Info</label>

						<textarea name="about" cols="6" rows="6" id="about" class="form-control">{{$user->profile->about}}</textarea>
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