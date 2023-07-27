<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;


class CommentController extends Controller
{
    /**
     * Get the list of comments.
     *
     * @param  
     * @return \App\Http\Resources\CommentResource
     */
    public function index()
    {
        $comments = Comment::whereNull('parent_id')->latest('created_at')->get();
        $comments->load('replies.replies.replies'); // Load nested replies recursively
        return CommentResource::collection($comments);
    }

    /**
     * Stores the comment.
     *
     * @param  \App\Http\Requests\CommentRequest  $request  The request object containing the comment data.
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request)
    {
        if ($request->has('parent_id')) {
            $parentComment = Comment::findOrFail($request->parent_id);
            if ($parentComment->parent_id !== null && $parentComment->parent->parent_id !== null) {
                return response()->json('Nested comments are up to 3 layers only', 404);
            }
        }

        $comment = Comment::create($request->all());
        return response()->json($comment, 201);
    }
}
