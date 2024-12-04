@props(['href' => null])

@if($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => "btn btn-success btn-sm text-white rounded shadow-sm hover:bg-success focus:ring-2 focus:ring-success"]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => "btn btn-success btn-sm text-white rounded shadow-sm hover:bg-success focus:ring-2 focus:ring-success"]) }}>
        {{ $slot }}
    </button>
@endif



