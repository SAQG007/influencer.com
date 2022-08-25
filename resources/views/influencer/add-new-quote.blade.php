@extends('layouts.master')

@section('title')
    <title>Add New Quote</title>
@endsection

@section('content')

    <div class="container" style="margin-top: 5%">
        <form class="needs-validation" action="#" method="POST">
            @csrf
            <div class="form-floating mb-3">
                <textarea name="quote" class="form-control" placeholder="Add your quote here" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Add New Quote Here</label>
            </div>
            <div class="form-floating mb-3">
                <input name="author" type="text" class="form-control" id="floatingInput" placeholder="Quote Author (optional)">
                <label for="floatingInput">Author (optional)</label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

@endsection
