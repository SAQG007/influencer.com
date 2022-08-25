<form action="{{ route('quote.delete', ['id' => $quote->id]) }}" method="POST">
    @csrf
    <buttn class="btn btn-danger" type="submit">Delete</buttn>
</form>
