<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $validated = $request->validate([
            'body' => 'required|string|max:1000',
        ]);

        $task->comments()->create($validated);

        return redirect()->route('projects.show', $task->project_id)->with('success', 'コメントを追加しました');
    }
}
