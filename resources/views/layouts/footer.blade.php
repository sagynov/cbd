<footer class="px-8 py-12 bg-gray-200">
    <div class="grid sm:grid-cols-2 gap-8">
        {{-- First column --}}
        <div>
            <div class="text-lg font-bold uppercase mb-2">{{ __('Stay connected') }}</div>
            <div class="mb-8">
                <form action="/subscribe" method="get" class="relative">
                    <input type="text" class="w-full h-[35px] rounded-full border-none bg-white pl-4 outline-none focus:border-none focus:ring-0" placeholder="{{ __('Your email') }}">
                    <x-icon-arrow-long-right class="w-6 h-6 fill-black stroke-black absolute right-4 top-1/2 -translate-y-1/2" />
                </form>
            </div>
            <div class="grid sm:grid-cols-3 gap-4 mt-4">
                <div class="flex flex-col gap-4">
                    <div class="text-lg font-bold">{{ $cbdMenu->name }}</div>
                    <div class="flex flex-col gap-4">
                        @foreach ($cbdMenu->items as $item)
                            <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="flex flex-col gap-4">
                    <div class="text-lg font-bold">{{ $salesMenu->name }}</div>
                    <div class="flex flex-col gap-4">
                        @foreach ($salesMenu->items as $item)
                            <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>                
                <div class="flex flex-col gap-4">
                    <div class="text-lg font-bold">{{ $legalMenu->name }}</div>
                    <div class="flex flex-col gap-4">
                        @foreach ($legalMenu->items as $item)
                            <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>                
            </div>
        </div>
        {{-- Second column --}}
        <div>
            <div class="text-lg font-bold mb-4">{{ __('Social') }}</div>
            <div class="flex items-center gap-6">
                <a href="#">
                    <x-icon-instagram class="w-6 h-6" />
                </a>
                <a href="#">
                    <x-icon-facebook class="w-6 h-6" />
                </a>
                <a href="#">
                    <x-icon-twitter class="w-6 h-6" />
                </a>
                
            </div>
        </div>
    </div>
</footer>