<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-24 inline-flex items-center justify-center bg-gray-800 rounded-md font-semibold text-white uppercase tracking-widest hover:bg-gray-700  disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
