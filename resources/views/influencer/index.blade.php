@extends('layouts.master')

@section('title')
    <title>Home</title>

@endsection

@section('content')

    @include('layouts.nav-bar')
    @include('influencer.index-message')

@endsection
