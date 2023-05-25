<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function projects() {
        
        // $projects = Project::all();
        $projects = Project::with(['technologies', 'type'])->get();
        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }

    public function paginate() {
        
        $projects = Project::with(['technologies', 'type'])->paginate(6);

        return response()->json([
            'succes' => true,
            'results' => $projects
        ]);
    }
}
