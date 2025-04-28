<x-cbd-layout>
    <div style="background: linear-gradient(90deg, rgba(237, 242, 246, 1) 3%, rgba(166, 191, 211, 1) 98%);">
        {{ Breadcrumbs::render('category.show', $category) }}
        <div class="p-4 sm:p-8">
            <h1 class="text-4xl font-bold capitalize mb-4">{{ $category->name }}</h1>
            <p class="text-gray-900">{{ $category->description }}</p>
        </div>
    </div>
    <div class="py-12">
        <div class="px-4 sm:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <div class="slick-slide">
                @foreach($products as $product)
                        <x-product-item :product="$product" />
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-cbd-layout>
