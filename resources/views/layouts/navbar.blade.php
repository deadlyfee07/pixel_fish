<header x-data="{ mobileOpen: false }" class="bg-zinc-900 dark:bg-black font-mono uppercase tracking-tighter text-sm docked full-width top-0 border-b-4 border-black shadow-[0_4px_0_0_#000] z-50 flex justify-between items-center w-full px-4 md:px-6 py-4 h-20 max-w-[1440px] fixed mx-auto left-0 right-0">
    <div class="flex items-center gap-4 md:gap-6">
        <span class="text-xl md:text-2xl font-black text-sky-500 dark:text-sky-400 italic truncate max-w-[140px] md:max-w-none">PIXEL FISH</span>

        <nav class="hidden md:flex gap-4">
            <a class="{{ request()->routeIs('wiki.*') && !request()->routeIs('wiki.baits', 'wiki.rods', 'wiki.ingredients') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('wiki.index') }}">WIKI</a>
            <a class="{{ request()->routeIs('forum.*') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('forum.index') }}">FORUM</a>
            <a class="{{ request()->routeIs('calculator.*') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('calculator.index') }}">CALCULATOR</a>
            @if(auth()->user()?->role === 'admin')
                <a class="{{ request()->routeIs('admin.*') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('admin.index') }}">ADMIN</a>
            @endif
        </nav>
    </div>

    <div class="flex items-center gap-2 md:gap-4">
        <span class="text-zinc-400 text-[10px] hidden md:block">{{ auth()->user()->username }}</span>

        <button @click="mobileOpen = !mobileOpen" class="md:hidden flex items-center justify-center p-2 text-white hover:text-sky-400 transition-colors">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path x-show="!mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path x-show="mobileOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-zinc-800 text-sky-500 border-2 border-black px-3 md:px-4 py-2 hover:shadow-[2px_2px_0_0_#000] transition-all active:translate-y-1 active:shadow-none font-mono uppercase text-[9px] md:text-[10px]">LOGOUT</button>
        </form>
    </div>

    <div x-cloak x-show="mobileOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2" class="md:hidden fixed top-20 left-0 right-0 bg-zinc-900 dark:bg-black border-b-4 border-black shadow-[0_4px_0_0_#000] z-50 flex flex-col">
        <a class="px-6 py-4 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors border-b-2 border-zinc-800 {{ request()->routeIs('wiki.*') && !request()->routeIs('wiki.baits', 'wiki.rods', 'wiki.ingredients') ? 'text-sky-400' : '' }}" href="{{ route('wiki.index') }}" @click="mobileOpen = false">WIKI</a>
        <a class="px-6 py-4 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors border-b-2 border-zinc-800 {{ request()->routeIs('forum.*') ? 'text-sky-400' : '' }}" href="{{ route('forum.index') }}" @click="mobileOpen = false">FORUM</a>
        <a class="px-6 py-4 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors border-b-2 border-zinc-800 {{ request()->routeIs('calculator.*') ? 'text-sky-400' : '' }}" href="{{ route('calculator.index') }}" @click="mobileOpen = false">CALCULATOR</a>
        @if(auth()->user()?->role === 'admin')
            <a class="px-6 py-4 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors border-b-2 border-zinc-800 {{ request()->routeIs('admin.*') ? 'text-sky-400' : '' }}" href="{{ route('admin.index') }}" @click="mobileOpen = false">ADMIN</a>
        @endif
        <div class="px-6 py-4 text-zinc-500 text-[10px] border-b-2 border-zinc-800">{{ auth()->user()->username }}</div>
    </div>
</header>
