@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $discussion->title }}</div>
                
                <div class="card-body">
                    <ul class="list-group">
                        {{ $discussion->body }}
                        <br><br>
                        {{-- {{ $discussion->created_at }} --}}
                    </ul>
                    <a href="">Up Discussion</a>
                    <br><br>
                    <a href="{{ route('discussions.index') }}">Back</a>
                </div>
            </div>

            @include('answers.index')
        </div>
    </div>
</div>
@endsection
