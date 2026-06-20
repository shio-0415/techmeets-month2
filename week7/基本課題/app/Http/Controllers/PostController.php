<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    // 投稿一覧（ページネーション付き）
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }

    // 投稿作成フォーム
    public function create()
    {
        return view('posts.create');
    }

    // 投稿を保存
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
        ]);

        Post::create($validated);

        return redirect()->route('posts.index')->with('success', '投稿を作成しました');
    }

    // 投稿詳細
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    // 投稿編集フォーム
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    // 投稿を更新
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
        ]);

        $post->update($validated);

        return redirect()->route('posts.index')->with('success', '投稿を更新しました');
    }

    // 投稿を削除
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index')->with('success', '投稿を削除しました');
    }
}