<?php

namespace Database\Seeders;

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
        Role::factory(99)->create();
        User::factory(20)->create();
        $roles = Role::all()->pluck('id')->toArray();
        User::all()->each(function ($user) use ($roles) {
            $user->id_role = $roles[array_rand($roles)];
            $user->save();
        });
    }
}
