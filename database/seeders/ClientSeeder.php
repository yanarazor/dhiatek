<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = array(
            'nama' => 'Feb UMJ',
            'logo' => 'febumj.png'
        );
        DB::table("clients")->insert($data);
        $data = array(
            'nama' => 'Bappebti',
            'logo' => 'bappebti.png'
        );
        DB::table("clients")->insert($data);
        $data = array(
            'nama' => 'Kemendes',
            'logo' => 'kemendes.png'
        );
        DB::table("clients")->insert($data);
        $data = array(
            'nama' => 'Kemendikbud ristek',
            'logo' => 'kemendikbud.png'
        );
        DB::table("clients")->insert($data);
        $data = array(
            'nama' => 'LIPI',
            'logo' => 'lipi.png'
        );
        DB::table("clients")->insert($data);
        $data = array(
            'nama' => 'UNDP',
            'logo' => 'undp.jpeg'
        );
        DB::table("clients")->insert($data);

        Client::create([
            'nama' => 'Sederhana',
            'logo' => 'sederhana.png'
        ]);
    }
}
