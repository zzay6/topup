@component('mail::message')
<div style="width: 100%">
<h2>Permintaan untuk mengganti kata sandi</h2>

Halo {{ $user->name }},<br>
link untuk mengganti kata sandi akun mu telah siap
<p>
	Jangan berikan link ini kepada siapapun(link ini bersifat rahasia)
</p>
<a href="{{ $url }}">{{ $url }}</a>
@component('mail::button', ['url' => $url])
Klik disini untuk mengganti kata sandi
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
</div>
@endcomponent
