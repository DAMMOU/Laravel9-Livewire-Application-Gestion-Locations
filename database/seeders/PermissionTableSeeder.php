<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['nom'=> 'Ajouter client'],
            ['nom'=> 'Editer client'],
            ['nom'=> 'Consulter client'],

            ['nom'=> 'Ajouter location'],
            ['nom'=> 'Editer location'],
            ['nom'=> 'Consulter location'],

            ['nom'=> 'Ajouter article'],
            ['nom'=> 'Editer article'],
            ['nom'=> 'Consulter article'],
        ]);
    }
}
