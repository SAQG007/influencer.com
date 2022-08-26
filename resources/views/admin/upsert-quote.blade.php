@extends('layouts.master')

@section('title')
    @if($flag == "create")
        <title>Add New Quote</title>
    @else
        <title>Update Quote</title>
    @endif
@endsection

@section('content')

    <div class="container" style="margin-top: 5%">
        <form method="POST"

            @if($flag == "create")
                action="{{ route('quote.store') }}"
            @else
                action="{{ route('quote.update', ['id' => $quote->id]) }}"
            @endif

        >
            @csrf
            <div class="form-floating mb-3">
                <textarea class="form-control" id="floatingTextarea" name="quote"
                          placeholder="Add your quote here">@if($flag == "edit"){{ $quote->quote }}@endif</textarea>
                <label for="floatingTextarea">Add New Quote Here</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="floatingInput" name="author" placeholder="Quote Author (optional)"
                       type="text"

                    @if($flag == "edit")
                        value="{{ $quote->author }}"
                    @endif
                >
                <label for="floatingInput">Author (optional)</label>
            </div>
            <button type="submit" class="btn btn-primary">

                @if($flag == "create")
                    Save
                @else
                    Update
                @endif

            </button>
        </form>
    </div>

@endsection
