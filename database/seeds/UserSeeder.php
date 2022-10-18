<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'fname' => 'LGU',
            'mname' => 'Admin', 
            'lname' => 'Aurora',
            'usertype' => 'admin',
            'meternum' => '000',
            'email' => 'admin@aurorazds.gov.ph',
            'password' => Hash::make('password')
        ]);
    }
}
