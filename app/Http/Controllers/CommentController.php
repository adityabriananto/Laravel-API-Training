<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function index()
    {
        $comments=Comment::all();
        return response()->json($comments, 200);
    }

    public function store()
    {
        $comment=new Comment();
        $comment->author=Input::get('author');
        $comment->text=Input::get('text');
        $success=$comment->save();
     
        if (!$success) {
                 return response()->json("error saving", 500);
        }
     
        return response()->json("success", 201);
    }

    public function show($id)
    {
        $comment=Comment::find($id);
        if (is_null($comment)) {
             return response()->json("not found", 404);
        }
     
        return response()->json($comment, 200);
    }

    public function update($id)
    {
        $comment=Comment::find($id);
 
        if (!is_null(Input::get('author'))) {
            $comment->author=Input::get('author');
        }
     
        if (!is_null(Input::get('text'))) {
            $comment->text=Input::get('text');
        }
     
        $success=$comment->save();
     
        if (!$success) {
            return response()->json("error updating", 500);
        }
     
        return response()->json("success", 201);
    }

    public function destroy($id)
    {
        $comment=Comment::find($id);
        if (is_null($comment)) {
            return response()->json("not found", 404);
        }
     
        $success=$comment->delete();
     
        if (!$success) {
            return response()->json("error deleting", 500);
        }
     
        return response()->json("success", 200);
    }
}
