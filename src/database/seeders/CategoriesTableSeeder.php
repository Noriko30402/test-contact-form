<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     DB::table('categories')->insert([
    //         ['id' => 1, 'content' => '商品のお届けについて'],
    //         ['id' => 2, 'content' => '商品の交換について'],
    //         ['id' => 3, 'content' => '商品トラブル'],
    //         ['id' => 4, 'content' => 'ショップへのお問い合わせ'],
    //         ['id' => 5, 'content' => 'その他'],
    //     ]);
    // }



    public function run()
{
    $contents = [
        "商品のお届けについて",
        "商品の交換について",
        "商品トラブル",
        "ショップへのお問い合わせ",
        "その他"
    ];

    foreach ($contents as $content) {
        DB::table('categories')->insert([
            'content' => $content,
        ]);
    }
 }
}
