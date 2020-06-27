@if($discussion->comments->isNotEmpty())
    <div class="card mt-3">
        <div class="card-header">
            <b>Comments</b>
        </div>
        <div class="card-body">
            @if(session()->has('successMessage'))
                <div class="alert alert-success">
                    {{ session('successMessage') }}
                </div>
            @endif
            <ul class="list-group">
                @foreach($discussion->comments as $comment)
                    <li class="list-group-item">
                        <b>{{ $comment->user->name }}</b>: <br>
                        {!! $comment->body !!}
                        <small class="float-right">
                            <b>{{ $comment->created_at->diffForHumans() }}</b>
                        </small>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

@include('comments.create')