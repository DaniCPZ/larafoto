@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Gente</h1>
            <form id="buscador" method="GET" action="{{route('user.index')}}">
                <div class="row">
                  <div class="form-group col">
                    <input type="text" id="search"  class="form-control" >
                  </div>
                
                <div class="form-group col btn-search">
                    <input type="submit" value="Buscar" class="btn btn-success btn"/>
                </div>
                    </div>
            </form>
            @foreach($users as $user)
            <div class="user-data">
                @if($user->image)
                <div class="container-avatar">
                    <img src="{{route('user.avatar',['filename'=>$user->image])}}" class="avatar"/> 
                </div>
                @endif
                <div class="user-info">
                    <h2>{{'@'.$user->nick}}</h2>
                    <h3>{{$user->name.' '.$user->surname}}</h3>
                    <a href="{{route('user.profile',['id'=>$user->id])}}" class="btn btn-success">Ver perfil</a>
                </div>            
            </div>
            <hr>
            
            @endforeach
            <!--PAGINACION-->
            <div class="clear-fix"></div>
            {{$users->links()}}
        </div>
    </div>
</div>
@endsection


