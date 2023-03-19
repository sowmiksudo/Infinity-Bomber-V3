@extends('admin.layouts.app')

@section('title')
Needs Approval
@endsection

@section('content')

<div class="container d-flex flex-column align-items-center">
    <div class="card p-3 mt-5 shadow-lg">
        <h2 class="">Create Notice</h2>
        <form action="{{ route('admin.notice.store') }}" method="post" class="">
            @csrf
            <input type="text" name="title" placeholder="Notice title" class="form-control my-2">
            <input type="text" name="content" placeholder="Notice content" class="form-control my-2">
            <button type="submit" class="btn btn-primary my-2">ADD</button>
        </form>
    </div>
</div>

@endsection