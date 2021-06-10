<?php


namespace Database\Seeders;


use App\Models\Option;
use Illuminate\Database\Seeder;

class OptionSeeder extends Seeder
{
    public function run(){
        for($i=2;$i<=8;$i++){
            $option =[
                'id'=>9990+$i,
                'name'=> ($i<8)?"Thứ ".$i:"Chủ nhật",
                'type'=>5,
            ];
            Option::create($option);
        }
        $vn=[
            'id'=>10001,
            'name'=>'GV Việt Nam',
            'type'=>2
        ];
        Option::create($vn);

        $pl=[
            'id'=>10002,
            'name'=>'GV Philippine',
            'type'=>2
        ];
        Option::create($pl);

        $us=[
            'id'=>10003,
            'name'=>'GV Bản xứ',
            'type'=>2
        ];
        Option::create($us);

    }
}
