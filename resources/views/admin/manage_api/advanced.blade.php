@extends('admin.layouts.app')

@section('title', 'Advanced Management')

@section('content')


<h3 class="text-center fw-bold">Advanced API Management</h3>

<div class="alert alert-warning m-3"><i class="bx bx-info"></i> Warning: Don't modify this file without knowing what you are doing. Modifing this file in a wrong way can lead the web application to crash!</div>

<form action="" method="post">
    @csrf
    <div class="form-outline m-5">
        <textarea class="form-control" id="form4Example3" rows="10"
            name="json">{{ $json }}</textarea>
        <label class="form-label" for="form4Example3">API DB</label>
    </div>
    <div class="mx-5">
        <button class="btn btn-primary btn-block" type="submit">SAVE</button>
    </div>
</form>

@endsection