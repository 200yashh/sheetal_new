<?php

namespace Database\Seeders;

use App\Helpers\Helper;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $superadmin = Role::firstOrCreate(['name' => 'superadmin']);
        $agent = Role::firstOrCreate(['name' => 'agent']);

        foreach(Helper::getAllMenus() as $slug => $title){
            Permission::firstOrCreate(['name' => 'admin.'. $slug . '.view']);
            Permission::firstOrCreate(['name' => 'admin.'. $slug . '.add']);
            Permission::firstOrCreate(['name' => 'admin.'. $slug . '.edit']);
            Permission::firstOrCreate(['name' => 'admin.'. $slug . '.delete']);
            $allMenus[] = 'admin.' . $slug . '.view';
            $allMenus[] = 'admin.' . $slug . '.add';
            $allMenus[] = 'admin.' . $slug . '.edit';
            $allMenus[] = 'admin.' . $slug . '.delete';
        }
        
        // role permissions
        $superadmin->syncPermissions($allMenus);
        $agent->syncPermissions(['admin.dashboard.view', 'admin.agents.view', 'admin.agents.add', 'admin.agents.edit']);

        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
    }
}
