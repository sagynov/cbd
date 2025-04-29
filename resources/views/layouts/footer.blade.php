<footer class="px-8 py-12 bg-gray-200">
    <div class="grid grid-cols-2 gap-8">
        {{-- First column --}}
        <div>
            <div class="text-lg font-bold">STAY CONNECTED</div>
            <div class="mb-4">
                <form action="/subscribe" method="get" class="relative">
                    <input type="text" class="w-full h-[35px] rounded-full border-none bg-white pl-4 outline-none focus:border-none focus:ring-0" placeholder="Enter your email">
                    <x-icon-arrow-long-right class="w-6 h-6 fill-black stroke-black absolute right-4 top-1/2 -translate-y-1/2" />
                </form>
            </div>
            <div class="flex items-center gap-4">
                <div class="flex flex-col gap-4">
                    <div class="text-lg font-bold">{{ $footerMenu->name }}</div>
                    <div class="flex flex-col gap-4">
                        @foreach ($footerMenu->items as $item)
                            <a href="{{ $item['link'] }}">{{ $item['name'] }}</a>
                        @endforeach
                    </div>
                </div>
                
                
            </div>
        </div>
        {{-- Second column --}}
        <div>
            <div class="text-lg font-bold mb-4">Social</div>
            <div class="flex items-center gap-6">
                <a href="#">
                    <x-icon-instagram />
                </a>
                <a href="#">
                    <x-icon-facebook />
                </a>
                <a href="#">
                    <x-icon-twitter />
                </a>
                
            </div>
        </div>
    </div>
</footer>