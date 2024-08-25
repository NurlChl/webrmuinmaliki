<?php

namespace Database\Seeders;

use App\Models\AspirationType;
use App\Models\Faculty;
use App\Models\MemberCategory;
use App\Models\Post;
use App\Models\RuleCategory;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // $this->call([MemberCategorySeeder::class]);

    //    Post::factory(100)->recycle([
    //     User::factory(5)->create(),
    //    ])->create();

    //     Post::factory(10)->create();
    //     User::factory(5)->create();

    //     MemberCategory::all()->create();

        // User::create([
        //     'name' => 'cholil',
        //     'email' => 'horsegourmet0@gmail.com',
        //     'email_verified_at' => now(),
        //     'password' => Hash::make('password'),
        //     'remember_token' => Str::random(10),
        // ]);

        // MemberCategory::create([
        //     'name' => 'Dema U',
        //     'slug' => 'dema-u'
        // ]);

        // MemberCategory::create([
        //     'name' => 'Sema U',
        //     'slug' => 'sema-u'
        // ]);
        
        // MemberCategory::create([
        //     'name' => 'Sema Fak Syariah',
        //     'slug' => 'sema-f-syariah'
        // ]);
        
        // MemberCategory::create([
        //     'name' => 'Dema Fak Syariah',
        //     'slug' => 'dema-fak-syariah'
        // ]);
        

        // RuleCategory::create([
        //     'name' => 'Dema U',
        //     'slug' => 'dema-u'
        // ]);

        // RuleCategory::create([
        //     'name' => 'Sema U',
        //     'slug' => 'sema-u'
        // ]);
        
        // RuleCategory::create([
        //     'name' => 'Sema Fak Syariah',
        //     'slug' => 'sema-f-syariah'
        // ]);

        // RuleCategory::create([
        //     'name' => 'Dema Fak Syariah',
        //     'slug' => 'dema-fak-syariah'
        // ]);



        // Faculty::create([
        //     'name' => 'Saintek',
        //     'slug' => 'saintek',
        //     'color' => 'blue',
        // ]);

        // Faculty::create([
        //     'name' => 'Psikologi',
        //     'slug' => 'psikologi',
        //     'color' => 'green',
        // ]);

        // Faculty::create([
        //     'name' => 'Syariah',
        //     'slug' => 'syariah',
        //     'color' => 'yellow',
        // ]);

        // Faculty::create([
        //     'name' => 'Tarbiyah',
        //     'slug' => 'tarbiyah',
        //     'color' => 'purple'
        // ]);


        // AspirationType::create([
        //     'name' => 'Komplain',
        //     'slug' => 'komplain',
        // ]);

        // AspirationType::create([
        //     'name' => 'Aspirasi',
        //     'slug' => 'aspirasi',
        // ]);

        // AspirationType::create([
        //     'name' => 'Pengajuan Informasi',
        //     'slug' => 'pengajuan-informasi',
        // ]);


        // $this->call([
        //     RoleSeeder::class,
        // ]);
        

        Post::factory(10)->create();

    }

}
