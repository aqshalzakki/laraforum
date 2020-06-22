@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">All Discussions</div>
                
                <a class="ml-3 mt-3" href="{{ route('discussions.create') }}">
                    <button class="btn btn-primary">Create new Discussion</button>
                </a>

                <div class="card-body">
                    <ul class="list-group">
                        @forelse($discussions as $discussion)
                            <li class="list-group-item">
                                <a href="{{ route('discussions.show', "$discussion->id-$discussion->slug") }}">
                                    {{ $discussion->title }}
                                </a>
                            </li>

                            @empty
                            <h4>Oops there are no discussion :(</h4>

                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
