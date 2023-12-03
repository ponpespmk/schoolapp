<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('roles')->insert([
            //Super Admin & Admin
            ['name' => 'superadmin',    'guard_name' => 'web',],
            ['name' => 'admin',         'guard_name' => 'web',],
        ]);

        DB::table('permissions')->insert([

            //Admin
            ['name'=> 'admin.menu', 'guard_name' => 'web', 'group_name' => 'admin',],
            ['name'=> 'all.admin', 'guard_name' => 'web', 'group_name' => 'admin',],
            ['name'=> 'add.admin', 'guard_name' => 'web', 'group_name' => 'admin',],
            ['name'=> 'edit.admin', 'guard_name' => 'web', 'group_name' => 'admin',],
            ['name'=> 'delete.admin', 'guard_name' => 'web', 'group_name' => 'admin',],
            //End Admin

            //admin roles
            ['name'=> 'edit.adminroles', 'guard_name' => 'web', 'group_name' => 'adminroles',],
            ['name'=> 'update.adminroles', 'guard_name' => 'web', 'group_name' => 'adminroles',],
            ['name'=> 'delete.adminroles', 'guard_name' => 'web', 'group_name' => 'adminroles',],
            //end admin roles

            ['name'=> 'roles.menu', 'guard_name' => 'web', 'group_name' => 'roles',],
            ['name'=> 'all.roles', 'guard_name' => 'web', 'group_name' => 'roles',],
            ['name'=> 'add.roles', 'guard_name' => 'web', 'group_name' => 'roles',],
            ['name'=> 'edit.roles', 'guard_name' => 'web', 'group_name' => 'roles',],
            ['name'=> 'delete.roles', 'guard_name' => 'web', 'group_name' => 'roles',],

            ['name'=> 'permission.menu', 'guard_name' => 'web', 'group_name' => 'permission',],
            ['name'=> 'all.permission', 'guard_name' => 'web', 'group_name' => 'permission',],
            ['name'=> 'add.permission', 'guard_name' => 'web', 'group_name' => 'permission',],
            ['name'=> 'edit.permission', 'guard_name' => 'web', 'group_name' => 'permission',],
            ['name'=> 'delete.permission', 'guard_name' => 'web', 'group_name' => 'permission',],
            ['name'=> 'export.permission', 'guard_name' => 'web', 'group_name' => 'permission',],
            ['name'=> 'import.permission', 'guard_name' => 'web', 'group_name' => 'permission',],

            ['name'=> 'rolespermission.menu', 'guard_name' => 'web', 'group_name' => 'rolespermission',],
            ['name'=> 'all.rolespermission', 'guard_name' => 'web', 'group_name' => 'rolespermission',],
            ['name'=> 'add.rolespermission', 'guard_name' => 'web', 'group_name' => 'rolespermission',],
            ['name'=> 'edit.rolespermission', 'guard_name' => 'web', 'group_name' => 'rolespermission',],
            ['name'=> 'delete.rolespermission', 'guard_name' => 'web', 'group_name' => 'rolespermission',],

            //Type & Amenitie
            ['name'=> 'amenities.menu', 'guard_name' => 'web', 'group_name' => 'amenities',],
            ['name'=> 'all.amenities', 'guard_name' => 'web', 'group_name' => 'amenities',],
            ['name'=> 'add.amenities', 'guard_name' => 'web', 'group_name' => 'amenities',],
            ['name'=> 'edit.amenities', 'guard_name' => 'web', 'group_name' => 'amenities',],
            ['name'=> 'delete.amenities', 'guard_name' => 'web', 'group_name' => 'amenities',],
            ['name'=> 'type.menu', 'guard_name' => 'web', 'group_name' => 'type',],
            ['name'=> 'all.type', 'guard_name' => 'web', 'group_name' => 'type',],
            ['name'=> 'add.type', 'guard_name' => 'web', 'group_name' => 'type',],
            ['name'=> 'edit.type', 'guard_name' => 'web', 'group_name' => 'type',],
            ['name'=> 'delete.type', 'guard_name' => 'web', 'group_name' => 'type',],
            //End Type & Amenitie


        ]);



        $sadmin = User::create([
            'id'      => 1,
            'name'      => 'sytechid',
            'username'  => 'SYTechId',
            'email'     => 'idsytech@gmail.com',
            'phone'     => '+62 812 6658 3335',
            'password'  => Hash::make('welcome'),
            'role'      => 'superadmin',
            'status'    => 'active',
        ]);
        $sadmin->assignRole('superadmin');
        $sadmin->givePermissionTo([
            'admin.menu',
            'all.admin',
            'add.admin',
            'edit.admin',
            'delete.admin',

            'roles.menu',
            'all.roles',
            'add.roles',
            'edit.roles',
            'delete.roles',

            'permission.menu',
            'all.permission',
            'add.permission',
            'edit.permission',
            'delete.permission',
            'export.permission',
            'import.permission',


            //Admin Roles
            'edit.adminroles',
            'update.adminroles',
            'delete.adminroles',
            // End Admin Roles

            'rolespermission.menu',
            'all.rolespermission',
            'add.rolespermission',
            'edit.rolespermission',
            'delete.rolespermission',

            // Amenitie & Type
            'amenities.menu',
            'all.amenities',
            'add.amenities',
            'edit.amenities',
            'delete.amenities',
            'type.menu',
            'all.type',
            'add.type',
            'edit.type',
            'delete.type',
            // End Amenitie & Type

        ]);

        $admin = User::create([
            'id'      => 2,
            'name'      => 'admin',
            'username'  => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => Hash::make('welcome'),
            'role'      => 'admin',
            'status'    => 'active',
        ]);
        $admin->assignRole('admin');
        $admin->givePermissionTo([
            'admin.menu',
            'all.admin',
            'add.admin',
            'edit.admin',
            'roles.menu',
            'all.roles',
            'add.roles',
            'edit.roles',
            'permission.menu',
            'all.permission',
            'add.permission',
            'edit.permission',
            'export.permission',
            'import.permission',
            'rolespermission.menu',
            'all.rolespermission',
            'add.rolespermission',
            'edit.rolespermission',

        ]);

    }
}
