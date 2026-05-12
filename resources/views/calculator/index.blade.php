@extends('layouts.app')

@section('title', 'PIXEL FISH - GEM CALCULATOR')

@section('content')
<header class="mb-margin-lg flex items-center gap-4">
    <span class="material-symbols-outlined text-[48px] text-primary" data-icon="calculate" style="font-variation-settings: 'FILL' 1;">calculate</span>
    <h1 class="font-headline-lg text-headline-lg text-primary uppercase drop-shadow-[4px_4px_0_rgba(0,0,0,1)]">GEM CALCULATOR</h1>
</header>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
    <div class="lg:col-span-6 flex flex-col gap-margin-sm">
        <div class="bg-surface-container border-[4px] border-black shadow-[8px_8px_0_0_#000] p-6 relative">
            <h2 class="font-headline-md text-headline-md text-secondary mb-6 uppercase flex items-center gap-2 border-b-4 border-black pb-2">
                <span class="material-symbols-outlined" data-icon="add_circle">add_circle</span> INPUT CATCH
            </h2>

            <div class="flex flex-col gap-6">
                <div class="flex flex-col gap-2">
                    <label class="text-outline uppercase font-label-sm text-label-sm tracking-widest">FISH TYPE</label>
                    <div class="relative">
                        <select id="fishType" class="bg-white bg-none border-[4px] border-black p-3 text-black font-bold focus:border-primary w-full appearance-none rounded-none text-body-md">
                            <option value="" disabled selected>Select Species...</option>
                            <option value="Dumbfish">Dumbfish</option>
                            <option value="Herring">Herring</option>
                            <option value="Kingfish">Kingfish</option>
                            <option value="Goldfish">Goldfish</option>
                            <option value="Butterflyfish">Butterflyfish</option>
                            <option value="Carp">Carp</option>
                            <option value="Halibut">Halibut</option>
                            <option value="Piranha">Piranha</option>
                            <option value="Sea Angler">Sea Angler</option>
                            <option value="Tuna">Tuna</option>
                            <option value="Acid Puffer">Acid Puffer</option>
                            <option value="Crab">Crab</option>
                        </select>
                        <span class="material-symbols-outlined absolute right-3 top-1/2 -translate-y-1/2 pointer-events-none text-black">arrow_drop_down</span>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-outline uppercase font-label-sm text-label-sm tracking-widest">SIZE CATEGORY</label>
                    <div class="grid grid-cols-5 gap-2">
                        <label class="cursor-pointer">
                            <input type="radio" name="fishSize" value="Tiny" class="peer hidden" />
                            <div class="border-[3px] border-black bg-surface text-on-surface p-2 text-center uppercase font-bold peer-checked:bg-primary peer-checked:text-black hover:bg-surface-container-high transition-colors text-[9px] md:text-[10px]">TINY</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="fishSize" value="Small" class="peer hidden" />
                            <div class="border-[3px] border-black bg-surface text-on-surface p-2 text-center uppercase font-bold peer-checked:bg-primary peer-checked:text-black hover:bg-surface-container-high transition-colors text-[9px] md:text-[10px]">SMALL</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="fishSize" value="Medium" class="peer hidden" checked />
                            <div class="border-[3px] border-black bg-surface text-on-surface p-2 text-center uppercase font-bold peer-checked:bg-primary peer-checked:text-black hover:bg-surface-container-high transition-colors text-[9px] md:text-[10px]">MED</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="fishSize" value="Large" class="peer hidden" />
                            <div class="border-[3px] border-black bg-surface text-on-surface p-2 text-center uppercase font-bold peer-checked:bg-primary peer-checked:text-black hover:bg-surface-container-high transition-colors text-[9px] md:text-[10px]">LARGE</div>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="fishSize" value="Huge" class="peer hidden" />
                            <div class="border-[3px] border-black bg-surface text-on-surface p-2 text-center uppercase font-bold peer-checked:bg-primary peer-checked:text-black hover:bg-surface-container-high transition-colors text-[9px] md:text-[10px]">HUGE</div>
                        </label>
                    </div>
                </div>

                <div class="flex flex-col gap-2">
                    <label class="text-outline uppercase font-label-sm text-label-sm tracking-widest">QUANTITY</label>
                    <input id="fishQty" class="bg-white border-[4px] border-black p-3 text-black font-bold focus:border-primary w-full rounded-none text-center" type="number" min="1" value="1"/>
                </div>

                <button id="addBtn" type="button" class="mt-2 bg-secondary text-on-secondary font-headline-md text-headline-md border-[4px] border-black py-4 shadow-[4px_4px_0_0_#000] hover:translate-x-[2px] hover:translate-y-[2px] hover:shadow-[2px_2px_0_0_#000] active:translate-x-[4px] active:translate-y-[4px] active:shadow-none transition-all uppercase flex justify-center items-center gap-2">
                    <span class="material-symbols-outlined">add_shopping_cart</span> ADD TO HAUL
                </button>
            </div>
        </div>
    </div>

    <div class="lg:col-span-6 flex flex-col gap-margin-sm">
        <div class="bg-[#121519] border-[4px] border-black p-6 h-full flex flex-col relative">
            <h2 class="font-headline-md text-headline-md text-tertiary mb-6 uppercase flex items-center gap-2">
                <span class="material-symbols-outlined" data-icon="inventory">inventory_2</span> CURRENT HAUL
            </h2>

            <div class="bg-surface-container-lowest border-[4px] border-black p-4 flex-1 overflow-y-auto mb-6 max-h-[400px]">
                <div id="haulList" class="flex flex-col gap-3">
                    <div class="text-outline text-center p-8 uppercase font-bold text-[12px] italic">No fish in haul yet.</div>
                </div>
            </div>

            <div class="border-t-4 border-dashed border-outline-variant pt-4 flex justify-between items-end">
                <span class="text-on-surface uppercase tracking-widest font-bold">TOTAL GEMS</span>
                <span id="totalGems" class="text-tertiary font-headline-lg text-headline-lg drop-shadow-[2px_2px_0_#000]">0 G</span>
            </div>
        </div>
    </div>
