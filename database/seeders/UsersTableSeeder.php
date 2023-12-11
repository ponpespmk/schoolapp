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

            ['name'=> 'labelletter.menu', 'guard_name' => 'web', 'group_name' => 'letter',],
            //Letters
            ['name'=> 'letter.menu', 'guard_name' => 'web', 'group_name' => 'letter',],
            ['name'=> 'in.letter', 'guard_name' => 'web', 'group_name' => 'letter',],
            ['name'=> 'out.letter', 'guard_name' => 'web', 'group_name' => 'letter',],
            //End Letters

            //Buku Agenda
            ['name'=> 'agendabook.menu', 'guard_name' => 'web', 'group_name' => 'letter',],
            ['name'=> 'in.agendabook', 'guard_name' => 'web', 'group_name' => 'letter',],
            ['name'=> 'out.agendabook', 'guard_name' => 'web', 'group_name' => 'letter',],
            //End Buku Agenda

            //Galeri File
            ['name'=> 'fileletter.menu', 'guard_name' => 'web', 'group_name' => 'letter',],
            ['name'=> 'in.fileletter', 'guard_name' => 'web', 'group_name' => 'letter',],
            ['name'=> 'out.fileletter', 'guard_name' => 'web', 'group_name' => 'letter',],
            //End Galeri File
            ['name'=> 'klasifikasi.menu', 'guard_name' => 'web', 'group_name' => 'letter',],

            //Finance
            ['name'=> 'labelfinence.menu', 'guard_name' => 'web', 'group_name' => 'finance',],

            ['name'=> 'payment.menu', 'guard_name' => 'web', 'group_name' => 'finance',],
            ['name'=> 'detil.payment', 'guard_name' => 'web', 'group_name' => 'finance',],
            ['name'=> 'transaction.payment', 'guard_name' => 'web', 'group_name' => 'finance',],
            //End Finance

            //Savings Students
            ['name'=> 'savings.menu', 'guard_name' => 'web', 'group_name' => 'studentsavings',],

            ['name'=> 'credit.savings', 'guard_name' => 'web', 'group_name' => 'studentsavings',],
            ['name'=> 'debet.savings', 'guard_name' => 'web', 'group_name' => 'studentsavings',],
            //End Savings Students

            //Keuangan Lembaga
            ['name'=> 'schoolfinance.menu', 'guard_name' => 'web', 'group_name' => 'schoolfinance',],

            ['name'=> 'income', 'guard_name' => 'web', 'group_name' => 'schoolfinance',],
            ['name'=> 'expenditure', 'guard_name' => 'web', 'group_name' => 'schoolfinance',],
            ['name'=> 'loan', 'guard_name' => 'web', 'group_name' => 'schoolfinance',],
            //End Keuangan Lembaga

            //Cetak Laporan
            ['name'=> 'financereport.menu', 'guard_name' => 'web', 'group_name' => 'financereport',],

            ['name'=> 'paymenttransaction.report', 'guard_name' => 'web', 'group_name' => 'financereport',],
            ['name'=> 'depositwithdrawal.report', 'guard_name' => 'web', 'group_name' => 'financereport',],
            ['name'=> 'schoolfinance.report', 'guard_name' => 'web', 'group_name' => 'financereport',],
            //End Cetak Laporan

            //Manage Data
            ['name'=> 'labelmanagedata.menu', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'institutional.menu', 'guard_name' => 'web', 'group_name' => 'managedata',],

            ['name'=> 'profil.institutional', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'leader.institutional', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'ustadz.menu', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'students.menu', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'list.students', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'mutation.students', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'academic.students', 'guard_name' => 'web', 'group_name' => 'managedata',],
            ['name'=> 'rombel.students', 'guard_name' => 'web', 'group_name' => 'managedata',],
            //End Manage Data

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
            // Letter
            'labelletter.menu', 'letter.menu', 'in.letter', 'out.letter',
            'agendabook.menu', 'in.agendabook', 'out.agendabook',
            'fileletter.menu', 'in.fileletter', 'out.fileletter',
            'klasifikasi.menu',
            // End Letter

            // Finance
            'labelfinence.menu',
            'payment.menu', 'detil.payment', 'transaction.payment',
            // End Finance

            // Savings Students
            'savings.menu',
            'credit.savings', 'debet.savings',
            // End Savings Students

            // Keuangan Lembaga
            'schoolfinance.menu',
            'income', 'expenditure', 'loan',
            // End Keuangan Lembaga

            // Laporan Keuangan
            'financereport.menu',
            'paymenttransaction.report', 'depositwithdrawal.report', 'schoolfinance.report',
            // End Laporan Keuangan

            // Manage Data
            'labelmanagedata.menu',
            'institutional.menu',
            'profil.institutional', 'leader.institutional',
            'ustadz.menu',
            'students.menu', 'list.students', 'mutation.students', 'academic.students', 'rombel.students',

            // End Manage Data

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
