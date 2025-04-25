<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'inline-flex justify-center items-center px-10 py-2 bg-[#63d693] border border-[#000000] rounded-full font-semibold text-md text-black uppercase tracking-widest hover:bg-[#000] hover:text-white transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>