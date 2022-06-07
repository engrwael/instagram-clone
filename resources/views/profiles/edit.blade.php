@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row p-5">
        <div class="col-8 offset-2">
            <form action="{{ route('profile.update', $profile->title) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-12">
                        <h1>Edit Profile</h1>
                    </div>
                </div>

                <div class="form-group pb-2">
                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $profile->title }}" placeholder="Enter title here..." autocomplete="title" autofocus>
                    @error('title')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group pb-2">
                    <input id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $profile->description }}" placeholder="Enter description here..." autocomplete="description" autofocus>
                    @error('description')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group pb-2">
                    <input id="url" type="text" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $profile->url }}" placeholder="Enter url here..." autocomplete="url" autofocus>
                    @error('url')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group pb-1">
                    <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                    @error('image')
                    <span class="invalid-feedback">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
