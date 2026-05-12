<header class="bg-zinc-900 dark:bg-black font-mono uppercase tracking-tighter text-sm docked full-width top-0 border-b-4 border-black shadow-[0_4px_0_0_#000] z-50 flex justify-between items-center w-full px-6 py-4 h-20 max-w-[1440px] fixed mx-auto left-0 right-0">
    <div class="flex items-center gap-6">
        <span class="text-2xl font-black text-sky-500 dark:text-sky-400 italic">PIXEL FISH</span>

        <nav class="hidden md:flex gap-4">
            <a class="{{ request()->routeIs('wiki.*') && !request()->routeIs('wiki.baits', 'wiki.rods', 'wiki.ingredients') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('wiki.index') }}">WIKI</a>
            <a class="{{ request()->routeIs('forum.*') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('forum.index') }}">FORUM</a>
            <a class="{{ request()->routeIs('calculator.*') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('calculator.index') }}">CALCULATOR</a>
            @if(auth()->user()?->role === 'admin')
                <a class="{{ request()->routeIs('admin.*') ? 'text-sky-400 border-b-4 border-sky-400 pb-1' : 'text-white hover:text-sky-400 transition-colors' }}" href="{{ route('admin.index') }}">ADMIN</a>
            @endif
        </nav>
    </div>
    <div class="flex items-center gap-4">
        <span class="text-zinc-400 text-[10px] hidden md:block">{{ auth()->user()->username }}</span>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-zinc-800 text-sky-500 border-2 border-black px-4 py-2 hover:bg-zinc-800 hover:shadow-[2px_2px_0_0_#000] transition-all active:translate-y-1 active:shadow-none font-mono uppercase text-[10px]">LOGOUT</button>
        </form>
    </div>
</header>
