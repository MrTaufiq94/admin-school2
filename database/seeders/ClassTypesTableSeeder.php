<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('class_types')->delete();

        $data = [
            ['name' => 'Pra Sekolah', 'code' => 'PS'],
            ['name' => 'Sekolah Rendah', 'code' => 'SR'],
            ['name' => 'Menengah Rendah', 'code' => 'MR'],
            ['name' => 'Menengah Atas', 'code' => 'MA'],
            ['name' => 'Pra Universiti', 'code' => 'PU'],
            ['name' => 'Pendidikan Khas', 'code' => 'PK'],
        ];

        DB::table('class_types')->insert($data);
    }
}
