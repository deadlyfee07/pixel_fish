@extends('layouts.app')

@section('title', 'PIXEL FISH - MANAGE RODS')

@section('content')
<header class="mb-margin-lg flex flex-col gap-4">
    <a href="{{ route('admin.index') }}" class="text-white hover:text-red-500 transition-colors flex items-center gap-2 font-label-sm w-fit uppercase bg-surface-container px-4 py-2 border-[2px] border-outline-variant">
        <span class="material-symbols-outlined text-[16px]">arrow_back</span> BACK TO ADMIN
    </a>
    <h1 class="font-headline-lg text-headline-lg text-[#a8e040] uppercase drop-shadow-[4px_4px_0_rgba(0,0,0,1)] flex items-center gap-4">
        <span class="material-symbols-outlined text-[48px]">build</span> MANAGE RODS
    </h1>
</header>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <div class="lg:col-span-1">
        <div class="bg-surface border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 sticky top-24">
            <h2 class="text-[#a8e040] font-bold uppercase mb-4 flex items-center gap-2 border-b-4 border-black pb-2">
                {{ isset($rod) ? 'EDIT ROD DATA' : 'ADD NEW ROD' }}
            </h2>
            <form action="{{ isset($rod) ? route('admin.rods.update', $rod) : route('admin.rods.store') }}" method="POST" class="flex flex-col gap-4">
                @csrf
                @if(isset($rod)) @method('PUT') @endif

                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Rod Name</label>
                    <input type="text" name="rod_name" required value="{{ old('rod_name', $rod->rod_name ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Upgrade Level</label>
                    <input type="text" name="upgrade_level" required placeholder="e.g. Basic -> Fine" value="{{ old('upgrade_level', $rod->upgrade_level ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Requirements</label>
                    <textarea name="requirements" required class="bg-[#121519] border-[4px] border-black p-3 text-white h-24">{{ old('requirements', $rod->requirements ?? '') }}</textarea>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-white text-[10px] tracking-widest uppercase">Gem Cost</label>
                    <input type="number" name="gem_cost" required value="{{ old('gem_cost', $rod->gem_cost ?? '') }}" class="bg-[#121519] border-[4px] border-black p-3 text-white">
                </div>
                <button type="submit" class="bg-[#a8e040] text-black font-bold border-[4px] border-black py-3 uppercase text-[10px]">
                    {{ isset($rod) ? 'UPDATE ROD' : 'SAVE ROD' }}
                </button>
            </form>
        </div>
    </div>

    <div class="lg:col-span-2">
        <div class="bg-surface-container border-[4px] border-black shadow-[8px_8px_0_0_#000] p-4 overflow-x-auto">
            <table class="w-full text-left border-4 border-black border-collapse bg-[#121519]">
                <thead class="bg-black text-[#a8e040] uppercase text-[10px]">
                    <tr>
                        <th class="p-3 border-b-4 border-r-4 border-black">ROD & PATH</th>
                        <th class="p-3 border-b-4 border-black text-center">ACTIONS</th>
                    </tr>
                </thead>
                <tbody class="text-[12px] font-bold uppercase text-white">
                    @foreach($rods as $row)
                    <tr class="border-b-4 border-black">
                        <td class="p-3 border-r-4 border-black">
                            <div class="text-[#a8e040]">{{ $row->rod_name }}</div>
                            <div class="text-[#97cbff] text-[10px]">{{ $row->upgrade_level }}</div>
                        </td>
                        <td class="p-3 text-center">
                            <div class="flex gap-2 justify-center">
                                <a href="{{ route('admin.rods.edit', $row) }}" class="bg-yellow-400 p-2 border-2 border-black text-black"><span class="material-symbols-outlined text-[16px]">edit</span></a>
                                <form action="{{ route('admin.rods.destroy', $row) }}" method="POST" onsubmit="return confirm('Delete?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="bg-red-600 p-2 border-2 border-black text-white"><span class="material-symbols-outlined text-[16px]">delete</span></button>
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
