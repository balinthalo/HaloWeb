<?php
function getBreadCrumbs() {
    $breadcrumbs = [
        ['label' => "Home", 'url' => route('topic.index')]
    ];

    if ($topic = request()->route('topic')) {
        if($topic !== null){
            if($topic->parent_id === null){
                $breadcrumbs[] = [
                    'label' => $topic->title,
                    'url' => route('post.index', [
                        'topic' => $topic->id,
                    ]),
                ];
            }
            else{
                $breadcrumbs[] = [
                    'label' => $topic->title,
                    'parent' => $topic->parent_id,
                    'url' => route('post.index', [
                        'topic' => $topic->id,
                    ]),
                ];
            }
        }
    }

    if ($post = request()->route('post')) {
        $topic = request()->route('topic');
        if ($topic !== null && $post !== null) {
            $breadcrumbs[] = [
                'label' => $post->title,
                'url' => route('post.show', [
                    'post' => $post->id,
                    'topic' => $topic->id
                ]),
            ];
        }
    }

    return $breadcrumbs;
}
