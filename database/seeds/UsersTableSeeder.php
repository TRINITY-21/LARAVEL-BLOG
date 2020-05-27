<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Admin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('password'),
            'admin' => 1,

        ]);


        Profile::create([
            'user_id' => $user->id,
            'avatar'=>'uploads/avatar/2.png',
            'about' => 'About me',
            'youtube' => 'youtube',
            'facebook' => 'facebook',

        ]); 
    }



}
