<?php


namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use App\Models\Cofig;

class ConfigSeeder extends Seeder
{
    public function run(){
        $config=[
            'host_mail'=>'admin@bizenglish.com',
            'host_phone'=>'00000000000',
            'description'=>'Bizenglish for success',
            'keyword'=>'bizenglish,tieng anh,hoc tieng anh',
        ];
       Cofig::create($config);
    }
}
