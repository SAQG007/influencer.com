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

            @include('admin.form-validations', ['fieldName' => 'quote'])
            @include('admin.form-validations', ['fieldName' => 'author'])
            @include('admin.form-validations', ['fieldName' => 'language'])

            <div class="form-floating mb-3" @if($flag == "edit" && $quote->language == "en") style="direction: ltr" @endif>
                <textarea class="form-control" id="floatingTextarea" name="quote"
                          placeholder="Add your quote here">@if($flag == "edit"){{ $quote->quote }}@endif</textarea>
                <label for="floatingTextarea">{{ __('messages.add_new_quote_here') }}</label>
            </div>

            <div class="form-floating mb-3" @if($flag == "edit" && $quote->language == "en") style="direction: ltr" @endif>
                <input class="form-control" id="floatingInput" name="author" placeholder="Quote Author (optional)"
                       type="text"

                    @if($flag == "edit")
                        value="{{ $quote->author }}"
                    @endif
                >
                <label for="floatingInput">{{ __('messages.author_optional') }}</label>
            </div>

            <div class="row mt-3" @if($flag == "edit" && $quote->language == "en") style="direction: ltr" @endif>
                <h5>{{ __('messages.quote_lang') }}</h5>
                <div class="input-group mb-3 inline" style="display: inline-block">
                    <input type="radio" name="language" value="en" @if($flag == "edit" && $quote->language == "en") checked @endif> {{ __('messages.english') }}
                </div>
                <div class="input-group mb-3 inline" style="display: inline-block">
                    <input type="radio" name="language" value="ur" @if($flag == "edit" && $quote->language == "ur") checked @endif> {{ __('messages.urdu') }}
                </div>
            </div>

            <div class="row">
                <div class="col" @if($flag == "edit" && $quote->language == "en") style="direction: ltr;" @endif>
                    <button type="submit" class="btn btn-primary">

                        @if($flag == "create")
                            {{ __('messages.save') }}
                        @else
                            {{ __('messages.update') }}
                        @endif

                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
