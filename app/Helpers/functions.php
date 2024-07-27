<?php

use App\Enums\RequestType;
use App\Models\User;
use Carbon\Carbon;
use Faker\Factory as FakerFactory;
use Stevebauman\Location\Facades\Location;

/**
 * Calculate VAT and result amount based on the given parameters.
 *
 * @param  int  $amount  The initial amount
 * @param  int  $vat  The VAT rate
 * @param  RequestType  $type  The type of request (ADD or EXCLUDE)
 * @return array An array containing the calculated VAT and result amount
 */
function calculatorSubmit(int $amount, int $vat, RequestType $type): array
{
    $result = 0;
    $vatResult = 0;
    $resultAmount = 0;

    if ($type->equals(RequestType::EXCLUDE())) {
        $result = $amount - $amount / (1 + $vat / 100);
        $vatResult = $result;
        $resultAmount = ($amount - $result);
    } elseif ($type->equals(RequestType::ADD())) {
        $result = $amount * (1 + $vat / 100);
        $vatResult = $result - $amount;
        $resultAmount = ($amount + $vatResult);
    }

    return ['vat_result' => $vatResult, 'amount_result' => $resultAmount];
}

/**
 * Get the URL of the user's profile image, or default image if not available.
 *
 * @param  User  $user  The user object
 * @return string The URL of the user's profile image
 */
function getImageProfile(int $userId): string
{
    $user = User::select('id', 'image')->find($userId);

    return $user ? ($user->hasMedia('image') ? $user->getFirstMediaUrl('image') : 'assets/img/default-image.webp') : '';
}

/**
 * Format the creation date in a human-readable format (e.g., "2 days ago").
 *
 * @param  string  $createdAt  The creation date to be formatted
 * @return string The formatted creation date
 */
function formatCreatedAt(string $createdAt): string
{
    return Carbon::parse($createdAt)->diffForHumans();
}

/**
 * Check if the given date and time is today.
 *
 * @param  string  $created_at  The date and time string to check
 * @return bool True if the date and time is today, false otherwise
 */
function isDateTimeToday(string $created_at): string
{
    return Carbon::parse(
        $created_at,
    )->isToday();
}

/**
 * Generate a random date and time between 90 days ago and now.
 *
 * @return string The formatted date and time string
 */
function randomDate(): string
{
    $faker = FakerFactory::create();

    return $faker->dateTimeBetween('-90 days', 'now')->format('Y-m-d H:i:s');
}

/**
 * Get the country code based on the provided IP address.
 *
 * @param  string  $ip  The IP address
 * @return string|null The country code, or null if not found
 */
function getCountryCode(string $ip): ?string
{
    if ($ip === '') {
        return null;
    }

    $currentUserInfo = Location::get($ip);

    $ipCountry = $currentUserInfo?->countryCode ?? '';
    $ipCountry = $ipCountry !== '' ? $ipCountry : null;

    return $ipCountry;
}
