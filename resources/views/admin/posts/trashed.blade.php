@extends('layouts.app')

@section('content')
	
	<div class="list-group-item">

			<h3><div class="panel-heading">
			Trashed Posts
		</div></h3>
		
		<div class="list-group-item">
			
			<table class="table table-hover">

					<thead>
						<th>
							Image
						</th>

						<th>
							
							Title

						</th>
					
						<th>
							
							Restore
			 
						</th>	

						<th>
							
							Destroy
			 
						</th>

					</thead>
					
					<tbody>
						@if(count($posts) > 0) 

							@foreach($posts as $post)

							<tr>
								<td>
									<img src="{{$post->featured}}" alt="{{$post->title}}" width="90px" height="50px">
									
								</td>

								<td>
									{{$post->title }}
								</td>

		

								<td>
									
									 <a href="{{ route('posts.restore', ['id' =>$post->id]) }}" class="btn btn-xs btn-success">

										Restore

								</td>	

								<td>
									
									 <a href="{{ route('posts.kill', ['id' =>$post->id]) }}" class="btn btn-xs btn-danger">

										Delete

								</td>

							</tr>
						@endforeach

						@else

							<tr>
								<th colspan="5" class="text-center">No Trashed Posts</th>

							</tr>

						@endif
					</tbody>

				</table>

					</div>

</div>

@endsection