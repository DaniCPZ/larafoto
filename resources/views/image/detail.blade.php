@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.message')           
            <div class="card pub_image pub_image_detail">
                <div class="card-header">
                    @if($image->user->image)
                    <div class="container-avatar">
                        <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" class="avatar"/> 
                    </div>
                    @endif
                    <div class="data-user">
                        {{$image->user->name.' '.$image->user->surname}}
                        <span class="nick-name">{{' | @'.$image->user->nick}}</span>
                    </div>
                </div>

                <div class="card-body">
                    <div class="image-container image-detail">                        
                        <img src="{{route('image.file',['filename' => $image->image_path])}}"/>
                    </div>

                    <div class="description">
                        <span class="nick-name">{{'@'.$image->user->nick }}</span>
                        <span class="nick-name">{{' | '. \FormatTime::LongTimeFilter($image->created_at)}}</span>
                        <p>{{$image->description}}</p> 
                    </div>
                    <div class="likes"><i class="fa fa-heart" style="font-size: 20px"></i></div>
                    @if(Auth::user() && Auth::user()->id == $image->user->id)
                    <div class="actions">
                        <a href="{{route('image.edit',['id'=>$image->id])}}" class="btn btn-warning btn-sm">Actualizar</a>
                        <a href="{{route('image.delete',['id'=>$image->id])}}" class="btn btn-danger btn-sm">Borrar</a>
                    </div>
                    @endif
                    <div class="clearfix"></div>
                    
                    <div class="comments">
                        <h2>Comentarios ({{count($image->comments)}})</h2>   
                        <hr/>
                        <form action="{{route('comment.save')}}" method="POST">
                            @csrf
                            <input type="hidden" name="image_id" value="{{$image->id}}" />
                            <p>
                                <textarea class="form-control {{$errors->has('content') ? 'is-invalid' : ''}}"  name="content"></textarea>
                                @if($errors->has('description'))
                                <span role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </p>
                            <button type="submit" class="btn btn-success">
                                Enviar
                            </button>
                        </form>  
                        <hr>
                        @foreach($image->comments as $comment)
                        <div class="comment">
                            <span class="nick-name">{{'@'.$comment->user->nick }}</span>
                            <span class="nick-name">{{' | '. \FormatTime::LongTimeFilter($comment->created_at)}}</span>
                            <p>{{$comment->content}}<br>
                                @if(Auth::check() && ($comment->user_id == Auth::user()->id || $comment->image->user_id == Auth::user()->id))
                                <a class="btn btn-sm btn-danger"href="{{ route('comment.delete',['id'=>$comment->id]) }}">Eliminar</a>
                                @endif
                            </p> 
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

