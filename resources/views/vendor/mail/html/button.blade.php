@props([
    'url',
    'color' => 'primary',
    'align' => 'center',
])
<style>
.button-blue:hover,
.button-primary:hover {
    background-color: #2964A5 !important;
    border-bottom: 8px solid #2964A5 !important;
    border-left: 18px solid #2964A5 !important;
    border-right: 18px solid #2964A5 !important;
    border-top: 8px solid #2964A5 !important;
}
.button-green:hover {
    background-color: #348f5a !important;
    border-bottom: 8px solid #348f5a !important;
    border-left: 18px solid #348f5a !important;
    border-right: 18px solid #348f5a !important;
    border-top: 8px solid #348f5a !important;
}
</style>
<table class="action" align="{{ $align }}" width="100%" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table width="100%" border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td align="{{ $align }}">
<table border="0" cellpadding="0" cellspacing="0" role="presentation">
<tr>
<td>
<a href="{{ $url }}" class="button button-{{ $color }}" target="_blank" rel="noopener">{{ $slot }}</a>
</td>
</tr>
</table>
</td>
</tr>
</table>
</td>
</tr>
</table>
