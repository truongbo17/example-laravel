<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('routes')
            ->insert([
                'route_name' => 'pos_index',
                'route_title' => 'Pos Ban Hang'
            ]);
        DB::table('routes')
            ->insert([
                'route_name' => 'pos_save',
                'route_title' => 'Luu Don Hang'
            ]);
        DB::table('routes')
            ->insert([
                'route_name' => 'sinhvien_view',
                'route_title' => 'Sinh vien View'
            ]);
        DB::table('routes')
            ->insert([
                'route_name' => 'sinhvien_index',
                'route_title' => 'Sinh vien IndexF'
            ]);
    }
}
