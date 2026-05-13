<aside class="hidden md:flex bg-zinc-900 dark:bg-zinc-950 font-mono uppercase text-xs font-bold fixed left-0 top-20 flex-col h-[calc(100vh-80px)] w-64 border-r-4 border-black shadow-[4px_0_0_0_#000] z-40 py-4">
    <div class="px-6 py-3 text-zinc-500 tracking-widest text-[9px]">MAIN MENU</div>
    <a class="px-6 py-3 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('wiki.*') && !request()->routeIs('wiki.baits', 'wiki.rods', 'wiki.ingredients') ? 'text-sky-400 bg-zinc-800' : '' }}" href="{{ route('wiki.index') }}">
        <span class="material-symbols-outlined text-[18px]">menu_book</span> WIKI
    </a>
    <a class="px-6 py-3 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('forum.*') ? 'text-sky-400 bg-zinc-800' : '' }}" href="{{ route('forum.index') }}">
        <span class="material-symbols-outlined text-[18px]">forum</span> FORUM
    </a>
    <a class="px-6 py-3 text-white hover:text-sky-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('calculator.*') ? 'text-sky-400 bg-zinc-800' : '' }}" href="{{ route('calculator.index') }}">
        <span class="material-symbols-outlined text-[18px]">calculate</span> CALC
    </a>
    @if(auth()->user()?->role === 'admin')
        <div class="px-6 py-3 text-zinc-500 tracking-widest text-[9px] mt-4">ADMIN</div>
        <a class="px-6 py-3 text-white hover:text-red-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('admin.index') ? 'text-red-400 bg-zinc-800' : '' }}" href="{{ route('admin.index') }}">
            <span class="material-symbols-outlined text-[18px]">admin_panel_settings</span> DASHBOARD
        </a>
        <a class="px-6 py-3 text-white hover:text-red-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('admin.baits*') ? 'text-red-400 bg-zinc-800' : '' }}" href="{{ route('admin.baits') }}">
            <span class="material-symbols-outlined text-[18px]">set_meal</span> BAITS
        </a>
        <a class="px-6 py-3 text-white hover:text-red-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('admin.rods*') ? 'text-red-400 bg-zinc-800' : '' }}" href="{{ route('admin.rods') }}">
            <span class="material-symbols-outlined text-[18px]">build</span> RODS
        </a>
        <a class="px-6 py-3 text-white hover:text-red-400 hover:bg-zinc-800 transition-colors flex items-center gap-3 {{ request()->routeIs('admin.ingredients*') ? 'text-red-400 bg-zinc-800' : '' }}" href="{{ route('admin.ingredients') }}">
            <span class="material-symbols-outlined text-[18px]">science</span> MATERIALS
        </a>
    @endif
</aside>
