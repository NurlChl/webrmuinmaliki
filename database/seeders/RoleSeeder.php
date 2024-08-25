<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = User::create([
            'name' => 'cholil',
            'email' => 'horsegourmet0@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
        ]);

        // $role = Role::create([
        //     'name' => 'admin'
        // ]);

        User::factory(10)->create();

        collect([
            ['name' => 'admin'],
            ['name' => 'partner'],
        ])->each(fn ($role) => Role::create($role));

        $user2 = User::find(2);

        $user->assignRole(Role::find(1));
        $user2->assignRole(Role::find(2));

        // $user->roles()->attach($role->id);


    }
}
