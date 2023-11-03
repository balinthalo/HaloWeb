<?php

namespace App\Http\Controllers;

use App\Models\Topic;
use Illuminate\Http\Request;

class TopicController extends Controller
{
    public function index () {
        $topics = Topic::where('parent_id', NULL)->paginate(10);
        return view('topics.index')->with(['topics' => $topics]);
    }

    public function create () {
        return view('topics.create');
    }

    public function store (Request $request) {
        $request->validate([
            'title' => ['required']
        ]);

        $data['title'] = $request->title;
        $data['user_id'] = $request->user()->id;
        $data['parent_id'] = $request->parent_id ?? null;
        $topic = Topic::create($data);
        $topic->save();

        if ($request->parent_id) {
            return to_route('post.index', ['topic' => $request->parent_id]);
        }

        return to_route('topic.index');
    }

    public function delete (Topic $topic) {
        $topic->delete();

        if ($topic->parent_id) {
            return to_route('post.index', ['topic' => $topic->parent_id]);
        }
        return to_route('topic.index');
    }

    public function edit (Topic $topic) {
        return view('topics.edit')->with(['topic' => $topic->title, 'id' => $topic->id]);
    }

    public function update (Request $request, Topic $topic) {
        $request->validate([
            'title' => ['required']
        ]);

        $topic->title = $request->title;
        $topic->save();

        if ($topic->parent_id) {
            return to_route('post.index', ['topic' => $topic->parent_id]);
        }
        return to_route('topic.index');
    }
}
