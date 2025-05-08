<div class="flex flex-col">
    <div class="p-4 min-h-14 bg-gray-200 text-sm font-bold capitalize text-center rounded-t-2xl">{{ $product->category?->name }}</div>
    <div class="flex flex-col min-h-[570px] justify-between">
        <div class="flex flex-col gap-2 mb-8 bg-transparent">
            <a href="{{ route('product.show', $product) }}">
                <img x-data="{
                    isHovered: false,
                    init() {
                        this.$el.addEventListener('mouseenter', () => this.isHovered = true);
                        this.$el.addEventListener('mouseleave', () => this.isHovered = false);
                    }
                }" x-bind:src="isHovered ? '{{ @$product->image_links[1] }}' : '{{ @$product->image_links[0] }}'" alt="{{ $product->name }}" class="w-full h-full object-cover">
            </a>
            <div class="px-4 flex flex-col gap-4">
                <a href="{{ route('product.show', $product) }}">
                    <h2 class="text-lg capitalize">{{ $product->name }}</h2>
                </a>
            </div>
        </div>
        <div class="flex flex-col gap-4 justify-between">
            <div class="px-4 flex flex-wrap items-center gap-2">
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
                @if($product->price)
                <p class="sm:text-lg font-bold">{{ Number::format($product->price).' ₸' }}</p>
                @endif
                @if($product->old_price)
                <p class="text-gray-500 sm:text-lg font-bold line-through">
                    {{ Number::format($product->old_price).' ₸' }}
                </p>
                @endif
            </div>
            <div class="flex justify-center py-4 px-4 relative">
                <div class="w-full h-full" x-data="{
                        open: false
                    }">
                    <div x-bind:class="{'transform translate-y-0 opacity-100 visible' : open, 'transform translate-y-[1rem] opacity-0 invisible': !open}" class="bg-white transition-all duration-300 absolute z-1 bottom-[0.5em] left-0 p-[1rem] border border-black rounded-lg w-full" x-transition>
                        <div class="absolute top-2 right-4">
                            <button x-on:click="open = false">X</button>
                        </div>
                        <div class="flex flex-col" x-data="{
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
                                $store.cart.addItem(this.product);
                                this.product = {{ collect($product)->toJson() }};
                                this.select(this.variant);
                            }
                            @else
                            product: {{ collect($product)->toJson() }},
                            addItem()
                            {
                                $store.cart.addItem(this.product);
                            }
                            @endif
                        }">
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
                            <x-cbd-button class="w-full text-xs sm:text-base" x-on:click="addItem">{{ __('Add to cart') }}</x-cbd-button>
                        </div>
                    </div>
                    <x-cbd-button class="w-full text-xs sm:text-base group flex items-center gap-1" x-on:click="open = true">{{ __('Add to cart') }} <x-icon-chevron-up class="w-4 h-4 fill-none stroke-black group-hover:stroke-white" /></x-cbd-button>
                </div>
            </div>
        </div>
    </div>
</div>