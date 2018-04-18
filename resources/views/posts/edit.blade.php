
@extends('layouts.app')

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
        <div class="form">
    <h1>Edit post</h1>
    
<form action="/posts/edit/{{$post->id}}" method="POST">
    @csrf
   title: <input type="text" name="title" value="{{$post->title}}">
       body: <input type="text" name="body" value="{{$post->body}}">
       
       <select class="form-control" name="user">
        @foreach ($users as $user)
            <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        
        </select>
        <input class="btn btn-primary" type="submit" value="submit">

    </form>
    </div>
    @endsection