@component('mail::message')
Permintaan untuk mengganti kata sandi

Halo,
link untuk mengganti kata sandi akun mu telah siap

@component('mail::button', ['url' => 'https://www.youtube.com'])
Link Youtube
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
