<?php

use Illuminate\Database\Seeder;

class TranscriptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['ten_mon_hoc'=>'Toán','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Lý','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Hóa','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Sinh','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Văn','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Sử','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Địa','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Công dân','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Tiếng anh','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Công nghệ','id_class'=>random_int(1,9)],
            ['ten_mon_hoc'=>'Thể dục','id_class'=>random_int(1,9)],
        ];
        DB::table('transcripts')->insert($data);
    }
}
