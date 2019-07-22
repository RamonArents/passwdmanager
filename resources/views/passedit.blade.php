@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 insert-edit-form">
                @include('messages')
                @if(\Illuminate\Support\Facades\Auth::user()->id == $password->user_id)
                <form action="{{ action('PassWordController@editPass', ['id' => $password->id]) }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $password->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gb">Username:</label>
                        <input type="text" class="form-control" id="gb" name="gb" value="{{ $password->gb }}" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password{{ $password->id }}" name="password" value="{{ $password->passwd }}" required>
                        <span toggle="#password{{ $password->id }}" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <input type="submit" class="btn btn-primary submitbutton" value="Submit">
                </form>
                <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
                @else
                    <p>You're not allowed to edit this post</p>
                @endif
            </div>
        </div>
@endsection
