<div class="flex items-center gap-1" x-data="{ open: false }">
    <div class="bg-white w-[500px] fixed top-2 right-0 shadow-lg" x-show="open" x-transition>
        <div class="relative">
            <div class="uppercase text-sm font-bold p-4">{{ __('Your cart') }}</div>
            <div class="absolute top-5 right-5">
                <button x-on:click="open = false">X</button>
            </div>
        </div>
        <div class="bg-[#1e2f64] p-1 text-white text-center">{{ __('Free Shipping on Orders :total', ['total' => Number::format(30000)]) }}</div>
        <div class="p-4 bg-white overflow-y-visible">
            <div class="flex flex-col gap-4" x-data>
                <template x-for="item in $store.cart.items">
                    <div class="grid grid-cols-5 gap-2 border-b p-2">
                    <div class="col-span-1">
                        <img x-bind:src="item.image_links[0]" />
                    </div>
                    <div class="col-span-3">
                        <div class="flex flex-col">
                            <div class="font-bold" x-text="item.name"></div>
                            <div class="text-sm font-bold text-gray-700 mb-1" x-show="item.flavor">{{ __('Flavor') }}: <span class="text-gray-500" x-text="item.flavor"></span></div>
                            <div class="text-sm font-bold text-gray-700 mb-2" x-show="item.strength">{{ __('Strength') }}: <span class="text-gray-500" x-text="item.strength"></span></div>
                            <div class="flex items-center gap-2 relative w-24">
                                <button class="text-gray-900 px-4 py-1 absolute left-0" x-on:click="item.quantity > 1 && item.quantity--">-</button>
                                <input type="number" class="w-full p-1 rounded-full text-center border border-gray-200" placeholder="Quantity" x-model="item.quantity">
                                <button class="text-gray-900 px-4 py-1 absolute right-0" x-on:click="item.quantity++">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="flex flex-col h-full justify-between">
                            <div class="self-end">
                                <button x-on:click="$store.cart.removeItem(item)">
                                    <x-icon-delete class="w-4 h-4 fill-none stroke-black" />
                                </button>
                            </div>
                            <div class="self-end">
                                <span class="font-bold" x-text="item.quantity * item.price"></span>
                            </div>
                        </div>
                    </div>
                    </div>
                </template>
            </div>
        </div>
        <div class="p-4 flex flex-col gap-4 bg-gray-100">
            <div class="flex justify-between">
                <div class="font-bold text-gray-900">{{ __('Subtotal') }}</div>
                <div x-data>
                    <span class="font-bold text-gray-900" x-text="$store.cart.getTotal()">
                </div>
            </div>
            <div class="w-full">
                <a href="{{ route('checkout') }}" class="bg-[#0cba9d] border border-[#0cba9d] text-white px-4 py-2 rounded-full block text-center w-full uppercase font-bold">{{ __('Checkout') }}</a>
            </div>
        </div>
    </div>
    <span class="cursor-pointer flex items-center gap-1" x-on:click="open = true">
        <x-icon-bag class="w-6 h-6 fill-none stroke-gray-900 group-hover:stroke-gray-500" /> <span x-text="$store.cart.getCount()" class="text-gray-900"></span>
    </span>
</div>