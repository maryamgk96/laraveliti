
    
@extends('layouts.app')

@section('content')
    <div class="form">
    <h1>Create a post</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    
    <form action="/posts" method="POST">
    @csrf
   title: <input type="text" name="title">
       body: <input type="text" name="body">
       <select class="form-control" name="user_id">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
            
            </select>
        <input type="submit" value="submit">

    </form>
    </div>
    @endsection