<x-cbd-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Shopping Cart</h1>
                    
                    @if($cart->items->isEmpty())
                        <p class="text-gray-500">Your cart is empty.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($cart->items as $item)
                                <div class="flex items-center justify-between border-b pb-4">
                                    <div class="flex items-center space-x-4">
                                        <img src="{{ $item->product->images[0] }}" alt="{{ $item->product->name }}" class="w-20 h-20 object-cover">
                                        <div>
                                            <h3 class="text-lg font-semibold">{{ $item->product->name }}</h3>
                                            <p class="text-gray-600">{{ Number::format($item->product->price) }} ₸</p>
                                        </div>
                                    </div>
                                    
                                    <div class="flex items-center space-x-4">
                                        <form action="{{ route('cart.update', $item) }}" method="POST" class="flex items-center">
                                            @csrf
                                            @method('PUT')
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="w-16 text-center border rounded">
                                            <button type="submit" class="ml-2 text-blue-600 hover:text-blue-800">Update</button>
                                        </form>
                                        
                                        <form action="{{ route('cart.destroy', $item) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-800">Remove</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                            
                            <div class="mt-6 flex justify-between items-center">
                                <div class="text-xl font-bold">
                                    Total: {{ Number::format($cart->total) }} ₸
                                </div>
                                <a href="{{ route('checkout') }}" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                                    Proceed to Checkout
                                </a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-cbd-layout> 