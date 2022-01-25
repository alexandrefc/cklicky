<tr>
<td class="header rounded-lg">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'cKlicky.com')
<img src="{{ asset('storage/images/logo/logo.svg') }}" class="logo" alt="cKlicky.com">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
