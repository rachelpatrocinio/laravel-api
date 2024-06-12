<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Models\Type;
use App\Http\Controllers\Controller;

class TypeController extends Controller
{

    public function index()
    {
        $types = Type::all();
        return view('admin.types.index', compact('types'));
    }


    public function create()
    {
        return view('admin.types.create');
    }


    public function store(StoreTypeRequest $request)
    {
        $form_data = $request->all();
        $new_type = Type::create($form_data);

        return to_route('admin.types.index', $new_type);
    }


    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }


    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }


    public function update(UpdateTypeRequest $request, Type $type)
    {
        $form_data = $request->validated();
        $type->update($form_data);
        return to_route('admin.types.show', $type);

    }


    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('admin.types.index');
    }
}
