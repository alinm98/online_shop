<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role = Role::query()->create([
            'title' => 'admin'
        ]);

        $role->permission()->attach(Permission::all());

        Role::query()->insert([
            'title' => 'user'
        ]);
    }
}
