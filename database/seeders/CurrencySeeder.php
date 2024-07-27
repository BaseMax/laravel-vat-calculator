<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (Currency::count() !== 0) {
            return;
        }

        $currencies = ['BDT', 'USD', 'EUR', 'GBP', 'JPY', 'CAD', 'AUD', 'CHF', 'CNY', 'INR'];

        collect($currencies)->each(function ($currencyName) {
            Currency::create([
                'name' => $currencyName,
            ]);
        });
    }
}
