<?php

namespace App\Http\Controllers;

use App\Direction;
use App\Member;
use App\Repositories\EloquentMembers;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Laravel\Lumen\Routing\Controller as BaseController;

class MembersController extends Controller
{
    public function getAll(EloquentMembers $members)
    {
        return response()->json($members->getAll());
    }

    public function getById(EloquentMembers $members, $id)
    {
        try {
            return response()->json($members->getById($id));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function getByDirection(EloquentMembers $members, $id)
    {
        try {
            return response()->json($members->getByDirection($id));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function getByStatus(EloquentMembers $members, $status)
    {
        return response()->json($members->getByStatus($status));
    }

    public function update(EloquentMembers $members, $id, request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|max:30',
            'lastname' => 'required|max:30',
            'avatar' => 'required',
            'info' => 'required',
            'status' => 'required|in:В игре, Выбыл',
            'direction_id' => 'required',
        ]);
        try {
            return response()->json($members->update($id, $request));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }

    public function addPoints(EloquentMembers $members, request $request)
    {
        $this->validate($request, [
            'member_id' => 'required',
            'points' => 'required|numeric',
            ]);
        try {
            return response()->json($members->addPoints($request));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => $e->getMessage()], 404);
        }
    }
}
