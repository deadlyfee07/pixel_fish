@extends('layouts.app')

@section('title', 'PIXEL FISH - MANAGE BAITS')

@section('content')
<header class="mb-margin-lg flex flex-col gap-4">
    <a href="{{ route('admin.index') }}" class="text-white hover:text-red-500 transition-colors flex items-center gap-2 font-label-sm w-fit uppercase bg-surface-container px-4 py-2 border-[2px] border-outline-variant">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span> BACK TO ADMIN TERMINAL
    </a>
    <h1 class="font-headline-lg text-headline-lg text-[#97cbff] uppercase drop-shadow-[4px_4px_0_rgba(0,0,0,1)] flex items-center gap-4">
        <span class="material-symbols-outlined text-[48px]">settings_suggest</span> MANAGE BAITS
    </h1>
</header>

@if(session('status'))
    <div class="bg-primary text-black font-bold p-4 border-4 border-black mb-6 uppercase shadow-[4px_4px_0_0_#000] text-[10px]">
        @if(session('status') === 'added') New bait data injected successfully!
        @elseif(session('status') === 'deleted') Bait data deleted from databanks!
        @elseif(session('status') === 'updated') Bait data updated successfully!
        @endif
    </div>
@endif

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-1">
        <div class="bg-surface border-[4px] border-black {{ isset($bait) ? 'border-t-8 border-t-yellow-400' : '' }} shadow-[4px_4px_0_0_#000] md:shadow-[8px_8px_0_0_#000] p-4 md:p-6 sticky top-24 transition-all">
            <h2 class="text-[#97cbff] font-bold uppercase mb-4 flex items-center gap-2 border-b-4 border-black pb-2">
                @if(isset($bait))
                    <span class="material-symbols-outlined text-yellow-400">edit_square</span> <span class="text-yellow-400">EDIT BAIT DATA</span>
                @else
                    <span class="material-symbols-outlined">add_circle</span> ADD NEW BAIT
                @endif
            </h2>

            <form action="{{ isset($bait) ? route('admin.baits.update', $bait) : route('admin.baits.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @if(isset($bait)) @method('PUT') @endif

                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Item Name</label>
                    <input type="text" name="item_name" required value="{{ old('item_name', $bait->item_name ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white focus:border-[#97cbff] outline-none">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Main Target</label>
                    <input type="text" name="main_target" required placeholder="e.g. Herring (Good)" value="{{ old('main_target', $bait->main_target ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white focus:border-[#97cbff] outline-none">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Bonus Target</label>
                    <input type="text" name="bonus_target" required placeholder="e.g. Ingredients" value="{{ old('bonus_target', $bait->bonus_target ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white focus:border-[#97cbff] outline-none">
                </div>

                @if(isset($bait))
                    <div class="flex gap-2 mt-2">
                        <button type="submit" class="flex-1 bg-yellow-400 text-black font-bold border-[4px] border-black py-3 uppercase hover:-translate-y-1 hover:shadow-[4px_4px_0_0_#000] transition-all text-[9px] md:text-[10px]">UPDATE DATA</button>
                        <a href="{{ route('admin.baits') }}" class="bg-surface-container-high text-white font-bold border-[4px] border-black py-3 px-3 md:px-4 uppercase hover:bg-white hover:text-black transition-colors flex items-center justify-center text-[9px] md:text-[10px]">CANCEL</a>
                    </div>
                @else
                    <button type="submit" class="mt-2 bg-[#97cbff] text-black font-bold border-[4px] border-black py-3 uppercase hover:-translate-y-1 hover:shadow-[4px_4px_0_0_#000] transition-all text-[9px] md:text-[10px]">SAVE TO DATABANKS</button>
                @endif
            </form>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-surface-container border-[4px] border-black shadow-[8px_8px_0_0_#000] overflow-hidden">
            <div class="p-4 overflow-x-auto">
                <table class="w-full text-left font-body-md border-4 border-black border-collapse bg-[#121519]">
                    <thead class="bg-black text-[#97cbff] uppercase text-[9px] md:text-[10px] tracking-widest">
                        <tr>
                            <th class="p-2 md:p-3 border-b-4 border-r-4 border-black">ITEM</th>
                            <th class="p-2 md:p-3 border-b-4 border-r-4 border-black">TARGETS</th>
                            <th class="p-2 md:p-3 border-b-4 border-black text-center w-20 md:w-24">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody class="text-[10px] md:text-[12px] font-bold uppercase">
                        @foreach($baits as $row)
                        <tr class="border-b-4 border-black hover:bg-surface-container-high transition-colors">
                            <td class="p-2 md:p-3 border-r-4 border-black text-[#97cbff] break-words">{{ $row->item_name }}</td>
                            <td class="p-2 md:p-3 border-r-4 border-black">
                                <div class="text-white break-words">{{ $row->main_target }}</div>
                                <div class="text-zinc-500 text-[8px] md:text-[9px] mt-1">Bonus: {{ $row->bonus_target }}</div>
                            </td>
                            <td class="p-2 md:p-3 text-center">
                                <div class="flex items-center justify-center gap-1 md:gap-2">
                                    <a href="{{ route('admin.baits.edit', $row) }}" class="inline-block bg-yellow-400 text-black px-1 md:px-2 py-1 border-2 border-black hover:scale-110 transition-transform" title="Edit">
                                        <span class="material-symbols-outlined text-[14px] md:text-[16px] block">edit</span>
                                    </a>
                                    <form action="{{ route('admin.baits.destroy', $row) }}" method="POST" onsubmit="return confirm('WARNING: Are you sure you want to delete {{ $row->item_name }}?');">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="inline-block bg-red-600 text-white px-1 md:px-2 py-1 border-2 border-black hover:scale-110 transition-transform" title="Delete">
                                            <span class="material-symbols-outlined text-[14px] md:text-[16px] block">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('footer')
    @include('layouts.footer')
@endpush
@endsection
