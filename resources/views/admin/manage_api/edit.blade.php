@extends('admin.layouts.app')

@section('title', 'Edit API')


@section('content')
<div class="row d-flex justify-content-center align-items-center">
    <div class="col-12 col-md-8 col-lg-10 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">
                <form action="" method="POST">
                    @csrf
                    <h1 class="text-secondaray text-center">Edit API</h1>
                    @if (Session::get("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @error('name')
                    <span class="text-danger m-3">{{ $message }}</span>
                    @enderror
                    <form>
                        <!-- Name input -->
                        <div class="form-outline mb-4">
                            <input type="number" id="form4Example1" name="id" class="form-control"
                                value="{{ $api->id }}" />
                            <label class="form-label" for="form4Example1">ID</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example1" class="form-control" name="name"
                                value="{{ $api->name }}" />
                            <label class="form-label" for="form4Example1">Name</label>
                        </div>


                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example2" class="form-control" name="url"
                                value="{{ $api->url }}" />
                            <label class="form-label" for="form4Example2">URL</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" rows="4"
                                name="body">{{ $api->body }}</textarea>
                            <label class="form-label" for="form4Example3">Body</label>
                        </div>

                        <div class="form-outline mb-4">
                            <select class="form-select" aria-label="Method" name="method">
                                <option selected>-- Select Method --</option>
                                <option value="get">GET</option>
                                <option value="post" selected>POST</option>
                                <option value="put">PUT</option>
                                <option value="delete">DELETE</option>
                                <option value="patch">PATCH</option>
                                <option value="update">UPDATE</option>
                            </select>
                        </div>



                        <!-- Checkbox -->
                        <div class="form-check d-flex justify-content-center mb-4">
                            <input class="form-check-input" type="checkbox" name="isJson" id="flexCheckDefault"
                                checked />
                            <label class="form-check-label" for="flexCheckDefault">
                                JSON CONTENT
                            </label>
                        </div>

                        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">UPDATE</button>
                    </form>
                    <hr class="my-4">

                    <a href="/admin/manage_api">
                        <button class="btn btn-lg mb-2 btn-block btn-primary" style="background-color: #dd4b39;"
                            type="submit"></i> API HOME </button>
                    </a>

            </div>
        </div>
    </div>
</div>


@endsection