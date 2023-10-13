<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elastic Insight</title>
    {{-- <link rel="stylesheet" href="{{ asset(mix('app.css', 'vendor/elastic-insight')) }}"> --}}
    <link rel="stylesheet" href="{{ asset('vendor/elastic-insight/app.css') }}">
    @include('elastic-insight::layout.favicon')
    <link href="https://fonts.cdnfonts.com/css/inter" rel="stylesheet">
</head>

<body>
    <main id="app" class="flex min-h-screen">
        <div class="w-2/12 lg:w-2/12 xl:w-2/12">
            @include('elastic-insight::layout.parts.sidebar')
        </div>
        <div class="bg-gray-50 w-10/12 xl:w-10/12 py-3 sm:py-5 px-3 sm:px-5">
            @yield('content')
        </div>
    </main>
    {{-- <script src="{{ asset(mix('app.js', 'vendor/elastic-insight')) }}"></script> --}}
    <script src="{{ asset('vendor/elastic-insight/app.js') }}" defer></script>
</body>

</html>
