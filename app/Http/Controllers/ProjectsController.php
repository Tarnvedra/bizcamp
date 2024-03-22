<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory as ViewFactory;
use Illuminate\Contracts\View\View;

class ProjectsController extends Controller
{
    public function index(ViewFactory $view): View
    {
        $projects = Project::all();
        return $view->make('index', ['projects' => $projects]);
    }

    public function store()
    {
        $attributes = \request()->validate([
            'title' => 'required',
            'description' => 'required',

        ]);

        $attributes['user_id'] = auth()->id();

        $project = Project::query()->create($attributes);

      //  dd($attributes, $project);
        return redirect('/projects');


    }

    public function show(ViewFactory $view): View
    {
       $project = Project::query()->findOrFail(\request('project'));

       return $view->make('show', ['project' => $project]);
    }

}
