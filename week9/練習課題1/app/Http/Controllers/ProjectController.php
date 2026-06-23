<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProjectRequest;
use App\Models\Project;
use App\Services\ProjectService;

class ProjectController extends Controller
{
    public function __construct(
        protected ProjectService $projectService
    ) {}

    public function index()
    {
        $projects = $this->projectService->getAllProjects();
        return view('projects.index', compact('projects'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(StoreProjectRequest $request)
    {
        $this->projectService->createProject($request->validated());
        return redirect()->route('projects.index')->with('success', 'プロジェクトを作成しました');
    }

    public function show(Project $project)
    {
        $project = $this->projectService->findProject($project->id);
        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        return view('projects.edit', compact('project'));
    }

    public function update(StoreProjectRequest $request, Project $project)
    {
        $this->projectService->updateProject($project, $request->validated());
        return redirect()->route('projects.index')->with('success', 'プロジェクトを更新しました');
    }

    public function destroy(Project $project)
    {
        $this->projectService->deleteProject($project);
        return redirect()->route('projects.index')->with('success', 'プロジェクトを削除しました');
    }
}
