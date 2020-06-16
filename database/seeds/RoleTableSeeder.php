<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles=[
            'undefined',
            'admin',
            'teacher',
            'student'
        ];

        foreach($roles as $role)
        {

            Role::create([
                'name'=>$role,
            ]);




        }
    }
}
