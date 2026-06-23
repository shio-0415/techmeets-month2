<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Project;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    public function __construct(
        protected TaskService $taskService
    ) {}

    public function create(Project $project)
    {
        return view('tasks.create', compact('project'));
    }

    public function store(StoreTaskRequest $request, Project $project)
    {
        $this->taskService->createTask(
            $request->validated(),
            $project->id,
            $request->input('tags')
        );

        return redirect()->route('projects.show', $project)->with('success', 'タスクを作成しました');
    }

    public function edit(Task $task)
    {
        $task = $this->taskService->findTask($task->id);
        return view('tasks.edit', compact('task'));
    }

    public function update(StoreTaskRequest $request, Task $task)
    {
        $this->taskService->updateTask(
            $task,
            $request->validated(),
            $request->input('tags')
        );

        return redirect()->route('projects.show', $task->project_id)->with('success', 'タスクを更新しました');
    }

    public function destroy(Task $task)
    {
        $projectId = $task->project_id;
        $this->taskService->deleteTask($task);

        return redirect()->route('projects.show', $projectId)->with('success', 'タスクを削除しました');
    }
}
