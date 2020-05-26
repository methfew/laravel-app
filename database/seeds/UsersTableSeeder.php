<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            
                'name' => 'autosami',
                'email' => config('app.admin_username'),
                'password' => Hash::make(config('app.admin_password')),
            
            
        ]);
    }
}
