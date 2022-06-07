@extends('layouts.app')


@section('content')
<div class="row">
    @foreach ($posts as $post)
    <div class="col-md-8 offset-md-4">
        <img src="{{ $post->getImageUrl() }}">
        <div>
            <strong>{{ $post->user->username }} | {{ $post->created_at }}</strong>
        </div>
        <p>{{ $post->caption }}</p>
    </div>
    @endforeach
</div>

<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

@endsection
