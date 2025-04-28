<x-cbd-layout>
    <div>
        <x-carousel :items="$banners" />
        <div class="grid grid-cols-5 gap-4 sm:px-8 px-4 py-6 bg-white shadow">
            <div class="marquee__line">
                <img src="{{ asset('images/Intouch.svg') }}" alt="marquee" class="h-8">
            </div>
            <div class="marquee__line">
                <img src="{{ asset('images/Medium.svg') }}" alt="marquee" class="w-full h-8">
            </div>
            <div class="marquee__line">
                <img src="{{ asset('images/NewBeauty.svg') }}" alt="marquee" class="h-8">
            </div>
            <div class="marquee__line">
                <img src="{{ asset('images/Forbes_Logo.svg') }}" alt="marquee" class="h-8">
            </div>
            <div class="marquee__line">
                <img src="{{ asset('images/USA_Today_Logo_2.svg') }}" alt="marquee" class="h-8">
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="p-4 sm:p-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
            @foreach($products as $product)
                <div class="bg-white">
                    <x-product-item :product="$product" />
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
                            <h2 class="text-4xl capitalize">{{ $category->name }}</h2>
                            <div><x-icon-arrow-long-right class="w-10 h-10 stroke-white fill-white" /></div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
    <div class="py-12">
        <div>
            <img src="{{ asset('images/bottom.jpg') }}" class="w-full h-full object-cover">
        </div>
    </div>
</x-cbd-layout>
