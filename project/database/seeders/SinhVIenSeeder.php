<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SinhVIenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('sinhvien')->insert([
                'rollno' => 'R00' . $i,
                'fullname' => 'Sinh Vien ' . $i,
                'email' => $i . "sv@gmail.com",
                'address' => 'HUBT ' . $i,
                'birthday' => '2021-11-26',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        DB::table('lichtrinh')->insert([
            'subject_name' => 'Lap trinh Laravel',
            'teacher_name' => 'Diep Tran Van',
            'farmetime' => 0,
            'starttime' => 13.5,
            'endtime' => 17.5,
            'startdate' => '2020-06-01',
            'enddate' => '2020-07-06',
            'note' => 'hoc buoi chieu 2,4,6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('lichtrinh')->insert([
            'subject_name' => 'Lap trinh MySQL',
            'teacher_name' => 'Diep Tran Van',
            'farmetime' => 0,
            'starttime' => 8,
            'endtime' => 12,
            'startdate' => '2020-06-01',
            'enddate' => '2020-07-06',
            'note' => 'hoc buoi sáng 2,4,6',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
