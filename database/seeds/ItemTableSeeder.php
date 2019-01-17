<?php

use Illuminate\Database\Seeder;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item')->insert([
            [
                'name'       => 'プリン',
                'price'      => 300,
            ],
            [
                'name'       => 'オムライス',
                'price'      => 800,
            ],
            [
                'name'       => 'マヨネーズ',
                'price'      => 750,
            ],
            [
                'name'       => 'シフォンケーキ',
                'price'      => 400,
            ],
            [
                'name'       => 'チーズプリン',
                'price'      => 300,
            ],
            [
                'name'       => 'コーヒー',
                'price'      => 300,
            ]
        ]);
    }
}
