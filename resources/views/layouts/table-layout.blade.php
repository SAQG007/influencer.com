@extends('layouts.master')

@section('content')

    <div class="container-fluid" style="margin-top: 3%; width: 100%;">
        <div class="row">
            <div class="col">
                <table class="table table-striped table-hover table-bordered text-center"
                       style="position: relative; table-layout: fixed">
                    <thead class="table-dark">
                        @yield('thead-area')
                    </thead>

                    <tbody>
                        @yield('tbody-area')
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col" style="text-align: right">
                @yield('pagination-area')
            </div>
        </div>
    </div>

@endsection
