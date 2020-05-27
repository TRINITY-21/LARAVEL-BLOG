@extends('layouts.app')

@section('content')
	<div class="text-center">
      <div class="col-lg-3">
      <div class="card">
      	<div class="card-heading text-center">
      		PUBLISHED POSTS
      	</div>

      	<div class="card-body">
      		<h1 class="text-center">{{$posts_count}}</h1>
      	</div>
      </div>
      </div>
      <div class="col-lg-3">
      <div class="card card-danger">
      	<div class="card-heading text-center">
      		TRASHED POSTS
      	</div>

      	<div class="card-body">
      		<h1 class="text-center">{{$trashed_count}}</h1>
      	</div>
      </div>
      </div>
      <div class="col-lg-3">
      <div class="card card-success">
      	<div class="card-heading text-center">
      		USERS
      	</div>

      	<div class="card-body">
      		<h1 class="text-center">{{$users_count}}</h1>
      	</div>
      </div>
      </div>
      <div class="col-lg-3">
      <div class="card card-info">
      	<div class="card-heading text-center">
      		CATEGORIES
      	</div>

      	<div class="card-body">
      		<h1 class="text-center">{{$categories_count}}</h1>
      	</div>
      </div>
      </div>
   </div>
@endsection
