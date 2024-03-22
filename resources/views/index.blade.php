@extends('layouts/app')

@section('content')

    <h1>BizCamp</h1>

    @foreach($projects as $project)
        <li>{{ $project->title }}</li>
        <li>{{ $project->description }}</li>
    @endforeach
@endsection
