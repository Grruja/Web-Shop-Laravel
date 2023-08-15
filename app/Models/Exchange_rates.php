<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exchange_rates extends Model
{
    const CURRENCY_USD = 'usd';
    const CURRENCY_EUR = 'eur';
    const CURRENCY_RUB = 'rub';

    const AVAILABLE_CURRENCIES = [
        self::CURRENCY_USD,
        self::CURRENCY_EUR,
        self::CURRENCY_RUB,
    ];

    protected $table = 'exchange_rates';

    protected $fillable = [
        'currency', 'value',
    ];

    public static function get_today_currency($currency) {
        return self::where('currency', $currency)
            ->whereDate('created_at', Carbon::now())
            ->first();
    }
}
