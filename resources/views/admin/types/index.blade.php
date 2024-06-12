@extends('layouts.app')

@section('content')


<div class="container my-5">
    <div class="row">
        <div class="logo-title d-flex justify-content-between align-items-center">
            <img src="{{Vite::asset('resources/img/project-types.png')}}" alt="Projects Types">
            <a href="{{ route('admin.types.create')}}">
              <button class="bg-brown">Add Type</button>
            </a>
        </div>
        <div class="my-5">
            <ul class="types-list">
              @foreach($types as $type)
              <li>
                <h4><a href="{{ route('admin.types.show', $type)}}">{{ $type->name}}</a></h4>
                <p>{{ $type->description}}</p>
              </li>
              @endforeach
            </ul>
        </div>
    </div>
</div>


@endsection