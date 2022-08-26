@component('mail::message')
# Daily Quote

<div class="card">
    <div class="card-body">
        <blockquote class="blockquote mb-0">
            <p>{{ $quote->quote }}</p>
            <footer class="blockquote-footer">{{ $quote->author }}</footer>
        </blockquote>
    </div>
</div>

@component('mail::button', ['url' => ''])
    Like Quote
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
