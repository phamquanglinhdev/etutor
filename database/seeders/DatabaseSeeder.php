<?php

namespace Database\Seeders;

use App\Models\Cofig;
use App\Models\Option;
use App\Models\Option_Teacher;
use App\Models\Prolife;
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
        $this->call([
            ConfigSeeder::class,
            UserSeeder::class,
            ProlifeSeeder::class,
            OptionSeeder::class,
        ]);
//        $cofig = [
//            'description'=> 'nulls',
//            'host_phone' => '000',
//            'host_mail'=>'a',
//            'keyword'=>'Aahih'
//        ];
//        $teacher=[
//            'name'=>'Giáo viên 01',
//            'role'=>1,
//            'email'=>'giaovien1@gmail.com',
//            'phone'=>'0904800241',
//            'password'=>Hash::make('giaovien01'),
//        ];
//        $user=[
//            'name'=>'User 01',
//            'role'=>2,
//            'email'=>'user01@gmail.com',
//            'phone'=>'0904800242',
//            'password'=>Hash::make('user01'),
//        ];
////        for ($i=2;$i<=7;$i++){
////            $option=[
////                'id'=>9990+$i,
////                'name'=>'Thứ '.$i,
////                'type'=>5
////            ];
////            Option::create($option);
//////        }
////        $option=[
////            'id'=>9998,
////            'name'=>'Chủ nhật',
////            'type'=>5
////        ];
////        for($i=4;$i<=19;$i++){
////            $user = [
////                'id' =>$i,
////                'name'=>'Giáo Viên Test '.$i,
////                'role'=>1,
////                'email'=>'user0'.$i.'@gmail.com',
////                'phone'=>'09048002'.$i,
////                'password'=>Hash::make('password'),
////            ];
////            User::create($user);
////            $prolife = [
////                'user_id'=>$i,
////                'level'=>'Test data',
////                'national' => rand(0,2),
////                'teaching'=>'Test table',
////            ];
////            Prolife::create($prolife);
////        }
//        for($i=0;$i<=100;$i++){
//            $pivot = [
//                'teacher_id'=>rand(4,20),
//                'option_id'=>rand(9992,10016)
//            ];
//            Option_Teacher::create($pivot);
//        }
//        Option::create($option);
//        Cofig::create($cofig);
//        User::create($admin);
//        User::create($teacher);
//        User::create($user);
    }
}
