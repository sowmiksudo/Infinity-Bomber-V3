@extends('public.layouts.app')

@section('title')
Needs Approval
@endsection

@section('content')

<div class="container-sm d-flex justify-content-center mt-5 pt-5">
    <div class="card mt-5 pt-5">
        <div class="card-body d-flex align-items-center flex-column">
            <h5 class="card-title">Expired Account</h5>
            <p class="card-text">Sorry this account has been expired.
            </p>
            <a href="{{ $admin_contact }}">
                <button type="button" class="btn btn-outline-primary">Facebook</button>
            </a>
        </div>
    </div>
</div>

@endsection