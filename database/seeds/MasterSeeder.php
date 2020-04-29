<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Master\Rule;
use App\Models\Master\User;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*seeder user*/
        User::insert([[
            'name'       => 'Super User',
            'username'   => 'super_user',
            'password'   => bcrypt('12345678'),
            'is_active'  => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],[
            'name'       => 'Administrator',
            'username'   => 'admin',
            'password'   => bcrypt('12345678'),
            'is_active'  => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],[
            'name'       => 'User',
            'username'   => 'user',
            'password'   => bcrypt('12345678'),
            'is_active'  => true,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]]);
        /*seeder rule*/
        Rule::insert([[
            'name'       => 'Super User',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],[
            'name'       => 'Administrator',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ],[
            'name'       => 'User',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
          ]]);
        /*seeder rule_users*/
        DB::table('rule_users')->insert([
            ['user_id' => 1, 'rule_id' => 1],
            ['user_id' => 2, 'rule_id' => 2],
            ['user_id' => 3, 'rule_id' => 3],
        ]);
    }
}
