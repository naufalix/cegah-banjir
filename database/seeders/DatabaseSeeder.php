<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            "name" => "Admin",
            "username" => "admin",
            "email" => "admin@naufal.dev",
            "password" => bcrypt('admin'),
            "type" => "individu",
            "location" => "Malang",
            "description" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ut, quasi officiis fuga itaque, suscipit odit laborum maxime voluptatum voluptate quae ad nesciunt voluptas officia accusantium accusamus. Quisquam nihil maiores veniam.",
            "phone" => "085234006051",
        ]);        
    }
}
