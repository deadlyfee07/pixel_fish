@extends('layouts.app')

@section('title', 'PIXEL FISH - ROD UPGRADE PATHS')

@section('content')
<header class="mb-margin-lg flex flex-col gap-4">
    <a href="{{ route('wiki.index') }}" class="text-white hover:text-[#a8e040] transition-colors flex items-center gap-2 font-label-sm w-fit uppercase bg-surface-container px-4 py-2 border-[2px] border-outline-variant">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span> BACK TO DATABANKS
    </a>
</header>

<section class="border-4 border-black shadow-[8px_8px_0_0_#000] bg-surface-container p-0 overflow-hidden flex flex-col">
    <div class="bg-[#a8e040] text-black p-4 border-b-[4px] border-black flex items-center gap-4">
        <span class="material-symbols-outlined text-[32px] font-bold">build</span>
        <h2 class="font-headline-md text-headline-md uppercase font-bold">ROD UPGRADE PATHS</h2>
    </div>

    <div class="p-4 overflow-x-auto bg-[#121519]">
        <table class="w-full text-left font-body-md border-4 border-black border-collapse bg-surface">
            <thead class="bg-black text-[#a8e040] uppercase text-[10px] tracking-widest">
                <tr>
                    <th class="p-4 border-b-4 border-r-4 border-black w-1/5">ROD NAME</th>
                    <th class="p-4 border-b-4 border-r-4 border-black w-1/5">UPGRADE PATH</th>
                    <th class="p-4 border-b-4 border-r-4 border-black w-2/5">INGREDIENTS REQUIRED</th>
                    <th class="p-4 border-b-4 border-black w-1/5 text-right">GEM COST</th>
                </tr>
            </thead>
            <tbody class="text-[12px] font-bold uppercase">
                @foreach($rods as $rod)
                <tr class="border-b-4 border-black hover:bg-surface-container-high transition-colors">
                    <td class="p-4 border-r-4 border-black text-white">{{ $rod->rod_name }}</td>
                    <td class="p-4 border-r-4 border-black text-[#97cbff]">{{ $rod->upgrade_level }}</td>
                    <td class="p-4 border-r-4 border-black text-zinc-200 leading-relaxed">{{ $rod->requirements }}</td>
                    <td class="p-4 border-black text-yellow-400 text-right text-[14px]">{{ number_format($rod->gem_cost, 0, ',', '.') }} <span class="text-white text-[10px]">G</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

@push('footer')
    @include('layouts.footer')
@endpush
@endsection
