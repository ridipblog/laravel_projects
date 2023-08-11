<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>

    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                @endif
            @endauth
        </div>
    @endif
    <div style="width:100%;color:red;">
        @if (Route::has('admin.login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth('admin')
                    <a href="{{ url('admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin
                        Dashboard</a>
                @else
                    <a href="{{ route('admin.login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Admin
                        Log
                        in</a>

                    @if (Route::has('admin.register'))
                        <a href="{{ route('admin.register') }}"
                            class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Admin Register</a>
                    @endif
                @endauth
            </div>
        @endif
</body>

</html>
