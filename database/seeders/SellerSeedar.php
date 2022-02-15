<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Seller;

class SellerSeedar extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seller::factrory(1)->create();
    }
}
