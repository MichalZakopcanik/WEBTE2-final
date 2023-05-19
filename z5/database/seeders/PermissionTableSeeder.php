<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {

        $permissions = [

           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'generate-eq',
           'new-latex-file',
           'create-pdf',
           'new-assignment',
           'select-assignment',
           'submit-assigment',
        ];
        

        

        foreach ($permissions as $permission) {

             Permission::create(['name' => $permission]);

        }

    }
}
