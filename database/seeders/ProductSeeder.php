<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Xiaomi 12',
                'price' => '$519',
                'description' => 'It has 4G VoLTE for Reliance Jio, Airtel',
                'category' => 'Phone',
                'gallery' => 'https://cdn.dxomark.com/wp-content/uploads/medias/post-112371/Xiaomi-12-Pro-featured-image-packshot-review-1024x691.jpg',
            ],
            [
                'name' => 'Oppo Reno 7',
                'price' => '$320',
                'description' => 'AMOLED, 90Hz, HDR10+, 430 nits (typ), 600 nits (HBM), 800 nits (peak)',
                'category' => 'Phone',
                'gallery' => 'https://fdn.gsmarena.com/imgroot/news/21/11/oppo-reno7-official/-1200/gsmarena_003.jpg',
            ],
            [
                'name' => 'Vivo v21',
                'price' => '$312',
                'description' => '90Hz Refresh Rate,180Hz Touch Sampling Rate, Schott Xensation UP Display Protection',
                'category' => 'Phone',
                'gallery' => 'https://www.notebookcheck.net/uploads/tx_nbc2/4_to_3_Teaser_Vivo_V21_5G.jpg',
            ],
        ]);
    }
}
