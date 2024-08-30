<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;



class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(30)->create();
        $user = User::firstOrCreate(['email' => 'coder.nilesh0611@gmail.com'], [
            'role_id' => 1,
            'first_name' => 'Yash',
            'last_name' => 'Parmar',
            'phone' => '8200256780',
            'address' => 'Gujrat',
            'zipcode' => '380022',
            'country' => 'India',
            'state' => 'Gujrat',
            'password' => Hash::make('nilesh@123'),
            'is_active' => 1,
        ]);

        $user->assignRole('superadmin');
    }
}
