@extends('layouts.app')

@section('title', 'PIXEL FISH - INGREDIENTS INDEX')

@section('content')
<header class="mb-margin-lg flex flex-col gap-4">
    <a href="{{ route('wiki.index') }}" class="text-white hover:text-[#ff6b6b] transition-colors flex items-center gap-2 font-label-sm w-fit uppercase bg-surface-container px-4 py-2 border-[2px] border-outline-variant">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span> BACK TO DATABANKS
    </a>
</header>

<section class="border-4 border-black shadow-[8px_8px_0_0_#000] bg-surface-container p-0 overflow-hidden flex flex-col">
    <div class="bg-[#ff6b6b] text-black p-4 border-b-[4px] border-black flex items-center gap-4">
        <span class="material-symbols-outlined text-[32px] font-bold">science</span>
        <h2 class="font-headline-md text-headline-md uppercase font-bold">INGREDIENTS INDEX</h2>
    </div>

    <div class="p-2 md:p-4 overflow-x-auto bg-[#121519]">
        <table class="w-full text-left font-body-md border-4 border-black border-collapse bg-surface">
            <thead class="bg-black text-[#ff6b6b] uppercase text-[9px] md:text-[10px] tracking-widest">
                <tr>
                    <th class="p-2 md:p-4 border-b-4 border-r-4 border-black w-1/3">MATERIAL NAME</th>
                    <th class="p-2 md:p-4 border-b-4 border-black w-2/3">DESCRIPTION / USE CASE</th>
                </tr>
            </thead>
            <tbody class="text-[10px] md:text-[12px] font-bold uppercase">
                @foreach($ingredients as $ingredient)
                <tr class="border-b-4 border-black hover:bg-surface-container-high transition-colors">
                    <td class="p-2 md:p-4 border-r-4 border-black text-[#ff6b6b] text-[11px] md:text-[14px] break-words">{{ $ingredient->ingredient_name }}</td>
                    <td class="p-2 md:p-4 border-black text-white leading-relaxed break-words">{{ $ingredient->description }}</td>
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
