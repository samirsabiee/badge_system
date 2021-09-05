@extends('layouts.app')

@section('content')
    <form method="post" action="{{ route('reply.store', $topic->id) }}">
        @csrf
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="col-8 card p-0 mb-3">
                <div class="card-header">
                    {{ $topic->title }}
                </div>
                <div class="card-body">
                    <article>
                        <p>{{ $topic->text }}</p>
                    </article>
                </div>
                <div class="card-footer">{{ $topic->created_at->diffForHumans() }} By {{ $topic->user->name }}</div>
            </div>
            @foreach($topic->replies as $reply)
                <div class="col-md-8 mb-3 p-0">
                    <div class="card">
                        <div class="card-body">
                            <p>{{ $reply->text }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            {{ $reply->created_at->diffForHumans() }} By {{ $reply->user_name }}
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-8 form-group p-0">
                <textarea type="text" class="form-control w-100" aria-label="reply" id="text" name="text"
                          rows="6"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
        </div>
    </form>
@endsection
