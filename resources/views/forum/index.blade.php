@extends('layouts.app')

@section('title', 'PIXEL FISH - FORUM')

@section('content')
<header class="mb-margin-lg flex flex-col md:flex-row justify-between items-start md:items-center gap-4 border-b-4 border-black pb-4">
    <div class="flex items-center gap-4">
        <span class="material-symbols-outlined text-[36px] md:text-[48px] text-primary">forum</span>
        <h1 class="font-headline-md md:font-headline-lg text-headline-md md:text-headline-lg text-primary uppercase drop-shadow-[4px_4px_0_#000]">STRATEGY TERMINAL</h1>
    </div>
    <a href="{{ route('forum.create') }}" class="bg-secondary text-black font-bold py-3 px-6 border-4 border-black shadow-[4px_4px_0_0_#000] hover:-translate-y-1 transition-all uppercase flex items-center gap-2 text-[10px] w-full md:w-auto justify-center">
        <span class="material-symbols-outlined text-[16px]">add_box</span> NEW LOG
    </a>
</header>

@if(session('status'))
    <div class="bg-primary text-black font-bold p-4 border-4 border-black mb-6 uppercase shadow-[4px_4px_0_0_#000] text-[10px]">
        {{ session('status') === 'sukses' ? 'Log berhasil ditambahkan!' : (session('status') === 'deleted' ? 'Log berhasil dihapus!' : session('status')) }}
    </div>
@endif

<div class="flex flex-col gap-8 max-w-4xl mx-auto">
    @forelse($logs as $log)
        <article class="bg-surface border-4 border-black shadow-[8px_8px_0_0_#000] overflow-hidden relative group">
            <div class="bg-black p-3 md:p-4 flex justify-between items-center">
                <div class="flex items-center gap-3 md:gap-4 min-w-0">
                    <div class="w-8 h-8 md:w-10 md:h-10 bg-surface-container border-2 border-primary flex items-center justify-center shrink-0">
                        <span class="material-symbols-outlined text-primary text-[18px] md:text-[24px]">person</span>
                    </div>
                    <div class="flex flex-col min-w-0">
                        <span class="text-primary font-bold uppercase text-[11px] md:text-body-md truncate">{{ $log->user->username }}</span>
                        <span class="text-zinc-500 text-[9px] md:text-[10px]">{{ $log->created_at->format('d M Y H:i') }}</span>
                    </div>
                </div>

                @if(auth()->user()->role === 'admin' || $log->user_id === auth()->id())
                    <form action="{{ route('forum.destroy', $log) }}" method="POST" onsubmit="return confirm('Hapus postingan ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="text-zinc-500 hover:text-red-500 transition-colors p-1 md:p-2 shrink-0">
                            <span class="material-symbols-outlined text-[18px] md:text-[24px]">delete</span>
                        </button>
                    </form>
                @endif
            </div>

            <div class="p-4 md:p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4 bg-black/30 p-4 border-2 border-black">
                    <div>
                        <span class="text-secondary text-[10px] uppercase font-bold">Bait Used:</span>
                        <p class="text-white font-bold break-words">{{ $log->bait_type }} (x{{ $log->bait_amount }})</p>
                    </div>
                    <div>
                        <span class="text-primary text-[10px] uppercase font-bold">Yield (Fish):</span>
                        <p class="text-white font-bold break-words">{{ $log->fish_caught }}</p>
                    </div>
                </div>
                <div class="mb-4">
                    <span class="text-[#ff6b6b] text-[10px] uppercase font-bold">Yield (Mats):</span>
                    <p class="text-zinc-300 break-words">{{ $log->ingredients ?? 'None' }}</p>
                </div>
                <div class="pt-4 border-t-2 border-dashed border-zinc-700 italic text-white/80 break-words">
                    "{{ $log->notes }}"
                </div>
            </div>
        </article>
    @empty
        <div class="bg-surface-container border-4 border-black p-8 text-center text-zinc-400 uppercase text-[10px]">
            No fishing logs yet. Be the first to cast your line!
        </div>
    @endforelse
</div>

@push('footer')
    @include('layouts.footer')
@endpush
@endsection
