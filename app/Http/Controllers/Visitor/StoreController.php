<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visitor\StoreRequest;
use App\Http\Requests\Visitor\UpdateRequest;
use App\Models\Visitor;

class StoreController extends Controller
{

    public function create(StoreRequest $request)
    {
        $data = $request->validated();
        $visitor = Visitor::create($data);

        return $visitor;
    }

    public function index()
    {
        $visitor = Visitor::all();
        return $visitor;
    }

    public function update(UpdateRequest $request, Visitor $visitor)
    {
        $data = $request->validated();
        $visitor->update($data);
        return $visitor;
    }

    public function delete(Visitor $visitor)
    {
        $visitor->delete();
        return response([]);
    }

}
