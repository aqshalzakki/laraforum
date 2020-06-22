<div class="card mt-3">
    <div class="card-header">Comment this discussion</div>
    <div class="card-body">
        <form method="post" action="{{ route('discussions.comments.store', $discussion->id) }}">
            @csrf
            <div class="form-group">
                <label for="comment">Your Comment</label>
                <textarea class="form-control" name="body"></textarea>
            </div>

            @if(auth()->check())
                <button class="btn btn-primary">Submit Comment</button>

                @else
                <a class="btn btn-primary" href="{{ route('login') }}">Login to Comment</a>
            @endif
        </form>
    </div>
</div>