<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            // 'category-list',
            // 'category-create',
            // 'category-edit',
            // 'category-delete',
            'video-list',
            'video-create',
            'video-edit',
            'video-delete',
            'album-list',
            'album-create',
            'album-edit',
            'album-delete',
        ];
 
 
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
