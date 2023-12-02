<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Modules\Product\Entities\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      
            $admin = new Admin();
            $admin -> name ="Mohmed Etman";
            $admin -> email ="admin@admin.com";
            $admin -> password = bcrypt("admin123");
            $admin -> save();
            $this->call([
                //UserSeeder::class,
               SettingSeeder::class,
            //   Category::factory()->count(3)->make(),

            ]);
            
     

    Category::create([
       'name'=>'dsfdf',
       'slug'=>'fdsafdf',
       'is_active'=>0,
       'parent_id'=>1
    //    'locale'=>'en'
        
    ]);
    
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}