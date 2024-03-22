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
            'user_id' => 'required',
            'title' => 'required',
            'description' => 'required',

        ]);

        Project::query()->create($attributes);

        return redirect('/projects');


    }

    public function show()
    {

    }

}
