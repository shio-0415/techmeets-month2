<?php

namespace App\Services;

use App\Models\Project;
use App\Repositories\Contracts\ProjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ProjectService
{
    public function __construct(
        protected ProjectRepositoryInterface $projectRepository
    ) {}

    public function getAllProjects(): Collection
    {
        return $this->projectRepository->all();
    }

    public function findProject(int $id): Project
    {
        return $this->projectRepository->findOrFail($id);
    }

    public function createProject(array $data): Project
    {
        return $this->projectRepository->create($data);
    }

    public function updateProject(Project $project, array $data): Project
    {
        return $this->projectRepository->update($project, $data);
    }

    public function deleteProject(Project $project): void
    {
        $this->projectRepository->delete($project);
    }
}
