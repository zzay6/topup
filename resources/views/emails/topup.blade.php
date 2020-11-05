@component('mail::message')
# Aktifitas Transaksi

Halo {{ $order->email }},<br>

Terima kasih telah melakukan transaksi di {{ config('app.name') }}<br>

<h5>{{ $order->provider }}</h5>

@component('mail::table')
| ID pesanan       		   | Item 			 	 	 |
|:------------------------:|:-----------------------:|
| {{ $order->order_id }}   | {{ $order->nominal }} 	 |
@endcomponent

@component('mail::table')
| Total harga       	   | Pembayaran 			  |
|:------------------------:|:------------------------:|
| {{ $order->harga }}      | {{ $order->pembayaran }} |
@endcomponent

<p>
	Berikan kritik anda pada layanan kami ke email : <br>
	zacky29gaming@gmail.com<br><br>
	Karena tanggapan anda berguna untuk kemajuan kami ke depan
</p>

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent