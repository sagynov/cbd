<div class="flex items-center gap-1 text-gray-900 hover:text-gray-500 group" x-data="{ open: false }">
    <div class="bg-white w-[500px] fixed top-2 right-0 shadow-lg" x-show="open" x-transition>
        <div class="relative">
            <div class="uppercase text-sm font-bold p-4">Your cart</div>
            <div class="absolute top-5 right-5">
                <button x-on:click="open = false">X</button>
            </div>
        </div>
        <div class="bg-[#1e2f64] p-1 text-white text-center">Free Shipping on Orders $59.99+</div>
        <div class="p-4 bg-white overflow-y-visible">
            <div>Items</div>
        </div>
        <div class="p-4 flex flex-col gap-4 bg-gray-100">
            <div class="flex justify-between">
                <div class="font-bold text-gray-900">Subtotal</div>
                <div class="font-bold text-gray-900">$100.00</div>
            </div>
            <div class="w-full">
                <a href="#" class="bg-[#0cba9d] border border-[#0cba9d] text-white px-4 py-2 rounded-full block text-center w-full uppercase font-bold">Checkout</a>
            </div>
        </div>
    </div>
    <span class="cursor-pointer flex items-center gap-1" x-on:click="open = true">
        <x-icon-bag class="w-6 h-6 fill-none stroke-gray-900 group-hover:stroke-gray-500" /> (2)
    </span>
</div>