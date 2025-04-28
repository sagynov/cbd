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
                }" x-bind:src="isHovered ? '{{ $product->images[1] }}' : '{{ $product->images[0] }}'" alt="{{ $product->name }}" class="w-full h-48 object-cover">
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
                    <span class="text-gray-500 text-sm font-bold">663 Reviews</span>
                </div>
            </div>
            <div class="px-4 flex items-center gap-2">
                <p class="text-lg font-bold">{{ Number::format($product->price).' ₸' }}</p>
                <p class="text-gray-500 text-lg font-bold line-through">{{ Number::format($product->price).' ₸' }}</p>
            </div>
            <div class="flex justify-center py-4 px-4">
                <x-cbd-button class="w-full" x-on:click="openModal">
                    Купить
                </x-cbd-button>
            </div>
        </div>
    </div>
</div>