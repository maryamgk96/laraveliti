
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
                            
						</tr>

					@endforeach

				</tbody>
			</table>

		
				<h2 align="left"><a href="/posts/create" class="btn btn-primary"> ADD POST</a></h2>
				<div class="pagination" align="center">
						{!! $posts->links(); !!}
						 
					</div>
			</div>
		
	</div>

	@endsection

	
	