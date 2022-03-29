<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

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

        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'User'
        ]);

        Category::create([
            'name' => 'Machine Learning',
            'description' => 'Machine learning (ML) is the study of computer algorithms that can improve automatically 
            through experience and by the use of data. It is seen as a part of artificial intelligence.'
        ]); 

        Category::create([
            'name' => 'Game Development',
            'description' => 'Game Development is the art of creating games and describes the design, development and release of a game. 
            It may involve concept generation, design, build, test and release.'
        ]);

        Category::create([
            'name' => 'Web Development',
            'description' => 'Web development is the work involved in developing a website for the Internet (World Wide Web) or an 
            intranet (a private network).'
        ]);


        // User::create([
        //     'name' => 'John Doe',
        //     'email' => 'admin@gmail.com',
        //     'role_id' => 1,
        //     'password' => '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq',
        // ]);

        // User::create([
        //     'name' => 'John Doe',
        //     'email' => 'user@gmail.com',
        //     'role_id' => 2,
        //     'password' => '$2y$10$E3OjImMSjPTG6J4SLgFWte1wyH7lZwEtfPiahDdT2LyZG/RjqTWuq',
        // ]);
        
    }
}
