@props(['name', 'label', 'select', 'default', 'option', 'size'=>'long', 'empty'=>''])
<div class="my-4">
    <div class="flex flex-row items-center">
        <label class="w-1/4 pr-8 text-sm font-bold text-right text-zinc-700" for="{{ $name }}">{{ $label }}</label>
        <div class="flex flex-row items-center w-3/4">
            <select class="border mr-2 bg-white rounded px-2 py-1.5 text-sm text-zinc-700 {{ $size=='short' ? 'w-1/3' : ($size=='medium' ? 'w-2/3' : 'w-full')  }}
            {{ $errors->has($name) ? 'border-red-800':'border-zinc-300' }}"
              id="{{ $name }}" name="{{ $name }}" />
              @if(!empty($empty))
                <option value="">{{ $empty }}</option>
              @endif
              @foreach ($select as $item)
                  <option class="" value="{{ $item->id }}"
                      @if (old('name', $default) == $item->id)
                          selected="selected"
                      @endif
                          >
                      {{ $item->{$option} }}
                  </option>
              @endforeach
          </select>

        </div>
    </div>
    <div class="flex flex-row justify-end mt-1">
        <div class="relative w-3/4 text-sm text-lime-700" id="hint_name">
            @if ($errors->has($name))
            <span class="text-red-800"><strong>{{ $errors->first($name) }}</strong><br /></span>
            @endif
            {!! $slot !!}
        </div>
    </div>
</div>
