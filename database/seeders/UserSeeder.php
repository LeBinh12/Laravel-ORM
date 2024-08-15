<?php

namespace Database\Seeders;

use App\Models\UserPhone;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new UserPhone();
        $user->name = 'user 1';
        $user->email = 'user@example.com';
        $user->password = Hash::make('123456');
        $user->save();


    }
}
