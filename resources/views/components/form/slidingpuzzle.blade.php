@props(['slidingCaptcha'])

<div class="w-full my-4" x-data="{guess:400}">
    <div class="flex flex-row justify-center w-full sm:justify-start" >
        <label class="w-1/5 pr-8 text-sm font-bold text-right lg:w-1/4 text-zinc-700" for="guess">Human?</label>
        <div class="max-w-[400px] w-full flex flex-col rounded align-center sm:align-left py-2"
                x-effect="$refs.bottom.style.backgroundPosition=guess+'px';"
        >
            <div class="w-full mx-auto border border-b-0 rounded-t-md
            {{ $errors->has('guess') ? 'border-2 border-red-800':'border-zinc-300' }}"
            style="margin:0; height:50px; background-image:url('{{ $slidingCaptcha->top->toGif()->toDataUri() }}')"></div>
            <div class="w-full mx-auto border border-t-0 shadow rounded-b-md
            {{ $errors->has('guess') ? 'border-2 border-red-800':'border-zinc-300' }}"
            style="margin:0; height:50px; background-image:url('{{ $slidingCaptcha->bottom->toGif()->toDataUri() }}');" x-ref="bottom" ></div>
            <input type="range" id="guess" name="guess" min="400" max="2000" step="10" x-model="guess" autocomplete="off" class="w-full mt-2 py-3 max-w-[400px]">
            
            @error('guess')
                <div class="text-sm font-bold text-red-800 ">{{ $message }}</div>
            @enderror

            <div class="py-2 text-sm text-lime-700" id="guess">
                <strong>Prove you are human please.</strong><br /> Use the slider to drag the puzzle so that the top and bottom are aligned
            </div>

        </div>
    </div>
</div>
