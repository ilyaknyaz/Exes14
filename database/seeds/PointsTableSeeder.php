<?php

use Illuminate\Database\Seeder;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = DB::table('members')->select('id')->get();
        foreach ($sql as $member) {
            factory(App\Point::class, mt_rand(1, 10))->create(['member_id' => $member->id]);
        }
    }
}