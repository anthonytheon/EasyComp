<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use App\Models\Faculty;
use App\Models\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $adminpassword = '12345';

        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'User'
        ]);

        // name email password role_id id_number gender year_start university faculty major
        User::create([
            'name' => 'adminanthony',
            'email' => 'admin@gmail.com',
            'password' => Hash::make($adminpassword),
            'role_id' => 1,
            'id_number' => '20417019',
            'gender' => 'Other',
            'year_start' => '2021',
            'university' => 'Ciputra University',
            'faculty' => 1,
            'major' => 1,
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'description' => 'Machine learning (ML) is the study of computer algorithms that can improve automatically through experience and by the use of data. It is seen as a part of artificial intelligence.'
        ]); 

        Category::create([
            'name' => 'Game Development',
            'description' => 'Game Development is the art of creating games and describes the design, development and release of a game. It may involve concept generation, design, build, test and release.'
        ]);

        Category::create([
            'name' => 'Web Development',
            'description' => 'Web development is the work involved in developing a website for the Internet (World Wide Web) or an intranet (a private network).'
        ]);

        Faculty::create([
            'faculty_name' => 'Information Technology'
        ]);

        Major::create([
            'major_name' => 'IMT'
        ]);

        Major::create([
            'major_name' => 'ISB'
        ]);
        
        
    }
}
