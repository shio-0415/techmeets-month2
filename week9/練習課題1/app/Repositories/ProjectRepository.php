<?php

namespace App\Repositories;

use App\Models\Project;
use App\Repositories\Contracts\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectRepository implements ProjectRepositoryInterface
{
    public function all(): Collection
    {
        // N+1対策: タスク数を事前集計
        return Project::withCount('tasks')->latest()->get();
    }

    public function findOrFail(int $id): Project
    {
        // hasManyThrough のコメントも含めて事前読み込み
        return Project::with(['tasks.tags', 'comments'])->findOrFail($id);
    }

    public function create(array $data): Project
    {
        return Project::create($data);
    }

    public function update(Project $project, array $data): Project
    {
        $project->update($data);
        return $project;
    }

    public function delete(Project $project): void
    {
        $project->delete();
    }
}
