@extends('layouts.app')
@section('content')
    <div class="page-body">
        <div class="container-xl">

            @include('layouts.errors')

            <div class="card @if (session('status')) mt-3 @endif">
                <div class="row g-0">
                    <div class="col-12 col-md-12 d-flex flex-column">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">
                                <h2 class="mb-4">My Account</h2>
                                <h3 class="card-title">Profile Details</h3>
                                <div class="row align-items-center">
                                    <div class="col-auto"><span class="avatar avatar-xl"
                                            style="background-image: url({{ asset(getImageProfile(auth()->user()->id)) }})"></span>
                                    </div>
                                    <div class="col-auto">
                                        <x-form.input name="image" type="file" label="Change profile" />
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{ route('profile.delete') }}" class="btn btn-ghost-danger">
                                            Delete avatar
                                        </a>
                                    </div>

                                </div>

                                <h3 class="card-title mt-4">Profile</h3>
                                <div class="row g-3">
                                    <div class="col-md">
                                        <div class="form-label">Name</div>
                                        <input name="name" type="text" class="form-control"
                                            value="{{ auth()->user()->name }}">
                                    </div>
                                </div>
                                <h3 class="card-title mt-4">Email</h3>
                                <div>
                                    <div class="row g-3">
                                        <div class="col-md">
                                            <input name="email" type="text" class="form-control"
                                                value="{{ auth()->user()->email }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer bg-transparent mt-auto">
                                <div class="btn-list justify-content-end">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
