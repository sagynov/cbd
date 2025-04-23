<x-cbd-layout>
    <div class="py-12">
        <div class="p-4 sm:p-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach($products as $product)
                <div class="bg-gray-100 shadow rounded-lg">
                    <div class="p-4 text-sm font-bold capitalize text-center">{{ $product->category->name }}</div>
                    <div class="bg-white h-full rounded-lg">
                        <a href="{{ route('product.show', $product->slug) }}">
                            <img x-data="{
                                isHovered: false,
                                init() {
                                    this.$el.addEventListener('mouseenter', () => this.isHovered = true);
                                    this.$el.addEventListener('mouseleave', () => this.isHovered = false);
                                }
                            }" x-bind:src="isHovered ? '{{ $product->images[1] }}' : '{{ $product->images[0] }}'" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                            <div class="p-4">
                                <h2 class="text-lg font-bold capitalize">{{ $product->name }}</h2>
                                <p class="text-lg text-center font-bold">{{ Number::format($product->price).' ₸' }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow">
            <h1 class="text-2xl font-bold mb-4">CBD for Every Goal: Shop by Benefit.</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="bg-gray-100 max-w-[430px] h-[150px] p-4 bg-cover bg-center flex flex-col justify-end" style="background-image: url({{ $category->image }})">
                        <div class="flex flex justify-between text-white items-center">
                            <h2 class="text-lg font-bold capitalize">{{ $category->name }}</h2>
                            <div>-></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-cbd-layout>
