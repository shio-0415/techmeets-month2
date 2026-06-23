<?php

namespace App\Repositories;

use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskRepository implements TaskRepositoryInterface
{
    public function findOrFail(int $id): Task
    {
        return Task::with(['tags', 'comments'])->findOrFail($id);
    }

    public function create(array $data): Task
    {
        return Task::create($data);
    }

    public function update(Task $task, array $data): Task
    {
        $task->update($data);
        return $task;
    }

    public function delete(Task $task): void
    {
        $task->delete();
    }

    public function syncTags(Task $task, array $tagIds): void
    {
        // belongsToMany の同期（中間テーブルtask_tagの更新）
        $task->tags()->sync($tagIds);

}
}

