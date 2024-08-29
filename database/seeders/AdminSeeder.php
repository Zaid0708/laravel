<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {


        $adminRoleId = \DB::table('roles')->where('name', 'admin')->first()->id;

        User::create([
            'name' => 'abo sbeah',
            'email' => 'yazan@gmail.com',
            'phone_number' => '1234567891',
            'password' => Hash::make('12341234'), // Replace with a strong password
            'role_id' => $adminRoleId,
        ]);
    }
}

