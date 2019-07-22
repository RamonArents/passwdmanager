@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 insert-edit-form">
                @include('messages')
                <form action="{{ action('PassWordController@insertPass') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="gb">Username:</label>
                        <input type="text" class="form-control" id="gb" name="gb" value="{{ old('gb') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" required>
                        <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                    </div>
                    <input type="submit" class="btn btn-primary submitbutton" value="Submit">
                </form>
                <a class="btn btn-secondary" href="{{ route('home') }}">Back</a>
        </div>
    </div>
@endsection
