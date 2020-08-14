<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function save(Request $request) {
        $validate = $this->validate($request, [
            'image_id' => 'integer|required',
            'content' => 'string|required',
        ]);
        $user = \Auth::user();
        $image = $request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image;
        $comment->content = $content;

        $comment->save();
        return redirect()->route('image.detail', ['id' => $image])
                        ->with([
                            'message' => 'Has publicado tu comentario correctamente'
                        ]);
    }
    public function delete($id){
        // Conseguir datos del usuario identificado
        $user = \Auth::user();
        
        // Conseguir objeto del comentario
        $comment = Comment::find($id);
        // Comprobar si soy el dueño del comentario o la foto
        if($user && ($comment->user_id == $user->id || $comment->image->user_id == $user->id)){
            $comment->delete();
            return redirect()->route('image.detail', ['id' => $comment->image->id ])
                        ->with([
                            'message' => 'Comentario eliminado'
                        ]);            
        }else{
            return redirect()->route('image.detail', ['id' => $comment->image->id ])
                        ->with([
                            'message' => 'El comentario no se ha eliminado'
                        ]);  
        }
        
    }
}
