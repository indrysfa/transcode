<?php

use App\Jeniskonten;
use Illuminate\Database\Seeder;

class JeniskontenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jeniskonten = [
            [
                'jenis_konten'  => 'Laravel',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
            [
                'jenis_konten'  => 'Codeigniter',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ];

        Jeniskonten::insert($jeniskonten);
    }
}
