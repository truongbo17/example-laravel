<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for ($i = 0; $i < 10; $i++) {
        //     DB::table('author')->insert([
        //         'nickname' => 'truongbo' . $i,
        //         'fullname' => 'Nguyen Quang Truong' . $i,
        //         'email' => 'truongisgay5@gmail.com' . $i,
        //         'address' => 'Thai Binh' . $i,
        //         'phonenumber' => '0368869690' . $i,
        //         'created_at' => date('Y-m-d H:i:s'),
        //         'updated_at' => date('Y-m-d H:i:s')
        //     ]);
        // }

        // DB::table('author')->insert([
        //     'nickname' => 'dieptv',
        //     'fullname' => 'Diep Tran Van',
        //     'email' => 'dieptv@gmail.com',
        //     'address' => 'Nam Dinh',
        //     'phonenumber' => '0987541422',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        DB::table('book')->insert([
            'title' => 'Lap trinh PHP',
            'content' => 'test',
            'price' => 14.3,
            'nxb' => 'Nam Dinh',
            'nickname' => 'dieptv',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

    }
}
