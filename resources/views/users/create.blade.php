@extends('layouts.app')

@section('title', 'Create User')

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
                            Register a User
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

                                            <form method="POST" action="{{ route('users.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf

                                                <x-form.input name="name" label="Name" placeholder="Enter name" />

                                                <x-form.input name="email" type="email" label="Email address"
                                                    placeholder="Enter email" />

                                                <x-form.input name="image" type="file" label="Profile image" />


                                                <div>
                                                    <label class="row">
                                                        <span class="col">Admin</span>
                                                        <span class="col-auto">
                                                            <label class="form-check form-check-single form-switch">
                                                                <input class="form-check-input" name="admin"
                                                                    type="checkbox">
                                                            </label>
                                                        </span>
                                                    </label>
                                                </div>

                                                <div class="form-footer">
                                                    <button type="submit" class="btn btn-primary w-100">
                                                        Register
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
    </div>
@endsection
