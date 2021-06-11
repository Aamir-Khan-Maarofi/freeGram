@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row pb-4">
        <div class="col-3 p-5">
            <img src="{{$user->userProfile->profileImage()}}" class="rounded-circle w-100">
        </div>

        <div class="col-9 pt-5">
            <div class="font-weight-bold d-flex justify-content-between align-items-baseline">
                <div class="d-flex">
                    <h1>{{$user->username}}</h1>
                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
                </div>
                @can('update', $user->userProfile)
                    <a href="/p/create">Create New Post</a>
                @endcan
            </div>
            @can('update', $user->userProfile)
                <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
            @endcan

            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong> posts</div>
                <div class="pr-5"><strong>{{ $user->userProfile->followers->count() }}</strong> followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->userProfile->title}}</div>
            <div>{{$user->userProfile->description}}</div>
            <div class="font-weight-bold"><a href="#"> {{$user->userProfile->url}} </a></div>
        </div>
    </div>

    <div class="row">

        @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}"><img src="/storage/{{$post->image}}" class="w-100"></a>
            </div>
        @endforeach
    </div>
</div>
@endsection
