<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        //
        $admin = Role::create([
            'name' => 'admin'
        ]);
        $operation = Role::create([
            'name' => 'operations'
        ]);

        // airports
        Permission::create(['name' => 'airport.view'])->syncRoles([$admin, $operation]);
        Permission::create(['name' => 'airport.store'])->syncRoles($admin, $operation);
        Permission::create(['name' => 'airport.update'])->syncRoles($admin, $operation);
        Permission::create(['name' => 'airport.delete'])->syncRoles($admin, $operation);

        // airlines
        Permission::create(['name' => 'airline.view'])->syncRoles([$admin, $operation]);
        Permission::create(['name' => 'airline.store'])->syncRoles($admin, $operation);
        Permission::create(['name' => 'airline.update'])->syncRoles($admin, $operation);
        Permission::create(['name' => 'airline.delete'])->syncRoles($admin, $operation);

        // fligths
        Permission::create(['name' => 'flight.view'])->syncRoles($admin);
        Permission::create(['name' => 'flight.store'])->syncRoles($admin);
        Permission::create(['name' => 'flight.update'])->syncRoles($admin);
        Permission::create(['name' => 'flight.delete'])->syncRoles($admin);
    }
}
