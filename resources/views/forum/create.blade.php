@extends('layouts.app')

@section('title', 'PIXEL FISH - NEW LOG')

@section('content')
<div class="max-w-2xl mx-auto bg-surface-container border-4 border-black shadow-[12px_12px_0_0_#000] p-8 mt-8">
    <header class="mb-8 border-b-4 border-black pb-4 flex items-center justify-between">
        <h2 class="text-secondary font-headline-md uppercase flex items-center gap-2">
            <span class="material-symbols-outlined">add_circle</span> CREATE NEW FISHING LOG
        </h2>
        <a href="{{ route('forum.index') }}" class="text-zinc-400 hover:text-white uppercase text-[10px] font-bold">Cancel</a>
    </header>

    <form action="{{ route('forum.store') }}" method="POST" class="flex flex-col gap-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="flex flex-col gap-2">
                <label class="text-white text-[10px] uppercase font-bold">Bait Type</label>
                <select name="bait_type" required class="bg-black border-4 border-black p-3 text-white focus:border-secondary outline-none appearance-none cursor-pointer">
                    <option value="" disabled selected>-- SELECT BAIT --</option>
                    @foreach($baits as $bait)
                        <option value="{{ $bait->item_name }}">{{ $bait->item_name }}</option>
                    @endforeach
                </select>
                @error('bait_type') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-white text-[10px] uppercase font-bold">Amount</label>
                <input type="number" name="bait_amount" required class="bg-black border-4 border-black p-3 text-white focus:border-secondary outline-none">
                @error('bait_amount') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-white text-[10px] uppercase font-bold">Fish Caught</label>
            <input type="text" name="fish_caught" required placeholder="e.g. 5x Herring" class="bg-black border-4 border-black p-3 text-white focus:border-secondary outline-none">
            @error('fish_caught') <span class="text-red-500 text-[10px]">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-white text-[10px] uppercase font-bold">Ingredients Gained</label>
            <input type="text" name="ingredients" class="bg-black border-4 border-black p-3 text-white focus:border-secondary outline-none">
        </div>

        <div class="flex flex-col gap-2">
            <label class="text-white text-[10px] uppercase font-bold">Notes</label>
            <textarea name="notes" class="bg-black border-4 border-black p-3 text-white h-24 focus:border-secondary outline-none"></textarea>
        </div>

        <button type="submit" class="bg-secondary text-black font-bold py-4 border-4 border-black shadow-[4px_4px_0_0_#000] active:shadow-none transition-all uppercase hover:-translate-y-1">
            DEPLOY LOG TO TERMINAL
        </button>
    </form>
</div>

@push('footer')
    @include('layouts.footer')
@endpush
@endsection
