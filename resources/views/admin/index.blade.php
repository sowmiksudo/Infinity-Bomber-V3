@extends('admin.layouts.app')

@section('title', 'Admin Panel')

@section('content')
 
<section>
    <div class="row">
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i class="fas fa-address-book text-primary fa-3x"></i>
                        </div>
                        <div class="text-end">
                            <h3>{{ $users->count() }}</h3>
                            <p class="mb-0">Total Registered Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i class="fas fa-check text-success fa-3x"></i>
                        </div>
                        <div class="text-end">
                            <h3>{{ $users->where('approved', 1)->count() }}</h3>
                            <p class="mb-0">Total Verified Users</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i class="fas fa-history text-secondary fa-3x"></i>
                        </div>
                        <div class="text-end">
                            <h3>{{ $total }}</h3>
                            <p class="mb-0">Total Bombing</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i class="far fa-check-circle text-success fa-3x"></i>
                        </div>
                        <div class="text-end">
                            <h3>{{ $done }}</h3>
                            <p class="mb-0">Successful Bombings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i class="fas fa-clock text-warning fa-3x"></i>
                        </div>
                        <div class="text-end">
                            <h3>{{ $running }}</h3>
                            <p class="mb-0">Running Bombings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between px-md-1">
                        <div class="align-self-center">
                            <i class="fas fa-power-off text-danger fa-3x"></i>
                        </div>
                        <div class="text-end">
                            <h3>{{ $stopped }}</h3>
                            <p class="mb-0">Stopped Bombings</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Section: Minimal statistics cards-->

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

<div class="bg-white border rounded-5 mt-6 pt-2" style="overflow-x:auto;">

    <h3 class="text-center fw-bold">LAST 10 BOMBINGS</h3>

    <section class="w-100 p-4 text-center">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="fw-bold">#</th>
                    <th scope="col" class="fw-bold">TARGET</th>
                    <th scope="col" class="fw-bold">TIME</th>
                    <th scope="col" class="fw-bold">AMOUNT</th>
                    <th scope="col" class="fw-bold">USER</th>
                    <th scope="col" class="fw-bold">EMAIL</th>
                    <th scope="col" class="fw-bold">PHONE</th>
                    <th scope="col" class="fw-bold">SENT</th>
                    <th scope="col" class="fw-bold">THREADS</th>
                    <th scope="col" class="fw-bold">STATUS</th>
                    <th scope="col" class="fw-bold">NOTE</th>
                    <th scope="col" class="fw-bold">ACTION</th>
                </tr>
            </thead>
            <tbody>

                @forelse ($bombings as $bombing)
                <tr>
                    <th scope="row">{{ $bombing->id }}</th>
                    <td>{{ $bombing->target }}</td>
                    <td>{{ \Carbon\Carbon::parse($bombing->created_at)->diffForHumans() }}</td>
                    <td>{{ $bombing->amount }}</td>
                    <td>{{ $bombing->user->name ?? 'ADMIN' }}</td>
                    <td>{{ $bombing->user->email ?? 'NULL' }}</td>
                    <td>{{ $bombing->user->phone ?? 'NULL' }}</td>
                    <td>{{ $bombing->sent }}</td>
                    <td>{{ $bombing->threads }}</td>
                    <td><i class="icon-lg bx @if ($bombing->status == 'pending') {{ 'bx-loader-circle' }}
                         @elseif ($bombing->status == 'stop')
                            {{ 'bx-x' }}
                            @else
                            {{ 'bx-check' }}
                            @endif"></i></td>


                    <td>{{ $bombing->note }}</td>
                    <td>
                        <a href="{{ route('admin.delete', $bombing->id) }}">
                            <button class="btn btn-primary">
                                @if ($bombing->status == 'pending')
                                STOP
                                @else
                                REMOVE
                                @endif
                            </button>
                        </a>
                    </td>
                </tr>
                @empty 
                <p class="text-danger">No running process found.</p>
                @endforelse

            </tbody>
        </table>
    </section>


</div>
<hr>
<div class="mt-3">
    <h5 class="fw-bold text-center">LOG</h5>
    <div class="form-outline mb-5">
        <textarea class="form-control" id="form4Example3" rows="10"
            name="log" disabled>{{ $log }}</textarea>
        <label class="form-label" for="form4Example3">LOG of API CALLS</label>
    </div>
</div>


@endsection