<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(){
        //make admin
        $admin=[
            'name'=>'Adminstrator',
            'role'=>0,
            'email'=>'admin@bizenglish.vn',
            'phone'=>'0904800240',
            'password'=>Hash::make('adminstrator'),
        ];
       User::create($admin);
        for($i=0;$i<10;$i++){
            $user=[
                'name'=>'Giáo viên '.$i,
                'role'=>1,
                'email'=>'gv'.$i.'@bizenglish.vn',
                'phone'=>'09048002'.$i,
                'password'=>Hash::make('adminstrator'),
            ];
            User::create($user);
        }
    }
}
