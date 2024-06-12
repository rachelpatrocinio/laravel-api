@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('admin.technologies.update', $technology)}}" method="POST" class="my-5">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">
                    <img src="{{Vite::asset('resources/img/tech-name.png')}}" alt="Type Name">
                </label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Technology Name" value="{{ old('name', $technology->name)}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">
                    <img src="{{Vite::asset('resources/img/tech-description.png')}}" alt="Technology Description">
                </label>
                <textarea name="description" id="description" cols="30" rows="10" class="w-100 h-25 form-control">{{ old('description', $technology->description)}}</textarea>
            </div>
            <div class="text-end mt-3">
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
@endsection