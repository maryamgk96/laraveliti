

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Post Info</div>

                <div class="card-body">

                        <h3>Title: {{ $post->title }}</h3>
                        <h3>Created at: {{ $post->date_mod }}</h3>
                        <h3>Description: {{ $post->body }}</h3>
                   
                </div>
            </div>


            <div class="card">
                    <div class="card-header">Author Info</div>
    
                    <div class="card-body">
    
                            <h3>author: {{ $post->user->name }}</h3>
                            <h3>email: {{ $post->user->email }}</h3>
                       
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
