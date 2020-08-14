<div class="card pub_image">
    <div class="card-header">
        @if($image->user->image)
        <div class="container-avatar">
            <img src="{{route('user.avatar',['filename'=>$image->user->image])}}" class="avatar"/> 
        </div>
        @endif
        <div class="data-user">
            <a href="{{route('user.profile',['id'=>$image->user->id])}}">
                {{$image->user->name.' '.$image->user->surname}}                        
                <span class="nick-name">{{' | @'.$image->user->nick}}</span>
            </a>
        </div>
    </div>

    <div class="card-body">
        <div class="image-container">                        
            <img src="{{route('image.file',['filename' => $image->image_path])}}"/>
        </div>

        <div class="description">
            <span class="nick-name">{{'@'.$image->user->nick }}</span>
            <span class="nick-name">{{' | '. \FormatTime::LongTimeFilter($image->created_at)}}</span>
            <p>{{$image->description}}</p> 
        </div>

        <?php $user_like = false; ?>
        @foreach($image->likes as $like)

        @if($like->user->id == Auth::user()->id)
        <?php $user_like = true; ?>
        @endif         
        @endforeach
        <div>
            @if($user_like)
            <i class="fa fa-heart btn-like heart-red" data-id="{{$image->id}}" style="float:left;font-size: 20px"></i>
            @else
            <i class="fa fa-heart btn-dislike heart-black" data-id="{{$image->id}}" style="float:left;font-size: 20px"></i>
            @endif
            <span class="count-like" style="float:left;">{{count($image->likes)}}</span>
            <div class="comments">
                <a href="{{route('image.detail',['id'=>$image->id])}}" class="btn btn-warning btn-comment btn-sm">
                    Comentarios ({{count($image->comments)}})
                </a>
            </div>
        </div>
    </div>
</div>
