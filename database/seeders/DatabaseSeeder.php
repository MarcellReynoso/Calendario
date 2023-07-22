<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this -> call(RoleSeeder::class);
        
         \App\Models\User::factory()->create([
            'name'=> 'Marcell Reynoso',
            'email' => 'marf2809@gmail.com',
            'password' => bcrypt('rayitas9082')
         ])->assignRole('Admin');

         User::factory(20)->create();
    }
}
