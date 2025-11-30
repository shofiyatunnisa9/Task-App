<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $city = env('OPENWEATHER_CITY', 'Padang');
        $apiKey = env('OPENWEATHER_API_KEY');
        $units = env('OPENWEATHER_UNITS', 'metric');

        $weather = null;

        // Panggil API OpenWeather
        $response = Http::get('https://api.openweathermap.org/data/2.5/weather', [
            'q' => $city,
            'appid' => $apiKey,
            'units' => $units,
        ]);

        if ($response->successful()) {
            $weather = $response->json();
        }
        // --- Forecast 5 Hari ---
        $forecast = null;

        $forecastResponse = Http::get('https://api.openweathermap.org/data/2.5/forecast', [
            'q' => $city,
            'appid' => $apiKey,
            'units' => $units,
        ]);

        if ($forecastResponse->successful()) {
            $raw = $forecastResponse->json()['list'];

            // Ambil 1 data per hari (jam 12:00)
            $forecast = collect($raw)->filter(function ($item) {
                return str_contains($item['dt_txt'], '12:00:00');
            })->take(5)->values();
        }


        return view('dashboard', compact('weather', 'forecast'));
    }
}
