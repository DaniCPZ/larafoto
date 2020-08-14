@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="user-data">
                @if($user->image)
                <div class="container-avatar">
                    <img src="{{route('user.avatar',['filename'=>$user->image])}}" class="avatar"/> 
                </div>
                @endif
                <div class="user-info">
                    <h1>{{'@'.$user->nick}}</h1>
                    <h2>{{$user->name.' '.$user->surname}}</h2>
                </div>

            </div>
            <div class="clearfix"></div>
            @foreach($user->images as $image)
            @include('includes.image',['image'=>$image])
            @endforeach
        </div>
    </div>
</div>
@endsection
