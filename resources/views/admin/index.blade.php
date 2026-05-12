@extends('layouts.app')

@section('title', 'PIXEL FISH - ADMIN')

@section('content')
<header class="mb-margin-lg flex items-center gap-4">
    <span class="material-symbols-outlined text-[48px] text-red-500" style="font-variation-settings: 'FILL' 1;">admin_panel_settings</span>
    <h1 class="font-headline-lg text-headline-lg text-red-500 uppercase drop-shadow-[4px_4px_0_rgba(0,0,0,1)]">ADMIN TERMINAL</h1>
</header>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <div class="bg-surface border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 flex flex-col justify-between border-l-8 border-l-primary hover:-translate-y-1 transition-transform">
        <h3 class="text-white uppercase font-bold mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined">group</span> TOTAL REGISTERED USERS
        </h3>
        <span class="text-primary font-headline-lg text-[48px] drop-shadow-[2px_2px_0_#000]">{{ $totalUsers }}</span>
    </div>

    <div class="bg-surface border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 flex flex-col justify-between border-l-8 border-l-secondary hover:-translate-y-1 transition-transform">
        <h3 class="text-white uppercase font-bold mb-4 flex items-center gap-2">
            <span class="material-symbols-outlined">receipt_long</span> TOTAL FISHING LOGS
        </h3>
        <span class="text-secondary font-headline-lg text-[48px] drop-shadow-[2px_2px_0_#000]">{{ $totalLogs }}</span>
    </div>
</div>

<section class="mb-8 border-4 border-black shadow-[8px_8px_0_0_#000] bg-surface-container p-0 overflow-hidden flex flex-col">
    <div class="bg-primary text-black p-4 border-b-[4px] border-black flex items-center gap-4">
        <span class="material-symbols-outlined text-[32px] font-bold">edit_document</span>
        <h2 class="font-headline-md text-headline-md uppercase font-bold">WIKI CONTENT MANAGEMENT</h2>
    </div>
    <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-6 bg-[#121519]">
        <a href="{{ route('admin.baits') }}" class="bg-surface border-[4px] border-black p-4 flex flex-col items-center justify-center text-center hover:bg-[#97cbff] hover:text-black transition-colors group">
            <span class="material-symbols-outlined text-[48px] text-[#97cbff] group-hover:text-black mb-2">set_meal</span>
            <span class="font-bold uppercase">MANAGE BAITS & LURES</span>
        </a>
        <a href="{{ route('admin.rods') }}" class="bg-surface border-[4px] border-black p-4 flex flex-col items-center justify-center text-center hover:bg-[#a8e040] hover:text-black transition-colors group">
            <span class="material-symbols-outlined text-[48px] text-[#a8e040] group-hover:text-black mb-2">build</span>
            <span class="font-bold uppercase">MANAGE RODS</span>
        </a>
        <a href="{{ route('admin.ingredients') }}" class="bg-surface border-[4px] border-black p-4 flex flex-col items-center justify-center text-center hover:bg-[#ff6b6b] hover:text-black transition-colors group">
            <span class="material-symbols-outlined text-[48px] text-[#ff6b6b] group-hover:text-black mb-2">science</span>
            <span class="font-bold uppercase">MANAGE MATS</span>
        </a>
    </div>
</section>

<section class="border-4 border-black shadow-[8px_8px_0_0_#000] bg-surface-container p-0 overflow-hidden flex flex-col">
    <div class="bg-red-600 text-white p-4 border-b-[4px] border-black flex items-center gap-4">
        <span class="material-symbols-outlined text-[32px] font-bold">database</span>
        <h2 class="font-headline-md text-headline-md uppercase font-bold">USER DATABASE</h2>
    </div>
    <div class="p-4 overflow-x-auto">
        <table class="w-full text-left font-body-md border-4 border-black border-collapse bg-white">
            <thead class="bg-black text-white uppercase text-[10px]">
                <tr>
                    <th class="p-3 border-b-4 border-r-4 border-black">ID</th>
                    <th class="p-3 border-b-4 border-r-4 border-black">USERNAME</th>
                    <th class="p-3 border-b-4 border-r-4 border-black">EMAIL</th>
                    <th class="p-3 border-b-4 border-r-4 border-black">ROLE</th>
                    <th class="p-3 border-b-4 border-black">REGISTER DATE</th>
                </tr>
            </thead>
            <tbody class="text-[12px] text-black font-bold uppercase">
                @foreach($users as $user)
                <tr class="border-b-4 border-black hover:bg-gray-200">
                    <td class="p-3 border-r-4 border-black">#{{ $user->id }}</td>
                    <td class="p-3 border-r-4 border-black">{{ $user->username }}</td>
                    <td class="p-3 border-r-4 border-black lowercase text-blue-600">{{ $user->email }}</td>
                    <td class="p-3 border-r-4 border-black">
                        @if($user->role === 'admin')
                            <span class="bg-red-600 text-white px-2 py-1 rounded-sm">ADMIN</span>
                        @else
                            <span class="bg-zinc-300 text-black px-2 py-1 rounded-sm">MEMBER</span>
                        @endif
                    </td>
                    <td class="p-3">{{ $user->created_at->format('d M Y') }}</td>
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
