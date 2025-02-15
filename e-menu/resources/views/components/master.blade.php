<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restoran</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>
<body style="background-color: #f0f0f0; color: #333; font-family: Arial, sans-serif; font-size: 16px;">
    <div style="display: flex; height: 100vh;">
        @include('layouts.sidebar')
        
        <div style="width: 100%;">
            <ul class="nav justify-content-end align-items-center" style="background-color: #181818; padding: 0px 20px;">
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="d-flex align-items-center">
                        @csrf
                        <x-primary-button tag="a" class="text-black" 
                                          :href="route('logout')" 
                                          onclick="event.preventDefault(); this.closest('form').submit();" 
                                          style="text-decoration: none; font-size: 12px; padding: 8px 16px; background-color: red; border-radius: 5px;">
                            {{ __('Log Out') }}
                        </x-primary-button>
                    </form>
                </li>
            </ul>
            
            {{-- content --}}
            <div>{{ $slot }}</div>   
        </div>
    </div>
</body>
</html>