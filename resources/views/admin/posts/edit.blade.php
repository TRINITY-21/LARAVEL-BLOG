@extends('layouts.app')


@section('content')


@include('admin.inc.errors')


		<div class="list-group-item">
			
			<h3><div class="list-group-item">
				
				
				Edit Post:{{$posts->title}}

			</div></h3>

		<div class="list-group-item">
			
			<form action="{{ route('post.update', ['id' => $posts->id ]) }}" method="Post" enctype="multipart/form-data">

				@csrf

				<div class="form-group" >
					<label for="title">Title</label>

						<input type="text" name="title" class="form-control" value="{{$posts->title}}">
				</div>

				<div class="form-group">
					<label for="featured">Featured image</label>

						<input type="file" name="featured" class="form-control">
				</div>

				<div class="form-group">
					<label for="category">Select a Category</label>

					<select name="category_id" id="category"class="form-control">

						@foreach($categories as $category)

						<option value="{{$category->id}}"

							@if ($posts->category->id == $category->id)
								
								selected

							@endif


							>{{$category->name}}</option>

						@endforeach
					</select>
				</div>


				<br>
					<div class="form-group">

						<label for="tags">Select Tags</label>
						@foreach($tags as $tag)

							<div class="checkbox">
							<label>
								<input type="checkbox" value="{{$tag->id}}" name="tags[]" value="{{$tag->id}}" 

							@foreach ($posts->tags as $t)
								@if($tag->id == $t->id)

									checked 

								@endif
							@endforeach

								>

								{{$tag->tag}}
								
							</label>
						</div>
						@endforeach
						
					</div>

				

				<div class="form-group">
					<label for="content">content</label>

						<textarea name="content" id="content" cols="5" rows="5" class="form-control">{{$posts->content}}</textarea>
				</div>

				<div class="form-group">
					<div class="text-center">
						
						<button class="btn btn-success" type="submit">Update Posts</button>

					</div>
				</div>
				
			</form>
		</div>

		</div>
		</div>

@endsection