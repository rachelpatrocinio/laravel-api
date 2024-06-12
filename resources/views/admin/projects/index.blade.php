@extends('layouts.app')

@section('content')
<section class="projects my-5">
  <div class="container">
      <div class="row">
        <div class="logo-title d-flex justify-content-between align-items-center p-0">
          <img src="{{ Vite::asset('resources/img/my-projects.png')}}" alt="">
          <a href="{{ route('admin.projects.create')}}">
            <button class="bg-brown">Add New Project</button>
          </a>
        </div>
        <div class="projects-cards p-0">
          @foreach($projects as $project)
          <div class="card my-4 p-4 flex-row justify-content-between">
            <div>
              <h4 class="card-title"><a href="{{ route('admin.projects.show', $project)}}">{{$project->project_title}}</a></h4>
              <h6>{{$project->slug}}</h6>
              <p class="github"><a target="_blank" href="{{ $project->github_url }}">{{$project->github_url}}</a></p>
            </div>
            <div>
              <form class="mb-5 text-end" action="{{ route('admin.projects.destroy', $project)}}" method="POST">
                @method('DELETE')
                @csrf
                <button class="btn">
                  <img src="{{ Vite::asset('resources/img/icons/bin.png')}}" alt="Delete">
                </button>
              </form>
              <a href="{{ route('admin.projects.show', $project)}}">
                <button class="bg-lightbrown">More Details</button>
              </a>
            </div>
          </div>
          @endforeach
        </div>
      </div>
  </div>
</section>
@endsection