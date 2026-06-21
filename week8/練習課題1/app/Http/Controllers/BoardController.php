<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->latest()->paginate(15);
        return view('board.index', compact('messages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        Message::create([
            'user_id' => auth()->id(),
            'body' => $validated['body'],
        ]);

        return redirect()->route('board.index')->with('success', '投稿しました');
    }
}
