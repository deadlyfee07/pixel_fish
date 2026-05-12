<x-guest-layout>
    <div class="text-center">
        <div class="w-16 h-16 mx-auto mb-4 bg-surface-container border-4 border-black flex items-center justify-center shadow-[4px_4px_0_0_#000]">
            <span class="material-symbols-outlined text-4xl text-primary" style="font-variation-settings: 'FILL' 1;">box</span>
        </div>
        <h1 class="font-headline-md text-headline-md text-primary mb-2">NEW PLAYER</h1>
        <h2 class="font-headline-md text-headline-md text-primary">REGISTRATION</h2>
    </div>

    <form method="POST" action="{{ route('register') }}" class="flex flex-col gap-6 mt-6">
        @csrf

        <div class="flex flex-col gap-2">
            <label class="font-label-sm text-label-sm text-on-surface-variant" for="username">USERNAME</label>
            <input name="username" class="bg-surface-container-lowest text-black border-4 border-black p-2 font-body-md text-body-md focus:outline-none focus:border-primary w-full" id="username" placeholder="PLAYER_1" type="text" value="{{ old('username') }}" required autofocus />
            <x-input-error :messages="$errors->get('username')" />
        </div>

        <div class="flex flex-col gap-2">
            <label class="font-label-sm text-label-sm text-on-surface-variant" for="email">EMAIL ADDRESS</label>
            <input name="email" class="bg-surface-container-lowest text-black border-4 border-black p-2 font-body-md text-body-md focus:outline-none focus:border-primary w-full" id="email" placeholder="user@domain.com" type="email" value="{{ old('email') }}" required />
            <x-input-error :messages="$errors->get('email')" />
        </div>

        <div class="flex flex-col gap-2">
            <label class="font-label-sm text-label-sm text-on-surface-variant" for="password">PASSWORD</label>
            <input name="password" class="bg-surface-container-lowest text-black border-4 border-black p-2 font-body-md text-body-md focus:outline-none focus:border-primary w-full" id="password" placeholder="********" type="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" />
        </div>

        <div class="flex flex-col gap-2">
            <label class="font-label-sm text-label-sm text-on-surface-variant" for="password_confirmation">CONFIRM PASSWORD</label>
            <input name="password_confirmation" class="bg-surface-container-lowest text-black border-4 border-black p-2 font-body-md text-body-md focus:outline-none focus:border-primary w-full" id="password_confirmation" placeholder="********" type="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" />
        </div>

        <button type="submit" class="mt-4 bg-primary text-on-primary border-4 border-black py-4 font-headline-md text-headline-md shadow-[4px_4px_0_0_#000] hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] active:translate-y-[4px] active:translate-x-[4px] active:shadow-none transition-all text-center cursor-pointer uppercase">
            CREATE ACCOUNT
        </button>

        <div class="text-center mt-2">
            <a class="font-label-sm text-label-sm text-secondary hover:text-white underline underline-offset-4 decoration-secondary hover:decoration-white" href="{{ route('login') }}">
                ALREADY HAVE AN ACCOUNT? LOGIN HERE
            </a>
        </div>
    </form>
</x-guest-layout>
