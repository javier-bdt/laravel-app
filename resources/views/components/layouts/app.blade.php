<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
          @vite('resources/css/app.css')

        <title>{{ $title ?? 'Page Title' }}</title>
    </head>
    <body>
        <nav class="flex flex-1 justify-start gap-4">
            <a href="/" @class(['text-xl' => request()->is('/')])>Home</a>
            <a href="/post" @class(['text-xl' => request()->is('post')])>Posts</a>
            <a href="/counter" @class(['text-xl text-red' => request()->is('counter')])>Counter</a>
        </nav>
        {{ $slot }}
    </body>
</html>
