<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'User']);


        Permission::create(['name' => 'users.index'])->assignRole($role1,$role2); 
        Permission::create(['name' => 'users.create'])->assignRole($role1); 
        Permission::create(['name' => 'users.show'])->assignRole($role1); 
        Permission::create(['name' => 'users.edit'])->assignRole($role1); 
        Permission::create(['name' => 'users.destroy'])->assignRole($role1);
        
        Permission::create(['name' => 'admin.comunicados'])->assignRole($role1); 
        Permission::create(['name' => 'comunicados.create'])->assignRole($role1); 
        Permission::create(['name' => 'comunicados.show'])->assignRole($role1); 
        Permission::create(['name' => 'comunicados.edit'])->assignRole($role1); 
        Permission::create(['name' => 'comunicados.destroy'])->assignRole($role1); 
    }
}
