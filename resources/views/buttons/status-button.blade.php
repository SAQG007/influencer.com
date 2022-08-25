<form action="{{ route('quote.status.change', ['id' => $quote->id]) }}" method="POST">
    @csrf

    @if($quote->status == "active")
        <button class="btn btn-danger active" type="submit">Inactivate</button>
    @else
        <button class="btn btn-success active" type="submit">Activate</button>
    @endif

</form>
