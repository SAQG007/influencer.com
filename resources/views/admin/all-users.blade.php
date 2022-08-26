@extends('layouts.table-layout')

@section('title')
    <title>All Quotes Display</title>
@endsection

@if($users->count() == 0)
    @section('thead-area')
        <div class="text-muted text-center">No quotes found</div>
    @endsection
@else
    @section('thead-area')

        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Registration Date</th>
        <th>Actions</th>

    @endsection

    @section('tbody-area')

        @foreach($users as $user)

            @if(Auth::id() != $user->id)
                <tr>
                    <td class="overflow-control">{{ $user->id }}</td>
                    <td class="overflow-control">{{ $user->name }}</td>
                    <td class="overflow-control">{{ $user->email }}</td>
                    <td class="overflow-control">{{ $user->roles[0]->name }}</td>
                    <td class="overflow-control">{{ ucwords($user->status) }}</td>
                    <td class="overflow-control">{{ $user->created_at->format('d-M-Y') }}</td>
                    <td>
                        <div class="mr-2" style="display: inline-block">
                            <form action="{{ route('user.edit', ['id' => $user->id]) }}" method="GET">
                                @csrf
                                @include('buttons.edit-button')
                            </form>
                        </div>
                        <div style="display: inline-block">
                            <form action="{{ route('user.status.change', ['id' => $user->id]) }}" method="POST">
                                @csrf
                                @include('buttons.status-button', ['status' => $user->status])
                            </form>
                        </div>
                    </td>
                </tr>
            @endif

        @endforeach

    @endsection

    @section('pagination-area')
        {{ $users->links() }}
    @endsection
@endif
