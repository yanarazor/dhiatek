<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortopolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tables = "portopolios";
        //
        $data = array(
            'nama_project' => 'Project App 1',
            'tag' => 'app',
            'image_preview' => 'portfolio-1.jpg'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama_project' => 'Project App 1',
            'tag' => 'app',
            'image_preview' => 'portfolio-2.jpg'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama_project' => 'Project Card 3',
            'tag' => 'card',
            'image_preview' => 'portfolio-3.jpg'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama_project' => 'Project Card 4',
            'tag' => 'card',
            'image_preview' => 'portfolio-4.jpg'
        );
        DB::table($tables)->insert($data);
        $data = array(
            'nama_project' => 'Project Web 5',
            'tag' => 'web',
            'image_preview' => 'portfolio-5.jpg'
        );
        DB::table($tables)->insert($data);
    }
}
