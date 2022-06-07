@extends('layouts.app')

@section('style')
<style>
    .f-flex {
        padding-left: 50px;
        padding-top: 50px;
        font-weight: bold;
    }

    .s-flex {
        padding-left: 50px;
        padding-top: 20px;
        font-weight: bold;
    }

</style>

@endsection

@section('content')
<div>
    <div class="row justify-content-center">
        <div class="col-md-3">
            {{-- <img src="{{ asset('images/freecodecamp.jpg') }}" class="p-5 rounded-circle"> --}}
            <img src="{{ $user->profile->getImageUrl() }}" class="p-5 rounded-circle">
        </div>

        <div class="col-md-9">
            <div class="d-flex">
                <div class="f-flex">
                    <h3>{{ $user->username }}</h3>
                </div>

                @if($user->username !== auth()->user()->username)
                <div class="f-flex" id="app">
                    <follow-button username="{{ $user->username }}" follows={{ $follows }}></follow-button>
                </div>
                @endif

                @can('update', $user->profile)
                <div class="f-flex">
                    <a href="{{ route('posts.create') }}" class="btn btn-primary btn-sm">Add Post</a>
                </div>
                @endcan
            </div>

            <div class="d-flex">
                <div class="s-flex">
                    <strong>{{ $postsCount }} Posts</strong>
                </div>
                <div class="s-flex">
                    <strong>{{ $followers }} Followers</strong>
                </div>
                <div class="s-flex">
                    <strong>{{ $following }} Following</strong>
                </div>
            </div>

            @can('update', $user->profile)
            <div class="s-flex">
                <a href="{{ route('profile.edit',$user->profile->title) }}">Edit Profile</a>
            </div>
            @endcan

            <div class="s-flex">
                <h5>{{ $user->profile->title }}</h5>
                <p>
                    {{ $user->profile->description }}
                </p>
                <a href="#">{{ $user->profile->url }}</a>
            </div>

        </div>

        <div class="row p-5">
            @foreach($user->posts as $post)
            <div class="col-4 pb-1">
                <a href="{{ route('posts.show', $post->caption) }}"><img src="{{ $post->getImageUrl() }}" class="w-100"></a>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
