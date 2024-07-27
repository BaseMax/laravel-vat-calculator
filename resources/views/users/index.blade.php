@extends('layouts.app')

@section('title', 'Users')

@section('content')
    <div class="container-xl">
        <div class="page-header d-print-none">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <div class="page-pretitle">
                        Users
                    </div>
                    <h2 class="page-title">
                        Users Management ({{ $count }})
                    </h2>
                </div>

                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        @if (auth()->user()->is_admin === \App\Enums\UserRole::ADMIN()->value)
                            <a href="{{ route('users.create') }}" class="btn btn-primary d-none d-sm-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>

                                Register a new user
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.errors')
    </div>

    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-body">
                    <div id="table-default table-responsive">
                        {!! $dataTable->table() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    {!! $dataTable->scripts() !!}
@endsection
