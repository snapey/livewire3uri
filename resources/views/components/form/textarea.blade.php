@props(['name', 'label', 'icon' => false, 'rows'=>7])
<div class="">
    <div class="flex flex-row items-start">
        <label class="w-1/5 pt-2 pr-8 text-sm font-bold text-right lg:w-1/4 text-zinc-700" for="{{ $name }}">{{ $label }}</label>
        <div class="flex flex-col items-start w-4/5 pr-4 lg:w-3/4">
            <textarea
                class="border w-full bg-white rounded px-2 py-2 text-sm p-1 text-zinc-700
                {{ $errors->has($name) ? 'border-red-800':'border-zinc-300' }}" 
                id="{{ $name }}" name="{{ $name }}" placeholder="{{ $label }}" rows="{{ $rows }}">{{ $content }}</textarea>
        </div>
    </div>
    <div class="flex flex-row justify-start py-1">
        <div class="w-1/4">&nbsp;</div>
        <div class="relative w-2/4 text-sm text-lime-700" id="hint_name">
            @if ($errors->has($name))
            <span class="text-red-800"><strong>{{ $errors->first($name) }}</strong><br /></span>
            @endif
            {{ $slot }}
        </div>
    </div>
</div>
