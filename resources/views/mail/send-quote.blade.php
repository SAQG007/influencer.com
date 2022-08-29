@component('mail::message')
# Daily Quote

<div class="card" @if($quote->language == "ur") style="direction: rtl" @endif>
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{ $quote->quote }}</p>
            <footer class="blockquote-footer">- {{ $quote->author }}</footer>
        </blockquote>
    </div>
</div>

{{--@component('mail::button', ['url' => '', 'color' => 'success'])--}}
{{--    Add to favorites--}}
{{--@endcomponent--}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
