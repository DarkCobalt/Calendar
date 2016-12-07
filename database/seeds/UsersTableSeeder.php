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
        // Create Seeder First User
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@calendar.com',
            'password' => bcrypt('admin')
        ]);
    }
}
