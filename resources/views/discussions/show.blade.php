@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <b> 
                        {{ $discussion->title }} </b> 
                        discussed by <b>{{ $discussion->user->name }}</b>
                    </b>
                    @if($discussion->user->id === auth()->id())
                        <form action="{{ route('discussions.destroy', $discussion->id) }}" method="POST" class="form-inline float-right">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete Discussion</button>
                        </form>
                    @endif
                </div>
                
                <div class="card-body">
                    <ul class="list-group">
                        <p>{!! $discussion->body !!}</p>
                        <p><b>{{ $discussion->created_at->diffForHumans() }}</b></p>
                    </ul>
                    <a href="{{ route('discussions.index') }}">Back</a>
                </div>
            </div>

            @include('comments.index')
        </div>
    </div>
</div>
@endsection
