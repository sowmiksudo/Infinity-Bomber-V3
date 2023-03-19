@extends('admin.layouts.app')
@section('title', 'Add new API')

@section('content')

<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h1 class="text-secondaray text-center">ADD API</h1>
                    @if (Session::get("success"))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @elseif (Session::get('fail'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('fail') }}
                    </div>
                    @endif

                    @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show fw-bold">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST">
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="number" id="form4Example1" name="id" class="form-control" value="{{ $lastId + 1 }}" />
                            <label class="form-label" for="form4Example1">ID</label>
                        </div>

                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example1" class="form-control" name="name"
                                value="{{ old('name') }}" />
                            <label class="form-label" for="form4Example1">Name</label>
                        </div>


                        <div class="form-outline mb-4">
                            <input type="text" id="form4Example2" class="form-control" name="url"
                                value="{{ old('url') }}" />
                            <label class="form-label" for="form4Example2">URL</label>
                        </div>

                        <!-- Message input -->
                        <div class="form-outline mb-4">
                            <textarea class="form-control" id="form4Example3" rows="4"
                                name="body">{{ old('body') }}</textarea>
                            <label class="form-label" for="form4Example3">Body</label>
                        </div>

                        <div class="form-outline mb-4">
                            <select class="form-select" id="select" aria-label="Method" name="method">  
                                <option selected>-- Select Method --</option>
                                <option value="get">GET</option>
                                <option value="post" selected></option>
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

                        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">ADD</button>
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
</div>


@endsection