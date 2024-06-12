@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="logo-title d-flex justify-content-between align-items-center">
            <img src="{{Vite::asset('resources/img/techs.png')}}" alt="Technologies">
            <a class="mt-3" href="{{ route('admin.technologies.create')}}">
                <button class="bg-brown">Add Technology</button>
            </a>
        </div>
        <div class="my-5">
            <ul class="technologies-list d-flex justify-content-around align-items-center p-0">
                @foreach($technologies as $technology)
                <li class="mb-5">
                    <a href="{{ route('admin.technologies.show', $technology)}}">
                        <img src="{{ Vite::asset("resources/img/technologies/$technology->thumb")}}" alt="{{ $technology->name }}">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        
    </div>
</div>
@endsection