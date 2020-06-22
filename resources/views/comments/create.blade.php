<div class="card mt-3">
    <div class="card-header">Comment this discussion</div>
    <div class="card-body">
        <form method="post" action="{{ route('discussions.comments.store', $discussion->id) }}">
            @csrf
            <div class="form-group">
                <label for="comment">Your Comment</label>
                <textarea class="form-control" name="body"></textarea>
            </div>

            <button class="btn btn-primary">Submit Comment</button>
        </form>
    </div>
</div>