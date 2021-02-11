<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Generator;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory(10)->create();
        User::factory(30)->create();
        Group::factory(5)->create();

        //Fill roles ids on users table
        $roles = Role::all()->pluck('id')->toArray();
        User::all()->each(function ($user) use ($roles) {
            $user->role_id = $roles[array_rand($roles)];
            $user->save();
        });
    }
}
