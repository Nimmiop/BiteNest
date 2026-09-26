@props(['title'])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} | {{ $title }}</title>

    @fonts

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
</head>

<body class="w-full h-screen bg-base-300 flex flex-col justify-center items-center">
    <a href="{{ route('home') }}" class="text-3xl font-bold text-center mb-10 text-primary">{{ config('app.name') }}</a>
    <fieldset class="w-full max-w-lg fieldset bg-base-200 border-base-300 rounded-box border p-4">
        <legend class="fieldset-legend">{{ $title }}</legend>
        {{ $slot }}
    </fieldset>
</body>

</html>
