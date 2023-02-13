<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- BootStrap css -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"  rel="stylesheet" />
    </head>
    <body class="antialiased">
        @include('layouts.guest_navigation')
        <div class="min-h-screen bg-gray-100">
            <main>
                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <div class="row g-3 mt-1 justify-content-center justify-content-md-start">
                                    @forelse($plats as $plat)
                                        <div class='col-xl-3 col-lg-4 col-md-6 col-sm-8'>
                                            <div class='card'>
                                                <img src='{{ asset('storage/images/'.$plat->image) }}' class='card-img-top align-self-center'
                                                     style='height: 150px; object-fit: cover'>
                                                <div class='card-body'>
                                                    <h6 class='card-text plat-title'>{{ $plat->title }}</h6>
                                                    <p class='mb-0 plat-description fw-w300'>{{ $plat->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <h4>No Plats Disposable</h4>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
