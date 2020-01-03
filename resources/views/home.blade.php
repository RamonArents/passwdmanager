@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{--<a class="btn btn-dark" href="{{ route('viewinsert') }}">New password</a>--}}
            {{--<br>--}}
            {{--<br>--}}
            @include('messages')
            <br>
            <div id="scrollfix">
                    <input id="search" class="form-control" type="text" name="queryString" placeholder="Search">
                    <span class="fa fa-fw fa-search field-icon"></span>
                    <ul class="list-group searchitems"></ul>
            </div>
            <br>
            @foreach($passwords as $password)
                @component('components.modal-delete', ['id' => $password->id]) @endcomponent
                    <div id="{{ $password->id }}" class="card">
                        <div class="card-header">
                            <h2>{{ $password->name }}</h2>
                            <div class="float-right crud-buttons">
                                <a href="{{ route('viewedit',  ['id' => $password->id]) }}"><span class="fas fa-pen"></span></a>
                                <span class="fa fa-fw fa-trash cursor-pointer" data-toggle="modal" data-target="#myModal{{ $password->id }}"></span>
                            </div>
                        </div>

                        <div class="card-body">
                            <label>Gb:</label>
                            <input type="text" class="form-control" value="{{ $password->gb }}" readonly>
                            <br>
                            <label>Ww:</label>
                            <input id="pwd{{ $password->id }}" type="password" class="form-control" value="{{ $password->passwd }}" readonly>
                            <span toggle="#pwd{{ $password->id }}" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
            @endforeach
            </div>
    </div>
    <button id="topBtn"><span class="fa fa-arrow-up"></span></button>
</div>
@endsection