</div>

@push('footer')
    @include('layouts.footer')
@endpush

<script>
    const fishData = {
        "Herring": { "Tiny": 10, "Small": 40, "Medium": 70, "Large": 100, "Huge": 300 },
        "Kingfish": { "Tiny": 10, "Small": 40, "Medium": 70, "Large": 100, "Huge": 300 },
        "Goldfish": { "Tiny": 15, "Small": 60, "Medium": 105, "Large": 150, "Huge": 600 },
        "Butterflyfish": { "Tiny": 15, "Small": 60, "Medium": 105, "Large": 150, "Huge": 600 },
        "Carp": { "Tiny": 20, "Small": 80, "Medium": 140, "Large": 200, "Huge": 600 },
        "Halibut": { "Tiny": 20, "Small": 80, "Medium": 140, "Large": 200, "Huge": 600 },
        "Sea Angler": { "Tiny": 30, "Small": 120, "Medium": 210, "Large": 300, "Huge": 900 },
        "Tuna": { "Tiny": 40, "Small": 160, "Medium": 280, "Large": 400, "Huge": 1200 },
        "Acid Puffer": { "Tiny": 80, "Small": 320, "Medium": 560, "Large": 800, "Huge": 2400 },
        "Dumbfish": { "Tiny": 5, "Small": 10, "Medium": 30, "Large": 50, "Huge": 100 },
        "Piranha": { "Tiny": 30, "Small": 120, "Medium": 210, "Large": 300, "Huge": 900 },
        "Crab": { "Tiny": 320, "Small": 1280, "Medium": 2240, "Large": 3200, "Huge": 9600 }
    };

    let currentHaul = [];

    const fishSelect = document.getElementById('fishType');
    const quantityInput = document.getElementById('fishQty');
    const addBtn = document.getElementById('addBtn');
    const haulList = document.getElementById('haulList');
    const totalGemsEl = document.getElementById('totalGems');

    addBtn.addEventListener('click', () => {
        const fish = fishSelect.value;
        if(!fish) {
            alert("⚠️ PILIH JENIS IKAN TERLEBIH DAHULU!");
            return;
        }

        let size = "Medium";
        const sizeRadios = document.querySelectorAll('input[name="fishSize"]');
        sizeRadios.forEach(radio => {
            if(radio.checked) size = radio.value;
        });

        const qty = parseInt(quantityInput.value) || 1;

        const pricePerUnit = fishData[fish][size];
        const totalGemValue = pricePerUnit * qty;

        const entry = {
            id: Date.now(),
            fish: fish,
            size: size,
            qty: qty,
            gemValue: totalGemValue
        };

        currentHaul.push(entry);
        renderHaul();

        quantityInput.value = 1;
    });

    function renderHaul() {
        haulList.innerHTML = '';
        let grandTotal = 0;

        if (currentHaul.length === 0) {
            haulList.innerHTML = '<div class="text-outline text-center p-8 uppercase font-bold text-[12px] italic">No fish in haul yet.</div>';
            totalGemsEl.innerText = '0 G';
            return;
        }

        currentHaul.forEach(item => {
            grandTotal += item.gemValue;

            const itemHTML = `
                <div class="bg-surface border-[2px] border-outline-variant p-3 flex justify-between items-center group hover:border-black transition-colors">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 border-2 border-outline-variant bg-surface-container-lowest flex items-center justify-center opacity-70 group-hover:opacity-100">
                            <span class="material-symbols-outlined text-outline group-hover:text-primary">set_meal</span>
                        </div>
                        <div class="flex flex-col">
                            <span class="font-bold text-white uppercase text-body-md">${item.fish}</span>
                            <span class="text-[10px] text-outline uppercase">${item.size} x${item.qty}</span>
                        </div>
                    </div>
                    <div class="flex items-center gap-4">
                        <span class="text-tertiary font-bold text-body-md">${item.gemValue.toLocaleString()} G</span>
                        <button onclick="removeHaul(${item.id})" class="text-outline hover:text-error transition-colors p-1" title="Remove">
                            <span class="material-symbols-outlined text-[20px]">close</span>
                        </button>
                    </div>
                </div>
            `;
            haulList.insertAdjacentHTML('beforeend', itemHTML);
        });

        totalGemsEl.innerText = grandTotal.toLocaleString() + ' G';
    }

    window.removeHaul = function(id) {
        currentHaul = currentHaul.filter(item => item.id !== id);
        renderHaul();
    };
</script>
@endsection
