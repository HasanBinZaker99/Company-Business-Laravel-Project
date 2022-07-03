<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::create(['name' => 'SuperAdmin']);
        $roleAdmin = Role::create(['name' => 'Admin']);
        $roleEditor = Role::create(['name' => 'Editor']);
        $roleUser = Role::create(['name' => 'User']);


        $permissions = [

            [
                'group_name' => 'Dashboard',
                'permissions' => [
                    'Dashboard View',
                    'Runing Batch',
                    'Notice Board',
                    'Upcoming Batch',
                ]
            ],
            [
                'group_name' => 'Manage Users',
                'permissions' => [
                    'Manage User',
                    'Role Create',
                    'Role Edit',
                    'Role Delete',
                    'Role list View',
                    'User List',
                    'Create Users View',
                    'Users List View',
                    'User Create',
                    'User Edit',
                    'User Delete',
                ]
            ],
            [
                'group_name' => 'Header',
                'permissions' => [
                    'Profile',
                    'Change Password',
                    'Sign Out',
                    'Chat',
                    'Email',
                    'Settings',
                    'Accounts',
                    'New Admission',
                ]
            ],
            [
                'group_name' => 'Notice Board',
                'permissions' => [
                    'Notice Board View',
                    'Notice Board Edit',
                    'Notice Board Create',
                    'Notice Board Delete',
                ]
            ],
            [
                'group_name' => 'Payment Received',
                'permissions' => [
                    'View Payment'
                ]
            ],
            [
                'group_name' => 'Teacher',
                'permissions' => [
                    'Teacher',
                    'Designation View',
                    'Designation Create',
                    'Designation Delete',
                    'Teacher View',
                    'Teacher Create',
                    'Teacher Edit',
                    'Teacher Delete',
                ]
            ],
            [
                'group_name' => 'Course',
                'permissions' => [
                    'Course',
                    'Course Create View',
                    'Course Edit',
                    'Course Delete',
                    'Course Create',
                    'Course Details View',
                    'Course Details Edit',
                    'Course Details Show',
                    'Course Details Delete',
                    'Course Details Create',
                    'All Course View',
                ]
            ],
            [
                'group_name' => 'Batch',
                'permissions' => [
                    'Batch',
                    'Batch Create View',
                    'Batch Edit',
                    'Batch Create',
                    'Batch Delete',
                    'Teacher Assign View',
                    'Teacher Assign Edit',
                    'Teacher Assign Create',
                    'Teacher Assign Delete',
                    'Batch List View',
                ]
            ],
            [
                'group_name' => 'Class',
                'permissions' => [
                    'Class',
                    'Class List View',
                ]
            ],
            [
                'group_name' => 'Admission',
                'permissions' => [
                    'Admission',
                    'Admission View',
                    'Admission Edit',
                    'Admission Delete',
                    'Admission Show',
                    'Admission Create',
                    'Admission List View',
                ]
            ],
            [
                'group_name' => 'Student Panel',
                'permissions' => [
                    'Panel',
                    'Panel View',
                    'Panel List View',
                ]
            ],
        ];

        for ($i = 0; $i < count($permissions); $i++) {

            $permissionGroup = $permissions[$i]['group_name'];

            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {

                $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
                $roleSuperAdmin->givePermissionTo($permission);
                $permission->assignRole($roleSuperAdmin);
            }
        }
    }
}
