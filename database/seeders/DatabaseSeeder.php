<?php

namespace Database\Seeders;

use App\Models\Cofig;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $cofig = [
            'description'=> 'nulls',
            'host_phone' => '000',
            'host_mail'=>'a',
            'keyword'=>'Aahih'
        ];
        $admin=[
            'name'=>'Adminstrator',
            'role'=>0,
            'email'=>'admin@bizenglish.vn',
            'phone'=>'0904800240',
            'password'=>Hash::make('adminstrator'),
        ];
        $teacher=[
            'name'=>'Giáo viên 01',
            'role'=>1,
            'email'=>'giaovien1@gmail.com',
            'phone'=>'0904800241',
            'password'=>Hash::make('giaovien01'),
        ];
        $user=[
            'name'=>'User 01',
            'role'=>2,
            'email'=>'user01@gmail.com',
            'phone'=>'0904800242',
            'password'=>Hash::make('user01'),
        ];
        $tag=
        Cofig::create($cofig);
        User::create($admin);
        User::create($teacher);
        User::create($user);
    }
}
