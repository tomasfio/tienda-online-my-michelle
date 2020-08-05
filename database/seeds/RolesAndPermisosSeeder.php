<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesAndPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::firstOrCreate(['name' => 'super-admin']);
        $roleSuperAdmin->syncPermissions([
            'gestionar_pagina',
            'users_abm'
        ]);

        $roleAdmin = Role::firstOrCreate(['name' => 'admin']);
        $roleAdmin->syncPermissions([
            'gestionar_pagina'
        ]);

        $roleCliente = Role::firstOrCreate(['name' => 'cliente']);
    }
}
