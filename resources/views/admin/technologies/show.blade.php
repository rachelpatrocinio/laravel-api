@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row my-5">
        <div class="card mb-3 p-5">
            <div class="mb-3 text-center">
                <img src="{{ Vite::asset("resources/img/technologies/$technology->thumb")}}" alt="{{ $technology->name }}">
            </div>
            <p>{{ $technology->description }}</p>
        </div>
        <div class="d-flex justify-content-between p-0">
            <div>
                <a href="{{ route('admin.technologies.index')}}">
                    <button class="bg-brown">Go Back</button>
                </a>
                <a href="{{ route('admin.technologies.edit', $technology)}}">
                    <button class="bg-lightbrown">Edit</button>
                </a>
            </div>
            <form action="{{ route('admin.technologies.destroy', $technology)}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="bg-red">Delete</button>
            </form>
        </div>
    </div>
</div>
@endsection