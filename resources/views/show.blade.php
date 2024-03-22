@extends('layouts/app')

@section('content')

    <h1>BizCamp</h1>


        <h2>{{ $project->title }}</h2>
        <p>{{ $project->description }}</p>

@endsection
