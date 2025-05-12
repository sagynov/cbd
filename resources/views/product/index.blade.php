<x-cbd-layout>
    <div class="px-4 sm:px-8">
        {{ Breadcrumbs::render('product.index') }}
        <div class="mt-4">
            <h1 class="text-4xl capitalize mb-4">{{ __('Shop all CBD') }}</h1>
            <p class="text-gray-900">Купите масло CBD из нашей коллекции высококачественных продуктов CBD для продажи – включая настойки масла CBD, жевательные конфеты с добавлением CBD, капсулы масла CBD и CBD для сна в различных вариантах. Наши продукты CBD поставляют превосходные экстракты конопли с постоянным качеством.</p>
        </div>
    </div>
    <div class="py-6">
        <div class="px-4 sm:px-8">
            <div class="font-base mb-4">{{ __('By benefit') }}:</div>
            <div class="owl-carousel owl-theme">
                @foreach ($categories as $category)
                <div>
                <a href="{{ route('category.show', $category->slug) }}" class="bg-gray-100 max-w-[430px] h-[100px] bg-cover bg-center flex flex-col justify-end" style="background-image: url({{ $category->image_link }})">
                    <div class="flex justify-between text-white items-center p-2">
                        <h2 class="text-3xl capitalize">{{ $category->name }}</h2>
                    </div>
                </a>
                </div>
                @endforeach
            </div>
            @push('custom-scripts')
            <script>
                $(document).ready(function(){
                    $('.owl-carousel').owlCarousel({
                        items: 6,
                        margin: 15,
                        responsive:{
                            0:{
                                items: 2
                            },
                            600:{
                                items: 4
                            },
                            1000:{
                                items: 6
                            }
                        }
                    })
                });
            </script>
            @endpush
        </div>
    </div>
    <div class="py-6">
        <div class="px-4 sm:px-8">
            <select class="border border-gray-300 px-4 py-2 mb-4" id="sort" name="sort">
                <option value="">{{ __('Sort by') }}</option>
                <option value="price_asc">{{ __('Price: Low to High') }}</option>
                <option value="price_desc">{{ __('Price: High to Low') }}</option>
            </select>
        </div>
    </div>
    <div class="py-6">
        <div class="px-4 sm:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <div class="text-lg mb-4">{{ __('Product type') }}</div>
                    <div>
                        @foreach ($types as $type)
                            <div class="flex items-center mb-2">
                                <div>
                                    <input type="radio" name="product_type" value="{{ $type->name }}" id="{{ $type->name }}">
                                    <label for="{{ $type->name }}" class="ml-2">{{ $type->title }}</label>
                                </div>
                                <div class="ml-1 text-gray-500">({{ $type->products_count }})</div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div>

                </div>
            </div>
        </div>
            
    </div>
</x-cbd-layout>