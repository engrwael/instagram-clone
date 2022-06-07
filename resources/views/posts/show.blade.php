@extends('layouts.app')

@section('style')
<style>
    .p-100 {
        padding: 100px 150px 150px 150px;
    }

</style>
@endsection

@section('content')

<div class="p-100">
    <div class="container">
        <div class="row">
            <div class="col-8">
                <img src="{{ $post->getImageUrl() }}" class="w-100">
            </div>

            <div class="col-4">
                <div class="align-items-center">
                    <img src="{{ $post->user->profile->getImageUrl() }}" class="rounded-circle w-100" style="max-width: 45px">
                    <span style="padding-left: 15px"><a href="{{ route('profile.home', $post->user->username) }}" class="text-dark" style="text-decoration: none; font-weight:bold">{{ $post->user->username }} .</a></span>
                    <span><a href="#" class="text-dark font-bold" style="text-decoration: none; font-weight:bold">Follow</a></span>
                </div>

                <hr>

                <div class="align-items-center">
                    <p class="pt-2" style="font-weight: bold">
                        {{ $post->caption }}
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
