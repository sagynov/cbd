<x-cbd-layout>
    <div class="grid sm:grid-cols-2">
        <div class="px-4 sm:px-8 bg-white py-6 border-r">
            <form class="flex flex-col gap-4" action="#">
                <div class="flex flex-col gap-4">
                    <div class="font-bold text-sm">{{ __('Contact') }}</div>
                    <input class="p-3 rounded-md border border-gray-200" placeholder="E-mail" />
                </div>
                <div class="flex flex-col gap-4">
                    <div class="font-bold text-sm">{{ __('Delivery') }}</div>
                    <select class="p-3 rounded-md border border-gray-200" placeholder="Country/Region">
                        <option value="kazakhstan">Kazakhstan</option>
                    </select>
                    <div class="flex gap-4">
                        <input class="p-3 rounded-md border border-gray-200 w-1/2" placeholder="First name" />
                        <input class="p-3 rounded-md border border-gray-200 w-1/2" placeholder="Last name" />
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <input class="p-3 rounded-md border border-gray-200" placeholder="Address" />
                </div>
                <div class="flex flex-col gap-4">
                    <input class="p-3 rounded-md border border-gray-200" placeholder="Phone" />
                </div>
                <div class="flex flex-col gap-4">
                    <button class="p-4 bg-[rgb(0,178,227)] text-white font-bold rounded-lg">{{ __('Send') }}</button>
                </div>
            </form>
        </div>
        <div class="px-4 sm:px-8 py-6">
            <div class="border-b overflow-y-auto max-h-[200px]" x-data>
                <template x-for="item in $store.cart.items">
                    <div class="flex py-2">
                        <div class="mr-2 relative p-2">
                            <img x-bind:src="item.image_links[0]" class="border rounded-md w-16 h-16" />
                            <span class="absolute top-0 right-0 bg-gray-500 font-bold w-6 h-6 text-center rounded-full text-white" x-text="item.quantity"></span>
                        </div>
                        <div class="w-2/3 px-2">
                            <div class="text-gray-900 mb-2 text-sm" x-text="item.name"></div>
                            <div class="text-sm font-bold text-gray-700 mb-1" x-show="item.flavor">{{ __('Flavor') }}: <span class="text-gray-500" x-text="item.flavor"></span></div>
                            <div class="text-sm font-bold text-gray-700 mb-2" x-show="item.strength">{{ __('Strength') }}: <span class="text-gray-500" x-text="item.strength"></span></div>
                        </div>
                        <div class="px-2 py-4">
                            <span class="text-sm" x-text="item.quantity * item.price"></span>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </div>
</x-cbd-layout>