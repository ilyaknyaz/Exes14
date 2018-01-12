<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Member;
use App\Direction;

interface MembersRepository
{
    /**
     * Get all members
     *
     * @return Collection
     */
    public function getAll(): Collection;

    /**
     * Get member by id
     *
     * @param int $id
     * @return Member
     */
    public function getById(int $id): member;

    /**
     * @param int $id
     * @return Direction
     */
    public function getByDirection(int $id): direction;

    /**
     * Get members by status
     *
     * @param string $status one of "В игре"|"Выбыл"
     * @return Collection
     */

    public function getByStatus($status);

    /**
     * Update member
     * NOTE! You must validate your data before use this method!
     * @param Request $request
     * @param $id
     */
    public function update($id, Request $request);

    /**
     * Add points to member
     * @param Request $request
     */
    public function addPoints(Request $request);
}
