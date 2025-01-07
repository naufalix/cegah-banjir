<?php

namespace Database\Seeders;

use App\Models\cause;
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
        
        Cause::create(["id" => "1", "color"=>"#619DB5", "name" => "Drainase buruk",]); 
        Cause::create(["id" => "2", "color"=>"#E31D1C", "name" => "Urbanisasi tak terkendali",]); 
        Cause::create(["id" => "3", "color"=>"#58AB54", "name" => "Pendangkalan sungai",]); 
        Cause::create(["id" => "4", "color"=>"#7A1CDE", "name" => "Penumpukan sampah",]); 
        Cause::create(["id" => "5", "color"=>"#1CD4DE", "name" => "Curah hujan tinggi",]); 
        Cause::create(["id" => "6", "color"=>"#DE1CCE", "name" => "Deforestasi",]); 
        Cause::create(["id" => "7", "color"=>"#000000", "name" => "Lainnya",]); 
    }
}
