<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use Illuminate\Database\Eloquent\Relations\HasMany;


class CommentController extends Controller
{
    /**
     * Retrieves the list of comments.
     *
     * @param  
     * @return \App\Http\Resources\CommentResource
     */
    public function index()
    {
        $comments = $this->getComments();
        return CommentResource::collection($comments);
    }

    /**
     * Stores the comment.
     *
     * @param  \App\Http\Requests\CommentRequest  $request  The request object containing the comment data.
     * @return \App\Http\Resources\CommentResource
     */
    public function store(CommentRequest $request)
    {
        if ($request->has('parent_id')) {
            $parentComment = Comment::findOrFail($request->parent_id);
            if ($parentComment->parent_id !== null && $parentComment->parent->parent_id !== null) {
                return response()->json(['message' => 'Nested comments are up to 3 layers only'], 404);
            }
        }

        $comment = Comment::create($request->all());
        $comments = $this->getComments();
        return CommentResource::collection($comments);
    }

    /**
     * Gets the list of comments with nested replies.
     *
     * @param  
     * @return \Illuminate\Database\Eloquent\Collection  A collection of comments.
     */
    private function getComments()
    {
        $context = &$this;
        $comments = Comment::whereNull('parent_id')->orderBy('created_at', 'desc')
        ->with(['replies' => function (HasMany $query) use ($context) {
            $context->loadNestedReplies($query); // Call to the recursive function to load nested relationships
        }])
        ->get();
        return $comments;
    }

    /**
     * Gets the nested list of comments.
     *
     * @param  
     * @return 
     */
    private function loadNestedReplies($query)
    {
        $context = &$this;
        $query->orderBy('created_at', 'desc');
        $query->with(['replies' => function (HasMany $query) use ($context) {
            $context->loadNestedReplies($query); // Call to the recursive function to load nested relationships
        }]);
    }
}
