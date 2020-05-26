<?php

use Illuminate\Database\Seeder;

class MainTitlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('main_titles')->insert([
            
            'main_title' => 'Veliki izbor rabljenih automobila svih kategorija. Svakodnevno pratimo kretanja na tržištu u svrhu poboljšanja naših usluga.',        
        
    ]);
    }
}
