<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminDashboardPermissionArray = [
            'Access Dashboard',
        ];
        $adminSystemRolePermissionArray = [
            'Role List',
            'Role Create',
            'Role Edit',
            'Role Delete',
        ];
        $adminSystemAdminPermissionArray = [
            'Admin List',
            'Admin Create',
            'Admin Edit',
            'Admin View',
            'Admin Delete',
        ];
        $adminSystemBackupPermissionArray = [
            'Backup List',
            'Backup Create',
            'Backup Delete',
            'Backup Download',
        ];
        $adminSlidersPermissionArray = [
            'Slider List',
            'Slider Create',
            'Slider Edit',
            'Slider Delete',
        ];
        $adminResultsPermissionArray = [
            'Result List',
            'Result Create',
            'Result Edit',
            'Result Download',
            'Result Delete',
        ];
        $adminNoticesPermissionArray = [
            'Notice List',
            'Notice Create',
            'Notice Edit',
            'Notice Download',
            'Notice Delete',
        ];
        $adminFacultyPermissionArray = [
            'Faculty List',
            'Faculty Create',
            'Faculty Edit',
            'Faculty Delete',
        ];
        $adminAuthorityPermissionArray = [
            'Authority List',
            'Authority Create',
            'Authority Edit',
            'Authority Delete',
        ];
        $adminContactsPermissionArray = [
            'Contact List',
            'Contact Delete',
        ];

        //Access Dashboard
        $adminDashboardModule = Module::where('module_name', 'Dashboard')->select('id')->first();
        for ($i = 0; $i < count($adminDashboardPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminDashboardModule->id,
                'permission_name' => $adminDashboardPermissionArray[$i],
                'permission_slug' => Str::slug($adminDashboardPermissionArray[$i]),
            ]);
        }
        //sliders
        $adminSlidersModule = Module::where('module_name', 'Sliders')->select('id')->first();
        for ($i = 0; $i < count($adminSlidersPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminSlidersModule->id,
                'permission_name' => $adminSlidersPermissionArray[$i],
                'permission_slug' => Str::slug($adminSlidersPermissionArray[$i]),
            ]);
        }
        //Faculty
        $adminFacultyModule = Module::where('module_name', 'Faculty')->select('id')->first();
        for ($i = 0; $i < count($adminFacultyPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminFacultyModule->id,
                'permission_name' => $adminFacultyPermissionArray[$i],
                'permission_slug' => Str::slug($adminFacultyPermissionArray[$i]),
            ]);
        }
        //Authority
        $adminAuthorityModule = Module::where('module_name', 'Authority')->select('id')->first();
        for ($i = 0; $i < count($adminAuthorityPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminAuthorityModule->id,
                'permission_name' => $adminAuthorityPermissionArray[$i],
                'permission_slug' => Str::slug($adminAuthorityPermissionArray[$i]),
            ]);
        }
        //Results
        $adminResultsModule = Module::where('module_name', 'Results')->select('id')->first();
        for ($i = 0; $i < count($adminResultsPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminResultsModule->id,
                'permission_name' => $adminResultsPermissionArray[$i],
                'permission_slug' => Str::slug($adminResultsPermissionArray[$i]),
            ]);
        }
        //notices
        $adminNoticesModule = Module::where('module_name', 'Notices')->select('id')->first();
        for ($i = 0; $i < count($adminNoticesPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminNoticesModule->id,
                'permission_name' => $adminNoticesPermissionArray[$i],
                'permission_slug' => Str::slug($adminNoticesPermissionArray[$i]),
            ]);
        }




























        //contacts
        $adminContactsModule = Module::where('module_name', 'Contacts')->select('id')->first();
        for ($i = 0; $i < count($adminContactsPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminContactsModule->id,
                'permission_name' => $adminContactsPermissionArray[$i],
                'permission_slug' => Str::slug($adminContactsPermissionArray[$i]),
            ]);
        }
        //system roles
        $adminSystemRoleModule = Module::where('module_name', 'System Roles')->select('id')->first();
        for ($i = 0; $i < count($adminSystemRolePermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminSystemRoleModule->id,
                'permission_name' => $adminSystemRolePermissionArray[$i],
                'permission_slug' => Str::slug($adminSystemRolePermissionArray[$i]),
            ]);
        }
        //system admins
        $adminSystemAdminModule = Module::where('module_name', 'System Admins')->select('id')->first();
        for ($i = 0; $i < count($adminSystemAdminPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminSystemAdminModule->id,
                'permission_name' => $adminSystemAdminPermissionArray[$i],
                'permission_slug' => Str::slug($adminSystemAdminPermissionArray[$i]),
            ]);
        }
        //system backup
        $adminSystemBackupModule = Module::where('module_name', 'Database Backup')->select('id')->first();
        for ($i = 0; $i < count($adminSystemBackupPermissionArray); $i++) {
            Permission::Create([
                'module_id' => $adminSystemBackupModule->id,
                'permission_name' => $adminSystemBackupPermissionArray[$i],
                'permission_slug' => Str::slug($adminSystemBackupPermissionArray[$i]),
            ]);
        }
    }
}
