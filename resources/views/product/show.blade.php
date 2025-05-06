<x-cbd-layout>
    <div class="py-12 px-4 sm:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
            <div class="col-span-1">
                <img src="{{ $product->image_links[0] }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </div>
            <div class="col-span-1" x-data="{ 
                quantity: 1,
                @if ($product->has_variants)
                    product: {{ collect($product)->toJson() }},
                    variant: {{ collect($product->variants[0])->toJson() }},
                    flavor: {{ collect($product->variants[0]?->flavor)->toJson() }},
                    strength: {{ collect($product->variants[0]?->strength)->toJson() }},

                    init() {
                        this.select(this.variant);
                    },
                    select(variant) {
                        this.variant = variant;
                        this.flavor = variant.flavor;
                        this.strength = variant.strength;
                        this.product.id = '{{ $product->id }}' + '-' + variant.id;
                        this.product.price = variant.price;
                        this.product.name = '{{ $product->name }}';
                        this.product.image_links = variant.image_links;
                        this.product.flavor = variant.flavor;
                        this.product.strength = variant.strength;
                    },
                    isSelectedFlavor(flavor) {
                                return this.flavor === flavor;
                            },
                    isSelectedStrength(strength) {
                        return this.strength === strength;
                    },
                    addItem()
                    {
                        this.product.quantity = this.quantity;
                        $store.cart.addItem(this.product);
                        this.product = {{ collect($product)->toJson() }};
                        this.select(this.variant);
                        this.quantity = 1;
                    }
                    @else
                    product: {{ collect($product)->toJson() }},
                    addItem()
                    {
                        $store.cart.addItem(this.product);
                    }
                    @endif
            }">
                    {{ Breadcrumbs::render('product.show', $product) }}
                    <div class="py-4 mb-4 flex justify-between">
                        <div class="flex gap-2">
                            <div class="flex items-center gap-1">
                                <x-icon-star-full class="w-[15px] h-[15px]" />
                                <x-icon-star-full class="w-[15px] h-[15px]" />
                                <x-icon-star-full class="w-[15px] h-[15px]" />
                                <x-icon-star-full class="w-[15px] h-[15px]" />
                                <x-icon-star-half class="w-[15px] h-[15px]" />
                            </div>
                            <div>
                                <span class="text-gray-900 text-sm underline cursor-pointer">{{ __('Reviews :count', ['count' => 663]) }}</span>
                            </div>
                        </div>

                        <div>
                            <span class="text-gray-900 font-bold text-sm px-2 py-1 bg-gray-200 uppercase">{{ $product->category->name }}</span>
                        </div>
                    </div>

                    <h1 class="text-4xl capitalize font-bold mb-4">{{ $product->name }}</h1>
                    <p class="text-gray-900 mb-4">{{ $product->description }}</p>
                    @if ($product->flavor_variants->count() > 0)
                    <div class="font-bold text-md mb-2 uppercase">{{ __('Flavor') }}:</div>
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        @foreach ($product->flavor_variants as $variant)
                        <button x-bind:class="{
                                'bg-gray-200': isSelectedFlavor('{{ $variant->flavor }}'), 
                                'bg-white': !isSelectedFlavor('{{ $variant->flavor }}')
                            }" class="text-gray-900 px-4 py-2 rounded-full border border-black cursor-pointer" 
                            x-on:click="select({{ collect($variant)->toJson() }})">{{ $variant->flavor }}</button>
                        @endforeach
                    </div>
                    @endif
                    @if ($product->strength_variants)
                    <div class="font-bold text-md mb-2 uppercase">{{ __('Strength') }}:</div>
                    <div class="flex flex-wrap items-center gap-2 mb-4">
                        @foreach ($product->strength_variants as $variant)
                        <button x-bind:class="{
                                'bg-gray-200': isSelectedStrength('{{ $variant->strength }}'), 
                                'bg-white': !isSelectedStrength('{{ $variant->strength }}')
                            }" class="text-gray-900 px-4 py-2 rounded-full border border-black cursor-pointer" 
                            x-on:click="select({{ collect($variant)->toJson() }})">{{ $variant->strength }}</button>
                        @endforeach
                    </div>
                    @endif
                    <div class="flex justify-between items-center gap-2 mb-4">
                        <div class="text-gray-700 font-bold text-sm">SKU#: {{ $product->sku }}</div>
                        <div>
                            <a href="#" class="text-gray-900 font-bold underline text-sm">{{ __('Download Lab Results') }}</a>
                        </div>
                    </div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="w-1/3 sm:w-1/5 flex items-center gap-2 relative">
                            <button class="text-gray-900 px-4 py-2 absolute left-0" x-on:click="quantity > 1 && quantity--">-</button>
                            <input type="number" class="w-full p-2 rounded-full text-center border border-gray-200" placeholder="Quantity" x-model="quantity">
                            <button class="text-gray-900 px-4 py-2 absolute right-0" x-on:click="quantity++">+</button>
                        </div>
                        <div class="w-2/3 sm:w-4/5">
                            <x-cbd-button class="w-full" x-on:click="addItem">{{ __('Add to cart') }}</x-cbd-button>
                        </div>
                    </div>
                    <div class="flex justify-between items-center gap-2 mb-4 p-4">
                        <div class="flex sm:flex-row flex-col items-center justify-center gap-4">
                            <img src="{{ asset('images/egtegter.png') }}" alt="Truck" class="h-6 self-start sm:self-center">
                            <div class="flex flex-col">
                                <div class="text-gray-900 font-bold text-sm">{{ __('Free shipping') }}</div>
                                <span class="text-gray-900 text-sm">{!! __('on orders <strong>:price</strong>', ['price' => '$60']) !!}</span>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col items-center justify-center gap-4">
                            <img src="{{ asset('images/erecrwref.png') }}" alt="Truck" class="h-6 self-start sm:self-center">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-bold text-sm">{{ __('60 Days') }}</span>
                                <span class="text-gray-900 text-sm">{{ __('Free Return') }}</span>
                            </div>
                        </div>
                        <div class="flex sm:flex-row flex-col items-center justify-center gap-4">
                            <img src="{{ asset('images/axdss.png') }}" alt="Truck" class="h-6 self-start sm:self-center">
                            <div class="flex flex-col">
                                <span class="text-gray-900 font-bold text-sm">{{ __('Cancel') }}</span>
                                <span class="text-gray-900 text-sm">{{ __('Anytime') }}</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="bg-gray-200 py-8 flex flex-col mb-8">
            <div class="text-center text-gray-900 font-bold text-lg uppercase">{{ __('AS SEEN IN') }}</div>
            <div class="grid grid-cols-5 gap-4 sm:px-8 px-4 py-6">
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
        <div class="py-12 px-4 sm:px-8">
            <div class="flex border-b border-gray-400 gap-4">
                <span class="text-gray-900 font-bold text-2xl capitalize cursor-pointer border-b-2 border-gray-900">{{ __('Description') }}</span>
                <span class="text-gray-500 font-bold text-2xl capitalize cursor-pointer">{{ __('Ingredients') }}</span>
            </div>
            <div class="py-4">
                <p class="text-gray-900">{{ $product->description }}</p>
            </div>
        </div>

    </div>
</x-cbd-layout>
