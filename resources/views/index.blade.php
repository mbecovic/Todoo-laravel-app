<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Todo App - Write down so you dont forget</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body class="bg-gray-900">
        <div id="app" class="lg:w-1/3 lg:mx-auto mx-4 text-white mt-24">
            <to-do></to-do>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
    </body>
</html>
