<div class="card mt-3">
    <div class="card-header">
        Answers
    </div>
    <div class="card-body">
        <ul class="list-group">
            @forelse(optional($discussion->answers) as $answer)
                <li class="list-group-item">
                    <b>{{ $answer->user->name }}</b>, <br>
                    {{ $answer->body }}
                </li>

                @empty
                There are no answers!
            @endforelse
        </ul>
    </div>
</div>