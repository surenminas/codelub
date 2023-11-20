<x-mail::message>

From: {{ $data['contact_name'] }}
----------------------------------------------------
Email: {{ $data['contact_email']}}
----------------------------------------------------


Message: {{ $data['contact_message']}}



Thanks,<br>
{{-- {{ config('app.name') }} --}}
</x-mail::message>
