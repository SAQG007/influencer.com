@extends('layouts.master')

@section('title')
    @if($flag == "create")
        <title>Add New User</title>
    @else
        <title>Update User</title>
    @endif
@endsection

@section('content')

    <form @if($flag == "create")
              action="{{ route('user.store') }}"
          @else
              action="{{ route('user.update', [$user->id]) }}"
          @endif
          method="POST"
    >
        @csrf
        <div class="container mt-8 mb-4">
            <div class="row">
                <div class="input-group mb-3">
                    <input aria-describedby="basic-addon1" aria-label="Username" class="form-control" name="name"
                           placeholder="Name"
                           style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" type="text"

                           @if($flag == "create")
                               value="{{ old('name') }}"
                           @else
                               value="{{ $user->name }}"
                        @endif

                    >
                </div>
            </div>

            <div class="row mt-3">
                <div class="input-group mb-3">
                    <input aria-describedby="basic-addon1" aria-label="Email" class="form-control" name="email"
                           placeholder="someone@example.com"
                           style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" type="email"

                           @if($flag == "create")
                               value="{{ old('email') }}"
                           @else
                               value="{{ $user->email }}"
                        @endif

                    >
                </div>
            </div>

            @if(Auth::user()->hasRole("Admin"))
                <div class="row mt-3">
                    <div class="input-group mb-3">
                        <select class="form-select" name="role">
                            @if($flag == "edit")
                                <option value="{{ $user->roles->first()->id }}">{{ $user->roles->first()->name }}</option>
                            @endif

                            @foreach($roles as $role)
                                @if($flag == "create")
                                    <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                @else
                                    @if($role->name != $user->roles->first()->name)
                                        <option value="{{ $role->id }}" >{{ $role->name }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif

            <div class="row mt-3">
                <div class="input-group mb-3">
                    <input aria-describedby="basic-addon1" aria-label="Password" class="form-control" name="password"
                           placeholder="Password"
                           style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" type="password">
                </div>
            </div>

            <div class="row mt-3">
                <div class="input-group mb-3">
                    <input aria-describedby="basic-addon1" aria-label="Confirm Password" class="form-control"
                           name="password_confirmation" placeholder="Confirm Password"
                           style="border-bottom-right-radius: 5px; border-top-right-radius: 5px;" type="password">
                </div>
            </div>

            <div class="row mt-3">
                <div class="col" style="text-align: right">
                    <button class="btn btn-primary active" type="submit">
                        @if($flag == "create")
                            Save
                        @else
                            Update
                        @endif
                    </button>
                </div>
                <div class="col">
                    <button class="btn btn-danger active" type="reset">
                        @if($flag == "create")
                            Clear
                        @else
                            Reset
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection