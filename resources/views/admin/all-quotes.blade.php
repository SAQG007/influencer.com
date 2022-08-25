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
        <th>Creation Date</th>
        <th>Actions</th>

    @endsection

    @section('tbody-area')

        @foreach($quotes as $quote)

            <tr>
                <td style="width: 20px">{{ $quote->id }}</td>
                <td style="width: 50px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $quote->quote }}</td>
                <td style="width: 50px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $quote->author }}</td>
                <td style="width: 50px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">{{ $quote->created_at->format('d-M-Y') }}</td>
                <td>
                    <div class="mr-2" style="display: inline-block">
                        @include('buttons.edit-button')
                    </div>
                    <div style="display: inline-block">
                        @include('buttons.delete-button')
                    </div>
                </td>
            </tr>

        @endforeach

    @endsection

    @section('pagination-area')
        {{ $quotes->links() }}
    @endsection
@endif
