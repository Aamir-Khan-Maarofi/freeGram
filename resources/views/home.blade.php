@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
            <img src="/imgs/logo.png" class="rounded-circle">
        </div>

        <div class="col-9 pt-5">
            <div class="font-weight-bold"><h1>{{$user->username}}</h1></div>
            <div class="d-flex">
                <div class="pr-5"><strong>452</strong> posts</div>
                <div class="pr-5"><strong>49k</strong> followers</div>
                <div class="pr-5"><strong>232</strong> following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->userProfile->title}}</div>
            <div>{{$user->userProfile->description}}</div>
            <div class="font-weight-bold"><a href="#"> {{$user->userProfile->url}} </a></div>
        </div>

        <div class="row pl-5">
            <div class="col-4">
                <img src="/imgs/1.jpg" class="w-100">
            </div>
            <div class="col-4">
                <img src="/imgs/2.jpg" >
            </div>
            <div class="col-4">
                <img src="/imgs/3.jpg" >
            </div>
        </div>
    </div>
</div>
@endsection
