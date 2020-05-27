@extends('layouts.app')

@section('content')
	
	<div class="list-group-item">

		<h3><div class="panel-heading">
			Tags
		</div></h3>
		
		<div class="list-group-item">

			
			<table class="table table-hover">

					<thead>
						<th>
							Tag name
						</th>

						<th>
							
							Editing

						</th>
						<th>
							
							Deleting
			 
						</th>

					</thead>
					
					<tbody>
						@if(count($tags) > 0)
							@foreach($tags as $tag)

							<tr>
								<td>
									{{$tag->tag}}
								</td>

								<td>
									
									<a href="{{ route('tags.edit', ['id' =>$tag->id]) }}" class="btn btn-xs btn-info">

										Edit

								</td>

								<td>
									
									<a href="{{ route('tags.delete', ['id' =>$tag->id]) }}" class="btn btn-xs btn-danger">

										Delete

								</td>

							</tr>
						@endforeach

								@else

							<tr>
								<th colspan="5" class="text-center">No Tags Yet</th>

							</tr>

						@endif

					</tbody>

				</table>

					</div>

</div>

@endsection