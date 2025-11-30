<x-app-layout>
    <div class="max-w-2xl mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        @if(isset($weather))
        <div class="bg-gradient-to-r from-blue-500 to-indigo-500 text-white rounded-2xl p-6 shadow-lg mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold">{{ $weather['name'] }}</h2>
                    <p class="text-lg text-blue-100 capitalize">
                        {{ $weather['weather'][0]['description'] }}
                    </p>
                </div>

                @php
                $condition = $weather['weather'][0]['main'];
                $icons = [
                'Clear' => '☀️',
                'Clouds' => '☁️',
                'Rain' => '🌧️',
                'Thunderstorm' => '⛈️',
                'Drizzle' => '🌦️',
                'Snow' => '❄️',
                'Mist' => '🌫️',
                ];
                $icon = $icons[$condition] ?? '🌥️';
                @endphp

                <div class="text-7xl drop-shadow">{{ $icon }}</div>
            </div>

            <div class="mt-4">
                <div class="text-5xl font-semibold">{{ $weather['main']['temp'] }}°C</div>
                <div class="mt-2 text-blue-100">
                    <p>Humidity: {{ $weather['main']['humidity'] }}%</p>
                    <p>Wind: {{ $weather['wind']['speed'] }} m/s</p>
                </div>
            </div>
        </div>
        @endif

        @if(isset($forecast))
        <div class="mt-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                @foreach ($forecast as $day)
                @php
                $date = \Carbon\Carbon::parse($day['dt_txt'])->format('D, d M');
                $temp = $day['main']['temp'];
                $desc = ucfirst($day['weather'][0]['description']);
                $main = $day['weather'][0]['main'];

                $icons = [
                'Clear' => '☀️',
                'Clouds' => '☁️',
                'Rain' => '🌧️',
                'Thunderstorm' => '⛈️',
                'Drizzle' => '🌦️',
                'Snow' => '❄️',
                'Mist' => '🌫️',
                ];
                $icon = $icons[$main] ?? '🌥️';
                @endphp

                <div class="bg-white shadow rounded-xl p-4 text-center">
                    <div class="text-sm font-semibold">{{ $date }}</div>
                    <div class="text-4xl my-2">{{ $icon }}</div>
                    <div class="text-gray-700">{{ $temp }}°C</div>
                    <div class="text-xs text-gray-500">{{ $desc }}</div>
                </div>
                @endforeach
            </div>
        </div>
        @endif


    </div>
</x-app-layout>