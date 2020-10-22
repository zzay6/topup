@component('mail::message')
# Permintaan perubahan kata sandi

Halo {{ $user->name }},<br>
Permintaan untuk mengganti kata sandi telah diterima <br>
Klik link dibawah ini untuk mengganti kata sandi
<p>
	Jangan berikan link ini kepada siapapun(link ini bersifat rahasia)
</p>
@component('mail::button', ['url' => $url])
Klik disini
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent