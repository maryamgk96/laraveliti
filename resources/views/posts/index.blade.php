
@extends('layouts.app')
@section('content')
	<div class="row">
		<div class="col-md-10">
           
            
		</div>

		<div class="col-md-2">
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div> <!-- end of .row -->

	<div class="row">
		<div class="col-md-12">
				@if (! empty($error))
				<div class="alert alert-danger">
					<ul>
						@foreach ($error->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>slug</th>
					
					<th>Author</th>
					<th>Body</th>
					<th>Created At</th>
					<th colspan="3">Actions</th>
				</thead>

				<tbody>
					
					@foreach ($posts as $post)
						
						<tr>
							<th>{{ $post->id }}</th>
							<td>{{ $post->title }}</td>
							<td>{{ $post->slug }}</td>
							<td>{{ $post->user->name }}</td>
							<td>{{ substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
                            <td>{{ $post->created_at->toDateString()  }}</td>
							<td> <a class="btn btn-success" href="/posts/edit/{{$post->id}}"> Edit</a></td>
							
							<td><form action="/posts/delete/{{$post->id}}"  method="post">
								 @csrf  
								 {{method_field('DELETE')}}
								  <button class="btn btn-danger" onclick="return confirm('are you sure?')" type="submit">delete</button>
								</form></td>
							<td><a class="btn btn-info" href="/posts/{{$post->id}}">View</td>
								<td><a class="ll btn btn-info"href="#myModal" data-toggle="modal" id="{{$post->id}}" data-target="#view-modal">View Ajax</a></td>
                            
						</tr>

					@endforeach

				</tbody>
			</table>

		
				<h2 align="left"><a href="/posts/create" class="btn btn-primary"> ADD POST</a></h2>
				<h2 align="left"><a href="/posts/restore" class="btn btn-primary"> RESTORE LAST DELETED POST</a></h2>

				
				<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								<h4 class="modal-title" id="myModalLabel">post info</h4>
							</div>
							<div class="modal-body view-content">
								<h3 clas="ti"></h3>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								
							</div>
						</div>
					</div>
				</div>
			
				<div class="pagination" align="center">
						{!! $posts->links(); !!}
						 
					</div>
			</div>
			
	</div>
	
	@endsection

	
	