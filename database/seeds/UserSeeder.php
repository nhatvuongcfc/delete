<?php
use App\Role;
use App\User;
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin1=Role::where('name','Admin 1')->first();
        $role_admin2=Role::where('name','Admin 2')->first();
        $role_teacher=Role::where('name','Teacher')->first();
        $role_student=Role::where('name','Student')->first();
        
        $admin1= new User();
        $admin1->full_name='Admin1';
        $admin1->email='admin1@gmail.com';
        $admin1->password=bcrypt('admin1');
        $admin1->save();
        $admin1->roles()->attach($role_admin1);
    }
}
