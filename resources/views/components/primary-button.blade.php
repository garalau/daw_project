<button {{ $attributes->merge(['class' => "btn btn-success btn-sm text-white rounded shadow-sm hover:bg-success focus:ring-2 focus:ring-success"]) }}>
    {{ $slot }}
</button>

