@extends('layouts.app')

@section('title', 'PIXEL FISH - MANAGE MATERIALS')

@section('content')
<header class="mb-margin-lg flex flex-col gap-4">
    <a href="{{ route('admin.index') }}" class="text-white hover:text-red-500 transition-colors flex items-center gap-2 font-label-sm w-fit uppercase bg-surface-container px-4 py-2 border-[2px] border-outline-variant">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span> BACK TO ADMIN
    </a>
    <h1 class="font-headline-lg text-headline-lg text-[#ff6b6b] uppercase drop-shadow-[4px_4px_0_rgba(0,0,0,1)] flex items-center gap-4">
        <span class="material-symbols-outlined text-[48px]">science</span> MANAGE MATERIALS
    </h1>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-1">
        <div class="bg-surface border-[4px] border-black shadow-[4px_4px_0_0_#000] md:shadow-[8px_8px_0_0_#000] p-4 md:p-6 sticky top-24">
            <h2 class="text-[#ff6b6b] font-bold uppercase mb-4 flex items-center gap-2 border-b-4 border-black pb-2">
                {{ isset($ingredient) ? 'EDIT MATERIAL' : 'ADD NEW MATERIAL' }}
            </h2>
            <form action="{{ isset($ingredient) ? route('admin.ingredients.update', $ingredient) : route('admin.ingredients.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @if(isset($ingredient)) @method('PUT') @endif

                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Material Name</label>
                    <input type="text" name="ingredient_name" required value="{{ old('ingredient_name', $ingredient->ingredient_name ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Description</label>
                    <textarea name="description" required class="bg-[#121519] border-[4px] border-black p-3 text-white h-32">{{ old('description', $ingredient->description ?? '') }}</textarea>
                </div>
                <button type="submit" name="{{ isset($ingredient) ? 'update_ing' : 'add_ing' }}" class="bg-[#ff6b6b] text-black font-bold border-[4px] border-black py-3 uppercase text-[9px] md:text-[10px]">
                    {{ isset($ingredient) ? 'UPDATE DATA' : 'SAVE MATERIAL' }}
                </button>
            </form>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-surface-container border-[4px] border-black shadow-[8px_8px_0_0_#000] p-4 overflow-x-auto">
            <table class="w-full text-left border-4 border-black border-collapse bg-[#121519]">
                <thead class="bg-black text-[#ff6b6b] uppercase text-[9px] md:text-[10px]">
                    <tr>
                        <th class="p-2 md:p-3 border-b-4 border-r-4 border-black">MATERIAL</th>
                        <th class="p-2 md:p-3 border-b-4 border-black text-center w-20 md:w-24">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="text-[10px] md:text-[12px] font-bold uppercase text-white">
                    @foreach($ingredients as $row)
                    <tr class="border-b-4 border-black">
                        <td class="p-2 md:p-3 border-r-4 border-black text-[#ff6b6b] break-words">{{ $row->ingredient_name }}</td>
                        <td class="p-2 md:p-3 text-center">
                            <div class="flex gap-1 md:gap-2 justify-center">
                                <a href="{{ route('admin.ingredients.edit', $row) }}" class="bg-yellow-400 p-1 md:p-2 border-2 border-black text-black"><span class="material-symbols-outlined text-[14px] md:text-[16px]">edit</span></a>
                                <form action="{{ route('admin.ingredients.destroy', $row) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-600 p-1 md:p-2 border-2 border-black text-white"><span class="material-symbols-outlined text-[14px] md:text-[16px]">delete</span></button>
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

@push('footer')
    @include('layouts.footer')
@endpush
@endsection
