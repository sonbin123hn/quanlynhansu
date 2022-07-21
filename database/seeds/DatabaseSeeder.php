<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // factory('App\User', 10)->create()->each(function($user){
        //     $user->posts()->save(factory('App\Post')->make());
        // });
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::create([
            'id' => 1,
            'username' => 'admin',
            'name' => 'admin',
            'email' => 'admindb@gmail.com',
            'password' => '123123123', //123123123
            'email_verified_at' => now(),
            'avatar' => "asd",
            'phone' => "013321435",
            'birthday' => '1990-01-01',
            'address' => "abc abc",
            'cmnd' => "212141255",
            'place_of_origin' => "abcs asd",
            'ethnicity' => "asdasd",
            'sobhxh' => "3546468645",
        ]);
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
        ]);
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
