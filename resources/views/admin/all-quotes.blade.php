@extends('layouts.table-layout')

@section('title')
    <title>All Quotes Display</title>
@endsection

@if($quotes->count() == 0)
    @section('thead-area')
        <div class="text-muted text-center">No quotes found</div>
    @endsection
@else
    @section('thead-area')

        <th>ID</th>
        <th>Quote</th>
        <th>Author</th>
        <th>Status</th>
        <th>Creation Date</th>
        <th>Actions</th>

    @endsection

    @section('tbody-area')

        @foreach($quotes as $quote)

            <tr>
                <td>{{ $quote->id }}</td>
                <td>{{ $quote->quote }}</td>
                <td>{{ $quote->author }}</td>
                <td>{{ ucwords($quote->status) }}</td>
                <td>{{ $quote->created_at->format('d-M-Y') }}</td>
                <td>
                    <div class="mr-2" style="display: inline-block">
                        <form action="{{ route('quote.edit', ['id' => $quote->id]) }}" method="GET">
                            @csrf
                            @include('buttons.edit-button')
                        </form>
                    </div>
                    <div style="display: inline-block">
                        <form action="{{ route('quote.status.change', ['id' => $quote->id]) }}" method="POST">
                            @csrf
                            @include('buttons.status-button', ['status' => $quote->status])
                        </form>
                    </div>
                </td>
            </tr>

        @endforeach

    @endsection

    @section('pagination-area')
        {{ $quotes->links() }}
    @endsection
@endif
