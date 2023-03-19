@extends('admin.layouts.app')

@section('title', 'API Management')

@section('content')

<h2 class="text-center fw-bold">ALL APIS</h2>

@if (Session::get("success"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
</div>
@elseif (Session::get('fail'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ Session::get('fail') }}
</div>
@endif

<div class="row">

    @forelse ($apis as $api)
    <div class="col-sm-12 col-md-6 col-lg-4 my-3">
        <div class="card text-center">
            <div class="card-header">{{ $api->id }}</div>
            <div class="card-body">
                <h5 class="card-title">{{ $api->name }}</h5>
                <p class="card-text">
                    {{ $api->url }}
                </p>
                <hr>
                <p>
                    {{ $api->body }}
                </p>
                <hr>
                <table class="table table-bordered">
                    <tbody>
                        @forelse ($api->headers as $key => $value)
                        <tr>
                            <td>{{ $key }}</td>
                            <td>{{ $value }}</td>
                        </tr>
                        @empty
                        No Headers Found
                        @endforelse
                    </tbody>
                </table>
                <a href="/admin/manage_api/edit/{{ $api->id }}" class="btn btn-primary">EDIT</a>
                <a href="/admin/manage_api/delete/{{ $api->id }}" class="btn btn-primary">DELETE</a>
            </div>
            <div class="card-footer text-muted">{{ $api->method }}</div>
        </div>
    </div>
    @empty
    <div class="alert alert-danger">
        Oops! No APIs found on the database.
    </div>
    @endforelse

</div>



@endsection