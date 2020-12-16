<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Url Shortener</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body class="antialiased">
    <div id="app" class="mt-10">
        <div class="flex flex-wrap -mx-1 overflow-hidden">
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div class="my-1 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
                <!-- Column Content -->
            </div>

            <div class=" bg-blue-400 my-1 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3 shadow p-6">
                <main-component />
            </div>

            <div class="my-1 px-1 w-full overflow-hidden sm:w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
                <!-- Column Content -->
            </div>

        </div>
    </div>

    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
