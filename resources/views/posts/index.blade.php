@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($posts as $post)
    <div class="row">
        <div class="col-4 offset-4">
            <div>
                <div class="d-flex align-items-center">
                    <div class="pr-3">
                        <img src="{{$post->user->userProfile->profileImage()}}" class="rounded-circle w-100" style="max-width: 40px">
                    </div>
                    <div>
                        <div class="font-weight-bold">
                            <a href="/profile/{{$post->user->id}}">
                                <span class="text-dark">
                                    {{ $post->user->username }}
                                </span>
                            </a>
                        </div>
                    </div>
                    <follow-link></follow-link>
                </div>

                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}"> <span class="text-dark">{{ $post->user->username }}</span> </a>
                    </span>
                    {{$post->caption}}
                </p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-4 offset-4">
            <img src="/storage/{{ $post->image }}" class="w-100">
        </div>
    </div>

    <div class=" col-4 offset-4 pb-4">
        <hr>
    </div>
    @endforeach
</div>
@endsection
