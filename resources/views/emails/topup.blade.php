@component('mail::message')
# Aktifitas Transaksi

Halo {{ $order->email }},<br>

Terima kasih telah melakukan transaksi di {{ config('app.name') }}<br>

<p>
	Jangan berikan link ini kepada siapapun(link ini bersifat rahasia)
</p>

@component('mail::button', ['color' => 'primary','url' => ''])
Lihat detail nya
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent