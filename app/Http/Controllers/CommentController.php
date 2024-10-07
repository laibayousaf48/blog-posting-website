<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Blog $blog)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
        ]);
    
        // Create a new comment
        $comment = new Comment();
        $comment->name = $request->name;
        $comment->content = $request->content;
        $comment->blog_id = $blog->id; // Associate the comment with the blog post
        $comment->save();
    
        // Flash success message and stay on the same page
        return back()->with('success', 'Comment added!'); // Use 'back()' instead of redirect
    }
}
