@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="card p-5">
            <div class="mb-3">
                <img src="{{Vite::asset('resources/img/project-title.png')}}" alt="Project Title">
                <h3 class="ms-5">{{$project->project_title}}</h3>
            </div>
            <div class="mb-3">
                <img src="{{Vite::asset('resources/img/slug.png')}}" alt="Project Title">
                <h3 class="ms-5">{{$project->slug}}</h3>
            </div>
            <div class="mb-3 github">
                <img src="{{Vite::asset('resources/img/github-url.png')}}" alt="Github Url">
                <p class="ms-5"><a target="_blank" href="{{ $project->github_url }}">{{$project->github_url}}</a></p>
            </div>
            <div class="mb-3">
                <img src="{{Vite::asset('resources/img/type.png')}}" alt="Github Url">
                @if($project->type)
                <p class="ms-5 type">
                    <a href="{{ route('admin.types.show', $project->type)}}">{{$project->type->name}}</a>
                </p>
                @endif
            </div>
            <div class="mb-3">
                <img src="{{Vite::asset('resources/img/technologies.png')}}" alt="Technologies">
                <div class="d-flex tech-list">
                    @foreach($project->technologies as $technology)
                    <a href="{{ route('admin.technologies.show', $technology)}}">
                        <img class="ms-5" src="{{ Vite::asset("resources/img/technologies/$technology->thumb")}}" alt="{{ $technology->name }}">
                    </a>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <img src="{{Vite::asset('resources/img/project-description.png')}}" alt="Project Title">
                <p class="ms-5">{{$project->project_description}}</p>
            </div>
            <div class="mt-5">
                <img src="{{ Vite::asset('resources/img/related.png')}}" alt="Related Projects">
            </div>
            @foreach($project->type->projects as $projectRelated)
            <p class="ms-5 related"><a href="{{ route('admin.projects.show', $projectRelated)}}">{{$projectRelated->project_title}}</a></p>
            @endforeach
        </div>
        <div class="d-flex justify-content-between mt-3">
            <div>
                <a href="{{ route('admin.projects.index')}}">
                    <button class="bg-lightbrown">Go Back to Projects</button>
                </a>
                <a href="{{ route('admin.projects.edit', $project)}}">
                    <button class="bg-brown">Edit</button>
                </a>
            </div>
            <form action="{{ route('admin.projects.destroy', $project)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="bg-red">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection