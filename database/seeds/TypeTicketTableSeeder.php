<?php

use Illuminate\Database\Seeder;

class TypeTicketTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('type_tickets')->delete();

        \DB::table('type_tickets')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'По времени',
                    'price' => 100,
                ),
            1=>array(
                'id'=>2,
                'name'=>'По количеству',
                'price'=>200
            ),
            2=>array(
                'id'=>3,
                'name'=>'Пробное',
                'price'=>0
    )
        ));
    }
}
