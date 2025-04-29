<div class="flex flex-col">
    <div class="p-4 bg-gray-200 text-sm font-bold capitalize text-center rounded-t-2xl">{{ $product->category->name }}</div>
    <div class="flex flex-col justify-between">
        <div class="flex flex-col gap-2 mb-8 bg-transparent">
            <a href="{{ route('product.show', $product) }}">
                <img x-data="{
                    isHovered: false,
                    init() {
                        this.$el.addEventListener('mouseenter', () => this.isHovered = true);
                        this.$el.addEventListener('mouseleave', () => this.isHovered = false);
                    }
                }" x-bind:src="isHovered ? '{{ $product->images[1] }}' : '{{ $product->images[0] }}'" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </a>
            <div class="px-4 flex flex-col gap-4">
                <a href="{{ route('product.show', $product) }}">
                    <h2 class="text-lg capitalize">{{ $product->name }}</h2>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-4">
            <div class="px-4 flex items-center gap-2">
                <div class="flex items-center">
                    <x-icon-star-full class="w-[15px] h-[15px]" />
                    <x-icon-star-full class="w-[15px] h-[15px]" />
                    <x-icon-star-full class="w-[15px] h-[15px]" />
                    <x-icon-star-full class="w-[15px] h-[15px]" />
                    <x-icon-star-half class="w-[15px] h-[15px]" />
                </div>
                <div>
                    <span class="text-gray-500 text-sm font-bold">{{ __('Reviews :count', ['count' => 663]) }}</span>
                </div>
            </div>
            <div class="px-4 flex items-center gap-2">
                <p class="text-lg font-bold">{{ Number::format($product->price).' ₸' }}</p>
                <p class="text-gray-500 text-lg font-bold line-through">{{ Number::format($product->price).' ₸' }}</p>
            </div>
            <div class="flex justify-center py-4 px-4 relative">
                <div class="w-full h-full" x-data="{
                        open: false
                    }">
                    <div x-bind:class="{'transform translate-y-0 opacity-100 visible' : open, 'transform translate-y-[1rem] opacity-0 invisible': !open}" class="bg-white transition-all duration-300 absolute z-1 bottom-[0.5em] left-0 p-[1rem] border border-black rounded-lg w-full" x-transition>
                        <div class="absolute top-2 right-4">
                            <button x-on:click="open = false">X</button>
                        </div>
                        <div class="flex flex-col">
                            <div class="font-bold text-md mb-2 uppercase">Strength:</div>
                            <div class="flex flex-wrap items-center gap-2 mb-4">
                                <span class="text-gray-900 px-4 py-2 bg-gray-100 rounded-full border border-black">{{ '1500MG' }}</span>
                                <span class="text-gray-900 px-4 py-2 bg-white rounded-full border border-gray-200">{{ '3000MG' }}</span>
                                <span class="text-gray-900 px-4 py-2 bg-white rounded-full border border-gray-200">{{ '6000MG' }}</span>
                            </div>
                            <x-cbd-button class="w-full">{{ __('Add to cart') }}</x-cbd-button>
                        </div>
                    </div>

                    <x-cbd-button class="w-full group flex items-center gap-1" x-on:click="open = true">{{ __('Add to cart') }} <x-icon-chevron-up class="w-4 h-4 fill-none stroke-black group-hover:stroke-white" /></x-cbd-button>
                </div>
            </div>
        </div>
    </div>
</div>