<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index (Topic $topic) {
        $sub_topics = Topic::where('parent_id', $topic->id)->get();
        $posts = Post::where("topic_id", $topic->id)->get();

        return view('posts.index')->with([
            'topic' => $topic,
            'sub_topics' => $sub_topics,
            'posts' => $posts
        ]);
    }

    public function create (Topic $topic) {
        return view('posts.create')->with(["topic" => $topic]);
    }

    public function show (Topic $topic, Post $post) {
        $comments = Comment::where("post_id", $post->id)->get();
        return view('posts.show')->with([
            'topic' => $topic,
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function store (Request $request, Topic $topic){

        $request->validate([
            'title' => ['required'],
            'text' => ['required']
        ]);

        $data['title'] = $request->title;
        $data['text'] = $request->text;
        $data['topic_id'] = $topic->id;
        $data['user_id'] = $request->user()->id;

        $post = Post::create($data);
        $post->save();

        return to_route('post.index', $topic->id);
    }

    public function delete (Topic $topic, Post $post) {
        $post->delete();
        return to_route('post.index', $topic->id);
    }

    public function edit (Topic $topic, Post $post) {
        $post_title = $post->title;
        $post_text = $post->text;
        return view('posts.edit')->with([
            'title' => $post_title,
            'text' => $post_text,
            'post' => $post,
            'topic' => $topic
        ]);
    }

    public function update (Request $request, Topic $topic, Post $post) {
        $request->validate([
            'title' => ['required'],
            'text' => ['required']
        ]);
        $post->update($request->all());

        return to_route('post.index', $topic->id);
    }
}
