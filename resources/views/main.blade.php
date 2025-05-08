<x-cbd-layout>
    <div>
        <x-carousel :items="$banners" />
        <div class="grid grid-cols-5 gap-4 sm:px-8 px-4 py-6 bg-white shadow">
            <div class="marquee__line">
                <img src="{{ asset('images/InTouch.svg') }}" alt="marquee" class="h-8">
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
        <div class="sm:p-8">
            <div class="owl-carousel owl-theme">
                @foreach($products as $product)
                    <div class="bg-white h-full">
                        <x-product-item :product="$product" />
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @push('custom-scripts')
    <script>
        $(document).ready(function(){
            $('.owl-carousel').owlCarousel({
                items: 4,
                margin: 15,
                loop: true,
                responsive:{
                    0:{
                        items: 1
                    },
                    600:{
                        items: 2
                    },
                    1000:{
                        items: 4
                    }
                }
            })
        });
    </script>
    @endpush
    <div class="py-12">
        <div class="p-4 sm:p-8 bg-white shadow">
            <h1 class="text-2xl font-bold mb-4">КБД для любой цели: выбирайте по выгоде.</h1>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($categories as $category)
                    <a href="{{ route('category.show', $category->slug) }}" class="bg-gray-100 max-w-[430px] h-[150px] p-4 bg-cover bg-center flex flex-col justify-end" style="background-image: url({{ $category->image_link }})">
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
