@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Editar mi imagen
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('image.update')}}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="image_id" value="{{$image->id}}">
                        <div class="form-group row">
                            <label for="image_path" class="col-md-4 col-form-label text-md-right">Imagen</label>
                            <div class="col-md-6">
                                @if($image->user->image)
                                <div class="container-avatar">
                                <img class="avatar" src="{{route('image.file',['filename' => $image->image_path])}}"/>
                                </div>
                                @endif
                                <input id="image_path" type="file" name="image_path" class="form-control" />
                                @if($errors->has('image_path'))
                                <span role="alert">
                                    <strong>{{$errors->first('image_path')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Descripcion</label>
                            <div class="col-md-6">
                                <textarea id="description" name="description" class="form-control" required >{{$image->description}} </textarea>
                                @if($errors->has('description'))
                                <span role="alert">
                                    <strong>{{$errors->first('description')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" class="btn btn-primary" value="Editar imagen"/>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


