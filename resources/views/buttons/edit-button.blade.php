<form action="{{ route('quote.edit', ['id' => $quote->id]) }}" method="GET">
    @csrf
    <button class="btn btn-primary" type="submit">Edit</button>
</form>
