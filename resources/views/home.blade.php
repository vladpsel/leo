<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      class="h-full bg-white dark:bg-gray-900 text-[#1b1b18] dark:text-[#ffffff]">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body
    class="bg-[#FDFDFC] dark:bg-[#0a0a0a] p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col h-full"
>

@dump(auth()->user())

<div class="flex justify-center items-center min-h-screen">
    <div class="w-1/3">
        <form action="{{ route('login') }}" method="post" class="login-form">
            @csrf
            <div class="flex justify-center mb-4">
                <div class="icon w-[85px]">
                    <img src="/build/images/logo.png" alt="">
                </div>
            </div>
            <fieldset class="mb-2">
                <p class="font-bold text-sm mb-1">Login</p>
                <div>
                    <input type="text" class="w-full border-gray-400 rounded-md p-2" placeholder="Email" name="email">
                </div>
            </fieldset>
            @error('email')
            <div class="label -mt-4 mb-2">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
            @enderror
            <fieldset class="mb-2">
                <p class="font-bold text-sm mb-1">Password</p>
                <input type="password" class="w-full border-gray-400 rounded-md p-2" placeholder="Password" name="password">
            </fieldset>
            @error('password')
            <div class="label mb-2">
                <span class="label-text-alt text-error">{{ $message }}</span>
            </div>
            @enderror
            <fieldset>
                <button type="submit"
                        class="w-full bg-indigo-500 hover:bg-indigo-600 text-white rounded-md p-2 cursor-pointer">Login
                </button>
            </fieldset>
        </form>
    </div>
</div>

</body>
</html>
