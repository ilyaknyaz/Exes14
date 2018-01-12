<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = DB::table('directions')->select('id')->get();
        foreach ($sql as $direction) {
            factory(App\Member::class, 2)->create(['direction_id' => $direction->id]);
        }
    }
}