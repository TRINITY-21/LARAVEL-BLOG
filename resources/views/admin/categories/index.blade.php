@extends('layouts.app')

@section('content')
	
	<div class="list-group-item">

		<h3><div class="panel-heading">
			Categories
		</div></h3>
		
		<div class="list-group-item">

			
			<table class="table table-hover">

					<thead>
						<th>
							Category name
						</th>

						<th>
							
							Editing

						</th>
						<th>
							
							Deleting
			 
						</th>

					</thead>
					
					<tbody>
						@if(count($categories) > 0)
							@foreach($categories as $category)

							<tr>
								<td>
									{{$category->name }}
								</td>

								<td>
									
									<a href="{{ route('category.edit', ['id' =>$category->id]) }}" class="btn btn-xs btn-info">

										Edit

								</td>

								<td>
									
									<a href="{{ route('category.delete', ['id' =>$category->id]) }}" class="btn btn-xs btn-danger">

										Delete

								</td>

							</tr>
						@endforeach

								@else

							<tr>
								<th colspan="5" class="text-center">No Categories Yet</th>

							</tr>

						@endif

					</tbody>

				</table>

					</div>

</div>

@endsection