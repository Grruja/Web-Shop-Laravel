<?php

namespace App\Console\Commands;

use App\Models\Exchange_rates;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class Get_currency_value extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_currency_value';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is calling an API to get the current value of currencies';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $currencies = Exchange_rates::AVAILABLE_CURRENCIES;

        foreach ($currencies as $currency) {
            $response = Http::get('https://kurs.resenje.org/api/v1/currencies/'.$currency.'/rates/today');

            $today_currency = Exchange_rates::get_today_currency($currency);

            if($today_currency) {
                continue;
            }
            else {
                Exchange_rates::create([
                    'currency' => $currency,
                    'value' => $response->json()['exchange_middle'],
                ]);
            }
        }
    }
}
