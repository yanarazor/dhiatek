<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tables = "teams";
        //
        $data = array(
            'nama' => 'Yana Mardiyana',
            'jabatan' => 'Chief Executive Officer',
            'foto' => 'yana.png'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama' => 'Farham Harvianto',
            'jabatan' => 'Web Programmer',
            'foto' => 'aam.png'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama' => 'Iskandar Idris',
            'jabatan' => 'Mobile Programmer',
            'foto' => 'iskandar.png'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama' => 'Akbar Muchbarak',
            'jabatan' => 'Web Programmer',
            'foto' => 'akbar.png'
        );
        DB::table($tables)->insert($data);
        
    }
}
