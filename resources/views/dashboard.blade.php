<x-app-layout>
    <div class="max-w-2xl mx-auto mt-6">
        <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
        @if(isset($weather))
        @php
        $hour = now()->format('H');
        $isNight = $hour >= 18 || $hour < 6;

            // Background otomatis siang/malam
            $bg=$isNight
            ? 'from-purple-700/60 to-indigo-800/60'
            : 'from-blue-400/60 to-cyan-300/60' ;

            // Icon animasi premium
            $condition=$weather['weather'][0]['main'];
            $icons=[ 'Clear'=> '☀️',
            'Clouds' => '☁️',
            'Rain' => '🌧️',
            'Thunderstorm' => '⛈️',
            'Drizzle' => '🌦️',
            'Snow' => '❄️',
            'Mist' => '🌫️',
            ];
            $icon = $icons[$condition] ?? '🌥️';
            @endphp

            <div class="relative overflow-hidden rounded-3xl shadow-2xl mb-10 
            bg-gradient-to-br {{ $bg }} 
            backdrop-blur-xl p-8 text-white">

                {{-- Decorative Glow --}}
                <div class="absolute inset-0 bg-white/10 blur-2xl opacity-20"></div>

                <div class="relative flex justify-between items-center">
                    <div>
                        <h2 class="text-3xl font-bold drop-shadow-sm">
                            {{ $weather['name'] }}
                        </h2>
                        <p class="text-blue-100 text-lg capitalize">
                            {{ $weather['weather'][0]['description'] }}
                        </p>
                    </div>

                    {{-- Animated Icon --}}
                    <div class="text-7xl animate-bounce-slow">
                        {{ $icon }}
                    </div>
                </div>

                <div class="relative mt-6 flex items-center gap-8">
                    <div class="text-6xl font-semibold tracking-tight drop-shadow-lg">
                        {{ $weather['main']['temp'] }}°C
                    </div>

                    <div class="text-blue-100">
                        <p>💧 Humidity: {{ $weather['main']['humidity'] }}%</p>
                        <p>💨 Wind: {{ $weather['wind']['speed'] }} m/s</p>
                    </div>
                </div>
            </div>

            {{-- Slow Bounce Animation --}}
            <style>
                .animate-bounce-slow {
                    animation: bounce 3s infinite ease-in-out;
                }
            </style>
            @endif


            @if(isset($forecast))
            <div>

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

                    <div class="backdrop-blur-xl bg-white/30 rounded-2xl shadow-xl 
                    p-5 text-center border border-white/20">

                        <div class="text-lg font-semibold">{{ $date }}</div>

                        <div class="text-5xl my-2 animate-bounce-slow">
                            {{ $icon }}
                        </div>

                        <div class="text-gray-800 text-xl font-semibold">
                            {{ $temp }}°C
                        </div>

                        <div class="text-sm text-gray-600">
                            {{ $desc }}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif



    </div>
</x-app-layout>