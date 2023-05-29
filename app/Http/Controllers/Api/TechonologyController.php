<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechonologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::all();

        return response()->json([
            'succes' => true,
            'results' => $technologies
        ]);
    }

    public function show(String $slug)
    {
        $technology = Technology::where('slug', $slug)->with('projects')->first();

        return response()->json([
            'succes' => true,
            'results' => $technology
        ]);
    }
}
