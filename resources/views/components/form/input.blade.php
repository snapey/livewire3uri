@props(['name', 'label', 'icon'=>false, 'default'=>null, 'maxlength'=>100, 'size' =>'long', 'disabled'=>false, 'type' => 'text'])
<div class="my-4">
    <div class="flex flex-row items-center">
        <label class="w-1/5 pr-8 text-sm font-bold text-right lg:w-1/4 text-zinc-700" for="{{ $name }}">{{ $label }}</label>
        <div class="flex flex-row items-center w-4/5 lg:w-3/4">
            <input class="border mr-2 bg-white rounded px-2 py-2 text-sm text-zinc-700 
              {{ $size=='short' ? 'w-full lg:w-1/3' : ($size=='medium' ? 'w-full lg:w-2/3' : 'w-full')  }}
              {{ $disabled ? 'bg-zinc-200': '' }}
              {{ $errors->has($name) ? 'border-2 border-red-800':'border-zinc-300' }}"
              id="{{ $name }}" name="{{ $name }}" placeholder="{{ $label }}" type="{{ $type }}" value="{{ old($name, $default) }}"
              maxlength="{{ $maxlength }}" {{ $disabled ? 'disabled' : '' }} />
            @if($icon)
                <div class="">
                    <i class="{{ $icon }} text-zinc-500"></i>
                </div>
            @endif
        </div>
    </div>
    <div class="flex flex-row justify-start mt-1 mb-2">
        <div class="w-1/5 lg:w-1/4">&nbsp;</div>
        <div class="relative w-4/5 text-sm lg:w-3/4 text-lime-700" id="hint_name">
            @if ($errors->has($name))
            <span class="text-red-800"><strong>{{ $errors->first($name) }}</strong><br /></span>
            @endif
            {!! $slot !!}
        </div>
    </div>
</div>
