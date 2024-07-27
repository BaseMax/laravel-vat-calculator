<?php

namespace Database\Factories;

use App\Enums\RequestType;
use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;

use function randomDate;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Request>
 */
class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = RequestType::random();
        $typeValue = $type->value;

        $amount = $this->faker->randomFloat(2, 0, 100);
        $vat = rand(0, 100);

        $calculate = calculatorSubmit($amount, $vat, $type);
        $resultVat = $calculate['vat_result'];
        $resultAmount = $calculate['amount_result'];

        return [
            'amount' => $amount,
            'vat' => $vat,
            'vat_result' => $resultVat,
            'amount_result' => $resultAmount,
            'type' => $typeValue,
            'currency_id' => Currency::pluck('id')->random(),
            'created_at' => randomDate(),
        ];
    }
}
