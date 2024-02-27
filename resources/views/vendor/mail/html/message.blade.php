<x-mail::layout>
{{-- Header --}}
<x-slot:header>
<x-mail::header :url="config('app.url')">
{{ config('app.name') }}
<img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/images/SpeakernetSymbol_32x32_native.png'))) }}" width="32px" height="32px"
class="logo" alt="{{ config('app.name') }}">
</x-mail::header>
</x-slot:header>

{{-- Body --}}
{{ $slot }}

{{-- Subcopy --}}
@isset($subcopy)
<x-slot:subcopy>
<x-mail::subcopy>
{{ $subcopy }}
</x-mail::subcopy>
</x-slot:subcopy>
@endisset

{{-- Footer --}}
<x-slot:footer>
<x-mail::footer>
© {{ date('Y') }} {{ config('app.name') }}   
A service from Novate (novate.co.uk), Mansfield, UK.  
@lang('All rights reserved.')
</x-mail::footer>
</x-slot:footer>
</x-mail::layout>
