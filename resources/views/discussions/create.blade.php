@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create new Discussion</div>
                
                <div class="card-body">
                    <form method="post" action="{{ route('discussions.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title">Title :</label>
                            <input required value="{{ old('title') }}" name="title" class="form-control @error('title') is-invalid @enderror" type="text" id="title">
                            @if($errors->has('title'))
                                <small class="text-danger ml-1">@error('title') {{ $message }} @enderror</small>
                            @endif
                        </div>

                        <div class="form-group mb-0">
                            <label for="body">Body :</label>
                            <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="discussionBody">{{ old('body') }}</textarea>
                            <small class="text-danger ml-1">@error('body') {{ $message }} @enderror</small>
                        </div>

                        <div class="form-group mb-0">
                            <label for="category">Category :</label>
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                @endforeach
                            </select>
                            <small class="text-danger ml-1">@error('category_id') {{ $message }} @enderror</small>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Create new Discussion</button>
                        </div>
                    </form>

                    <a href="{{ route('discussions.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
