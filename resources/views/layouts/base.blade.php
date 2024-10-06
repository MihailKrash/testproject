<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" href="/bootstrap502dist/css/bootstrap.css"> -->
        <title>@yield('page.title', 'Города поселки ЖК интересные места для жизни путешествия и отдыха в России')</title>
        <meta name="description" content="@yield('description', '')" />
        <meta name="keywords" content="@yield('keywords', '')" />
        @once('css')
            <link rel="stylesheet" href="/css/main.css">
        @endonce      
    </head>
    <body>

        <div class="d-flex flex-column justify-content-between min-vh-100 text-center">
            @include("includes.header")
            <main id="mainContentDiv" class="flex-grow-1">
                @yield('content')
            </main>
            @include("includes.footer")
        </div>
        <!-- <script src="/bootstrap502dist/js/bootstrap.js"></script> -->
    </body>
</html>