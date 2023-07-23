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
        
        User::factory()->create([
            'name'=> 'Administrador',
            'email' => 'admin123@gmail.com',
            'password' => bcrypt('Tendenz@123')
        ])->assignRole('Admin');

        User::factory()->create([
            'name'=> 'Belén Zegarra',
            'email' => 'kzegarrap@unjbg.edu.pe',
            'password' => bcrypt('belen123')
        ])->assignRole('User');
         /* User::factory(20)->create(); */
    }
}
