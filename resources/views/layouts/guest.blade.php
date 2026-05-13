<!DOCTYPE html>
<html class="dark" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PIXEL FISH</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-on-background font-body-md text-body-md min-h-screen flex flex-col items-center justify-center p-4">
    <main class="w-full max-w-4xl bg-surface-container border-[4px] border-black shadow-[4px_4px_0_0_#000] md:shadow-[8px_8px_0_0_#000] p-4 md:p-8 flex flex-col md:flex-row gap-4 md:gap-8 mx-auto mt-4 md:mt-20 relative overflow-hidden">
        <div class="absolute top-2 left-2 w-2 h-2 bg-black"></div>
        <div class="absolute top-2 right-2 w-2 h-2 bg-black"></div>
        <div class="absolute bottom-2 left-2 w-2 h-2 bg-black"></div>
        <div class="absolute bottom-2 right-2 w-2 h-2 bg-black"></div>

        <div class="flex-1 flex flex-col items-center justify-center space-y-6 md:space-y-8 text-center border-b-4 border-black pb-8 md:border-b-0 md:border-r-4 md:pr-8 md:pb-0">
            <div class="relative w-36 h-36 md:w-64 md:h-64 mb-2 md:mb-4 border-[4px] border-black shadow-[4px_4px_0_0_#000] bg-surface-container-high overflow-hidden">
                <img alt="Pixel Art Fish Logo" class="w-full h-full object-cover pixelated opacity-80" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCG-HNeqsUKIIElLUTgeoi29k6Izezy8AlwGLPa3HWQF2dSusrRiQXgjv-cw3MqlCCWiMIDf3WIv64ReQPtiob2zTq-BdQkiCXbxW6FNPuOTC_Rs4tejsCUsmEdCdAntz8A6Yo_aaCOmFWnrxFghSmaT_sup-2pmny9O6pU-OczqsbsRxdN9q7jjWch6Lk32SjXZs9GHjADWG8NSWUTMQBipdYUJqy-RVcO275mwtVgUlFnYv7Cxf5XWvzxFdH7amzk8JDt52rOk8VB"/>
                <div class="absolute inset-0 bg-primary/20 mix-blend-overlay"></div>
            </div>
            <h1 class="font-headline-md md:font-headline-lg text-headline-md md:text-headline-lg text-primary tracking-widest drop-shadow-[2px_2px_0_rgba(0,0,0,1)] uppercase">PIXEL FISH</h1>
            <div class="border-[4px] border-outline-variant bg-surface-variant p-3 md:p-4 shadow-[4px_4px_0_0_#000] relative">
                <span class="material-symbols-outlined absolute -top-4 -left-4 text-tertiary bg-black rounded-full p-1 border-2 border-tertiary" data-icon="water_drop">water_drop</span>
                <p class="font-body-md text-body-md text-on-surface-variant leading-relaxed text-left">
                    Welcome to the ultimate retro fishing simulator. Cast your line into the digital depths, collect rare 8-bit species, and climb the global leaderboards. Adventure awaits in the pixelated seas.
                </p>
                <div class="absolute bottom-1 right-1 text-primary">
                    <span class="material-symbols-outlined animate-bounce text-sm" data-icon="arrow_drop_down">arrow_drop_down</span>
                </div>
            </div>
        </div>

        <div class="flex-1 flex flex-col justify-center max-w-sm w-full mx-auto">
            <div class="bg-surface border-[4px] border-black shadow-[4px_4px_0_0_#000] p-6 space-y-6 relative">
                <h2 class="font-headline-md text-headline-md text-secondary border-b-4 border-black pb-4 text-center">PLAYER LOGIN</h2>

                @if ($errors->any())
                    <div class="bg-error-container text-on-error-container border-4 border-black p-2 text-center font-body-md text-[10px]">
                        {{ $errors->first('username') ? 'Username or password incorrect!' : '' }}
                    </div>
                @endif

                @if (session('status'))
                    <div class="bg-secondary-container text-on-secondary-container border-4 border-black p-2 text-center font-body-md text-[10px]">
                        {{ session('status') }}
                    </div>
                @endif

                {{ $slot }}
            </div>
        </div>
    </main>

    <footer class="w-full py-8 px-6 flex flex-col justify-center items-center gap-4 mt-8 opacity-60">
        <p class="font-label-sm text-label-sm text-outline uppercase tracking-widest text-center">© 1987 PIXEL FISHING COMMUNITY - ALL BITS RESERVED</p>
    </footer>

    <style>
        .pixelated { image-rendering: pixelated; }
    </style>
</body>
</html>
