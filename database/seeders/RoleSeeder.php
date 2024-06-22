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
        //
       $role1 =  Role::create(['name' => 'Admin']);
       $role2 =  Role::create(['name' => 'Tecnico']);
       //Permission::create(['name' => 'home'])->assignRole($role1) ;  //colocamos el mismo nombre de las rutas pero puede ser cualquier nombre 
       Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);  //colocamos el mismo nombre de las rutas pero puede ser cualquier nombre 
       Permission::create(['name' => 'profile'])->syncRoles([$role1,$role2]);

       Permission::create(['name' => 'profile.edit'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'profile.update'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'profile.destroy'])->syncRoles([$role1,$role2]);
       
       Permission::create(['name' => 'tecnico.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'tecnico.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'tecnico.edit'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'tecnico.destroy'])->syncRoles([$role1,$role2]);

       Permission::create(['name' => 'marca.index'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'marca.create'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'marca.edit'])->syncRoles([$role1,$role2]);
       Permission::create(['name' => 'marca.destroy'])->syncRoles([$role1,$role2]);

    }
}
