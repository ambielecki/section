<?php

use
    Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create admin - DO NOT DO THIS ON A REAL WORLD SITE ON GITHUB - DEMO PURPOSES ONLY
        User::create([
            'first_name' => 'Andrew',
            'last_name' => 'Bielecki',
            'team_id' => 3,
            'email' => 'andrew@dwa15.com',
            'password' => bcrypt('testing123'),
            'level' => 1,
        ]);
    }
}
