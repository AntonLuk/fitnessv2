<?php

use Illuminate\Database\Seeder;

class GendersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('genders')->delete();

        \DB::table('genders')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Мужской',

                ),
            1=>array(
                'id'=>2,
                'name'=>'Женский',

            ),

        ));
    }
}
