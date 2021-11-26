<?php

use App\Biography;
use Illuminate\Database\Seeder;

class BiographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $biography = [
            [
                'name'          => 'Kang Daniel',
                'age'           => 22,
                'group'         => 'Wanna One',
                'birth_place'   => '',
                'birth_date'    => '1997-07-07',
                'date_debut'    => '2015-08-22',
                'agency'        => 'M-net',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        Biography::insert($biography);
    }
}
