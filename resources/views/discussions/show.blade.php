@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b> {{ $discussion->title }} </b> discussed by <b>{{ $discussion->user->name }}</b>
                </div>
                
                <div class="card-body">
                    <ul class="list-group">
                        <p>{{ $discussion->body }}</p>
                        <p>Discussed at <b>{{ $discussion->created_at }}</b></p>
                    </ul>
                    <a href="{{ route('discussions.index') }}">Back</a>
                </div>
            </div>

            @include('comments.index')
        </div>
    </div>
</div>
@endsection
