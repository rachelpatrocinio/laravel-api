@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="my-5">
            <form action="{{route('admin.projects.store')}}" method="POST">
                @csrf
                <div class="mb-5">
                    <label for="project_title" class="form-label">
                        <img src="{{Vite::asset('resources/img/project-title.png')}}" alt="Project Title">
                    </label>
                    <input type="text" class="form-control" id="project_title" name="project_title" placeholder="Project Title" value="{{old('project_title')}}">
                </div>
                <div class="mb-5">
                    <label for="type_id">
                        <img src="{{ Vite::asset('resources/img/type.png')}}" alt="Type">
                    </label>
                    <div>
                        <select id="type_id" name="type_id" class="form-select">
                            <option value=""> ~ Select Type ~ </option>
                            @foreach($types as $type)
                            <option @selected($type->id == old('type_id')) value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                          </select>
                    </div>
                </div>
                <div class="mb-5 d-flex justify-content-between align-items-center">
                    <div>
                        <img src="{{ Vite::asset('resources/img/technologies.png')}}" alt="Technologies">
                    </div>
                    @foreach($technologies as $technology)
                    <div class="form-check">
                        <input type="checkbox" name="technologies[]" class="form-check-input" value="{{$technology->id}}" id="{{$technology->id}}">
                        <label for="{{$technology->id}}">{{ $technology->name }}</label>
                    </div>
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="project_description" class="form-label">
                        <img src="{{Vite::asset('resources/img/project-description.png')}}" alt="Project Description">
                    </label>
                    <div class="form-floating">
                        <textarea name="project_description" id="project_description" cols="30" rows="10" class="w-100 h-25 form-control">{{old('project_description')}}</textarea>
                    </div>
                </div>
                <div class="mb-5">
                    <label for="github_url" class="form-label">
                        <img src="{{Vite::asset('resources/img/github-url.png')}}" alt="Github Url">
                    </label>
                    <input type="text" class="form-control" id="github_url" name="github_url" placeholder="https://.." value="{{old('github_url')}}">
                </div>
                <div class="text-end">
                    <button class="bg-brown">SAVE</button>
                </div>
            </form>
        </div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
</div>
@endsection