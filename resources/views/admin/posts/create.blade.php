@extends('layouts.app')


@section('content')


@include('admin.inc.errors')


		<div class="list-group-item">
			
			<h3><div class="list-group-item">  
				
				
				Create a New Post

			</div></h3>

		<div class="list-group-item">
			
			<form action="{{ route('post.store') }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="title">Title</label>

						<input type="text" name="title" class="form-control">
				</div>

				<div class="form-group">
					<label for="featured">Featured image</label>

						<input type="file" name="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="category">Select a Category</label>

					<select name="category_id" id="category"class="form-control">

						@foreach($categories as $category)

						<option value="{{$category->id}}">{{$category->name}}</option>

						@endforeach
					</select>

					<br>
					<div class="form-group">

						<label for="tags">Select Tags</label>
						@foreach($tags as $tag)

							<div class="checkbox">
							<label>
								<input type="checkbox" value="{{$tag->id}}" name="tags[]">
								{{$tag->tag}}
								
							</label>
						</div>
						@endforeach
						
					</div>

				</div>

				<div class="form-group">
					<label for="content">content</label>

						<textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
				</div>

				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Store Post </button>

					</div>
				</div>
				
			</form>
		</div>

		</div>


<script>
    $(document).ready(function() {
        $('#content').summernote();
    });
  </script>



@endsection