<?php

namespace Database\Seeders;

use App\Models\Languages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('language_list')->insert([
          'name' => 'tamil',
        ]);

        DB::table('language_list')->insert([
            'name' => 'english',
        ]);

        DB::table('language_list')->insert([
            'name' => 'hindi',
        ]);

        DB::table('language_list')->insert([
            'name' => 'malayalam',
        ]);

    }
}
