<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasPermissionSeeder extends Seeder
{
    public function run(): void
    {
        //Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin',
                'password' => bcrypt('password'),
            ]
        );

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $admin->syncRoles([]);
        $admin->assignRole($adminRole);

        $permissions = Permission::all();
        $adminRole->syncPermissions($permissions);

        //User Biasa

        $user = User::firstOrCreate(
            ['email' => 'user@gmail.com'],
            [
                'name' => 'User',
                'password' => bcrypt('password'),
            ]
        );

        $userRole = Role::firstOrCreate(['name' => 'user']);
        $user->syncRoles([]);
        $user->assignRole($userRole);

        $userPermissions = Permission::whereIn('name', [
            'task-list',
            'task-create',
            'task-edit',
            'task-delete',

            'category-list',
            'category-create',
            'category-edit',
            'category-delete',

            'project-list',
            'project-create',
            'project-edit',
            'project-delete',
        ])->get();

        $userRole->syncPermissions($userPermissions);
    }
}
