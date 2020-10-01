<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Purchase::factory(5)
            ->hasAttached(
                \App\Models\Pizza::factory()->count(2)->has(\App\Models\Ingredient::factory()->count(3)),
                [
                    'quantity' => random_int(1, 10),
                    'subtotal' => random_int(10, 99.99)
                ]
            )
            ->create();
    }
}
