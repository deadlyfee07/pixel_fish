@extends('layouts.app')

@section('title', 'PIXEL FISH - WIKI')

@section('content')
<header class="mb-margin-lg flex flex-col gap-2">
    <div class="flex items-center gap-4">
        <span class="material-symbols-outlined text-[48px] text-[#97cbff]" style="font-variation-settings: 'FILL' 1;">menu_book</span>
        <h1 class="font-headline-lg text-headline-lg text-[#97cbff] uppercase drop-shadow-[4px_4px_0_rgba(0,0,0,1)]">WIKI DATABANKS</h1>
    </div>
    <p class="text-zinc-300 uppercase tracking-widest text-label-sm">SELECT A CATEGORY TO ACCESS PIXEL WORLD PROTOCOLS...</p>
</header>

<div class="grid grid-cols-1 md:grid-cols-3 gap-8">
    <a href="{{ route('wiki.baits') }}" class="block group">
        <div class="bg-surface border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 hover:-translate-y-2 hover:shadow-[12px_12px_0_0_#000] transition-all border-t-8 border-t-[#97cbff]">
            <div class="w-16 h-16 bg-black border-2 border-outline-variant flex items-center justify-center mb-4 group-hover:border-[#97cbff] transition-colors">
                <span class="material-symbols-outlined text-[32px] text-[#97cbff]">set_meal</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-white uppercase mb-2">BAIT & LURE GUIDE</h2>
            <p class="text-zinc-300 text-label-sm leading-relaxed">Informasi lengkap mengenai target ikan utama dan bonus tangkapan dari setiap jenis umpan.</p>
        </div>
    </a>

    <a href="{{ route('wiki.rods') }}" class="block group">
        <div class="bg-surface border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 hover:-translate-y-2 hover:shadow-[12px_12px_0_0_#000] transition-all border-t-8 border-t-[#a8e040]">
            <div class="w-16 h-16 bg-black border-2 border-outline-variant flex items-center justify-center mb-4 group-hover:border-[#a8e040] transition-colors">
                <span class="material-symbols-outlined text-[32px] text-[#a8e040]">build</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-white uppercase mb-2">ROD UPGRADE PATHS</h2>
            <p class="text-zinc-300 text-label-sm leading-relaxed">Katalog rute peningkatan alat pancing beserta material dan biaya Gem yang dibutuhkan.</p>
        </div>
    </a>

    <a href="{{ route('wiki.ingredients') }}" class="block group">
        <div class="bg-surface border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 hover:-translate-y-2 hover:shadow-[12px_12px_0_0_#000] transition-all border-t-8 border-t-[#ff6b6b]">
            <div class="w-16 h-16 bg-black border-2 border-outline-variant flex items-center justify-center mb-4 group-hover:border-[#ff6b6b] transition-colors">
                <span class="material-symbols-outlined text-[32px] text-[#ff6b6b]">science</span>
            </div>
            <h2 class="font-headline-md text-headline-md text-white uppercase mb-2">INGREDIENTS INDEX</h2>
            <p class="text-zinc-300 text-label-sm leading-relaxed">Daftar material langka yang didapatkan dari proses memancing untuk keperluan crafting.</p>
        </div>
    </a>
</div>

@push('footer')
    @include('layouts.footer')
@endpush
@endsection
