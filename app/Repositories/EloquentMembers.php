<?php

namespace App\Repositories;

use App\Direction;
use App\Member;
use App\Point;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class EloquentMembers implements MembersRepository
{
    protected $model;
    protected $direction;
    protected $point;

    public function __construct(Member $model, Direction $direction, Point $point)
    {
        $this->model = $model;
        $this->direction = $direction;
        $this->point = $point;
    }

    /**
     * {@inheritdoc}
     */

    public function getAll(): Collection
    {
        return $this->model->all();
    }

    public function getById(int $id): Member
    {
        return $this->model->findOrFail($id);
    }

    public function getByDirection(int $id): direction
    {
        return $this->direction->with('members')->findOrFail($id);
    }

    public function getByStatus($status)
    {
        $possibleStatuses = [
            'ingame' => 'В игре',
            'out' => 'Выбыл',
        ];

        return $this->model->where('status', $possibleStatuses[$status])->get();
    }

    public function update($id, Request $request)
    {
        $updateMember = $this->model->findOrFail($id);

        $updateMember->firstname = $request->firstname;
        $updateMember->lastname = $request->lastname;
        $updateMember->avatar = $request->avatar;
        $updateMember->info = $request->info;
        $updateMember->status = $request->status;
        $updateMember->direction_id = $request->direction_id;

        $updateMember->save();

        return $updateMember;
    }

    public function addPoints(Request $request)
    {
        $point = new Point;

        $point->member_id = $request->member_id;
        $point->points = $request->points;
        $point->save();

        return $point;
    }
}