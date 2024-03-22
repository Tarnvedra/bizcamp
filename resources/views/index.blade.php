@extends('layouts/app')

@section('content')

    <h1>BizCamp</h1>

    @forelse($projects as $project)
        <li><a href="{{ $project->path() }}">{{ $project->title }}</a></li>
        <li>{{ $project->description }}</li>
    @empty
        <li>No Projects Found....</li>
    @endforelse
@endsection
