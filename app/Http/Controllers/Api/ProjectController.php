<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Get all projects
    public function projects() {
        
        // $projects = Project::all();
        $projects = Project::with(['technologies', 'type'])->get();
        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }

    // Get all projects with pagination
    public function paginate() {
        
        $projects = Project::with(['technologies', 'type'])->paginate(6);

        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }

    // Get project by id
    public function project($id) {
        
        $project = Project::with(['technologies', 'type'])->findOrFail($id);
        
        return response()->json([
            'succes' => true,
            'results' => $project
        ]);
    }
}
