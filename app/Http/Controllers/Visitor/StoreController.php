<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visitor\StoreRequest;
use App\Http\Requests\Visitor\UpdateRequest;
use App\Http\Resources\Visitor\VisitorResource;
use App\Models\Visitor;

class StoreController extends Controller
{

    public function create(StoreRequest $request)
    {
        $data = $request->validated();
        Visitor::create($data);

        return response([]);
    }

    public function index()
    {
        $visitor = Visitor::all();
        return VisitorResource::collection($visitor);
    }

    public function show(Visitor $visitor){

        return new VisitorResource($visitor);
    }

    public function update(UpdateRequest $request, Visitor $visitor)
    {
        $data = $request->validated();
        $visitor->update($data);
        return response([]);
    }

    public function delete(Visitor $visitor)
    {
        $visitor->delete();
        return response([]);
    }

}
