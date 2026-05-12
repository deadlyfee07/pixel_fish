<x-guest-layout>
    @if (session('status'))
        <div class="bg-secondary-container text-on-secondary-container border-4 border-black p-2 text-center font-body-md text-[10px] mb-4">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="space-y-2">
            <label class="font-label-sm text-label-sm text-on-surface block uppercase" for="username">Username:</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline" data-icon="person">person</span>
                <input name="username" class="w-full bg-surface-container-lowest border-[4px] border-black text-on-surface font-body-md text-body-md py-3 pl-10 pr-3 focus:outline-none focus:border-primary placeholder-outline-variant" id="username" placeholder="PLAYER_ONE" type="text" required autofocus />
            </div>
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <div class="space-y-2 mt-4">
            <label class="font-label-sm text-label-sm text-on-surface block uppercase" for="password">Password:</label>
            <div class="relative">
                <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-outline" data-icon="key">key</span>
                <input name="password" class="w-full bg-surface-container-lowest border-[4px] border-black text-on-surface font-body-md text-body-md py-3 pl-10 pr-3 focus:outline-none focus:border-primary placeholder-outline-variant" id="password" placeholder="********" type="password" required />
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="pt-4 space-y-4">
            <button type="submit" class="w-full bg-primary text-on-primary border-[4px] border-black shadow-[4px_4px_0_0_#000] py-4 font-headline-md text-headline-md uppercase hover:bg-primary-fixed hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] active:translate-y-[4px] active:translate-x-[4px] active:shadow-none transition-all flex items-center justify-center gap-2">
                <span class="material-symbols-outlined" data-icon="login">login</span>
                ENTER GAME
            </button>
            <a href="{{ route('register') }}" class="w-full block text-center bg-surface-container-highest text-secondary border-[4px] border-black shadow-[4px_4px_0_0_#000] py-3 font-body-md text-body-md uppercase hover:bg-surface-bright hover:translate-y-[2px] hover:translate-x-[2px] hover:shadow-[2px_2px_0_0_#000] active:translate-y-[4px] active:translate-x-[4px] active:shadow-none transition-all">
                REGISTER NEW ACCOUNT
            </a>
        </div>
    </form>
</x-guest-layout>
