<?php

  

namespace Database\Seeders;

  

use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

use App\Models\User;

use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

  

class UsersTableSeeder extends Seeder

{

    /**

     * Run the database seeds.

     */

    public function run(): void

    {

        $admin1 = User::create([

            'name' => 'God Godson', 

            'email' => 'admin@gmail.com',

            'password' => bcrypt('123456')

        ]);
        $teacher1 = User::create([

            'name' => 'teacher teacherson', 

            'email' => 'teacher@gmail.com',

            'password' => bcrypt('123456')

        ]);

        $student1 = User::create([

            'name' => 'student stidentson', 

            'email' => 'student@gmail.com',

            'password' => bcrypt('123456')

        ]);
        $student2 = User::create([

            'name' => 'student stidentson', 

            'email' => 'student2@gmail.com',

            'password' => bcrypt('123456')

        ]);
        $student3 = User::create([

            'name' => 'student stidentson', 

            'email' => 'student3@gmail.com',

            'password' => bcrypt('123456')

        ]);
        $student4 = User::create([

            'name' => 'student stidentson', 

            'email' => 'student4@gmail.com',

            'password' => bcrypt('123456')

        ]);



        

        $teacher = Role::create(['name' => 'teacher']);
        $student = Role::create(['name'=> 'student']);
        $admin = Role::create(['name'=> 'admin']);

         

        $adminPerm = Permission::pluck('id','id')->all();
        $studentPerm = Permission::where('name','=',['create-pdf','submit-assigment'])->pluck('id','id')->all();
        $teacherPerm = Permission::where('name','=',['generate-eq','new-latex-file','new-assignment','create-pdf'])->pluck('id','id')->all();
        

        $teacher->syncPermissions($teacherPerm);
        $admin->syncPermissions($adminPerm);
        $student->syncPermissions($studentPerm);

         

        $admin1->assignRole([$admin->id]);
        $teacher1->assignRole([$teacher->id]);
        $student1->assignRole([$student->id]);
        $student2->assignRole([$student->id]);
        $student3->assignRole([$student->id]);
        $student4->assignRole([$student->id]);

    }

}