<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\ResponseFactory;

class ProjectsController extends Controller
{
    public function index(ViewFactory $view): View
    {
        $projects = Project::all();
        return $view->make('index', ['projects' => $projects]);
    }

    public function store(Request $request, ResponseFactory $response): RedirectResponse
    {
        $attributes = $request->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        $attributes['user_id'] = auth()->id();

        $project = Project::query()->create($attributes);
        
        return $response->redirectToRoute(('/projects'));


    }

    public function show(ViewFactory $view, Request $request): View
    {
       $project = Project::query()->findOrFail($request->get('project'));

       return $view->make('show', ['project' => $project]);
    }

}
