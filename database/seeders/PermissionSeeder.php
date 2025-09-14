<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
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
        ];

        foreach ($permissions as $permission) {
            if (!Permission::firstWhere('name', $permission)) {
                Permission::create(['name' => $permission]);
            }
        }
    }
}
