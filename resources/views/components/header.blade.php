<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>{{ $_SERVER['DB_DATABASE'] }} | {{ $title }}</title>
</head>
<body class="container mx-auto">
    <header class="bg-green-200">
        <div class="mt-3 flex">
            <div class="h-16 w-16">
                Logo
            </div>
            <div class="flex-grow">
                menubar
            </div>
            <div class="h-16 w-16">
                login
            </div>
        </div>
    </header>


