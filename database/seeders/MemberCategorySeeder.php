<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\MemberCategory;
use Illuminate\Database\Seeder;

class MemberCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        MemberCategory::create([
            'name' => 'Dema U',
            'slug' => 'dema-u'
        ]);

        MemberCategory::create([
            'name' => 'Sema U',
            'slug' => 'sema-u'
        ]);
        
        MemberCategory::create([
            'name' => 'Sema Fak Syariah',
            'slug' => 'sema-f-syariah'
        ]);
        
        MemberCategory::create([
            'name' => 'Dema Fak Syariah',
            'slug' => 'dema-fak-syariah'
        ]);       

    }
}
