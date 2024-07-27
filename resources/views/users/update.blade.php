@extends('layouts.app')

@section('title', 'Edit User ' . $user->id)

@section('content')
    <div class="page-wrapper">
        <div class="container-xl">
            <div class="page-header d-print-none">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <div class="page-pretitle">
                            Users
                        </div>
                        <h2 class="page-title">
                            Edit User #{{ $user->id }}
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-body">
            <div class="container-xl">
                <div class="row row-deck row-cards">
                    <div class="col-12">
                        <div class="row row-cards">
                            <div class="col-sm-8 col-lg-5">
                                <div class="card card-sm">
                                    <div class="card-body">
                                        <div class="row align-items-center">

                                            @if (session('status'))
                                                <p class="alert alert-success">
                                                    {{ session('status') }}
                                                </p>
                                            @endif

                                            <form method="POST" action="{{ route('users.update', $user->id) }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PUT')

                                                <x-form.input name="name" label="Name" placeholder="Enter name"
                                                    :value="$user->name" />

                                                <x-form.input name="email" type="email" label="Email address"
                                                    placeholder="Enter email" :value="$user->email" />

                                                <x-form.input name="image" type="file" label="Profile image" />

                                                @if ($user->image)
                                                    <span class="avatar avatar-xl mb-4"
                                                        style="background-image: url({{ asset(getImageProfile($user->id)) }})"></span>
                                                @endif

                                                <div>
                                                    <label class="row">
                                                        <span class="col">Admin</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" name="admin"
                                                                    type="checkbox"
                                                                    @if ($user->is_admin) checked @endif>
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>

                                        </div>


                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-primary w-100">
                                                Update
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
