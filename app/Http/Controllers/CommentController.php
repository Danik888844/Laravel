<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\ccdCarShop;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Comment::class,'comment'); //route есть только для store, destroy
    }

    function store(CommentRequest $request, ccdCarShop $post)
    {
        $comment = new Comment($request->validated());
        $comment->ccdcarshops()->associate($post);
        $comment->user()->associate(auth()->user());
        $comment->save();

        return back();
    }

    function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
