<?php

namespace App\Services;

use App\Models\Tag;
use App\Models\Task;
use App\Repositories\Contracts\TaskRepositoryInterface;

class TaskService
{
    public function __construct(
        protected TaskRepositoryInterface $taskRepository
    ) {}

    public function findTask(int $id): Task
    {
        return $this->taskRepository->findOrFail($id);
    }

    public function createTask(array $data, int $projectId, ?string $tagsInput = null): Task
    {
        $tagIds = $this->resolveTagIds($tagsInput);
        unset($data['tags']);
        $data['project_id'] = $projectId;

        $task = $this->taskRepository->create($data);
        $this->taskRepository->syncTags($task, $tagIds);

        return $task;
    }

    public function updateTask(Task $task, array $data, ?string $tagsInput = null): Task
    {
        $tagIds = $this->resolveTagIds($tagsInput);
        unset($data['tags']);

        $task = $this->taskRepository->update($task, $data);
        $this->taskRepository->syncTags($task, $tagIds);

        return $task;
    }

    public function deleteTask(Task $task): void
    {
        $this->taskRepository->delete($task);
    }

    private function resolveTagIds(?string $tagsInput): array
    {
        if (empty($tagsInput)) {
            return [];
        }

        $names = array_filter(array_map('trim', explode(',', $tagsInput)));

        return collect($names)->map(function ($name) {
            // belongsToMany用: 名前で検索し、無ければ作成（firstOrCreate）
            return Tag::firstOrCreate(['name' => $name])->id;
        })->toArray();
    }
}
