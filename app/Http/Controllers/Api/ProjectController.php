<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        $projects = Project::with('type', 'technologies')->get();

        return response()->json([
            'success' => true,
            'results' => $projects
        ]);
    }

    public function show(Project $project) {

        $project->load('technologies', 'type') ;

        return response()->json([
            'project' => $project
        ]);
    }
}
