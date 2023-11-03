<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Topic $topic, Post $post){

        $request->validate([
            'text' => ['required']
        ]);

        $data['user_id'] = $request->user()->id;
        $data['post_id'] = $post->id;
        $data['text'] = $request->text;

        $comment = Comment::create($data);
        $comment->save();

        return to_route('post.show', [
            'topic' => $topic->id,
            'post' => $post->id,
        ]);
    }

    public function delete (Topic $topic, Post $post, Comment $comment) {
        $comment->delete();
        return to_route('post.show', [
            'topic' => $topic->id,
            'post' => $post->id,
        ]);
    }
}
