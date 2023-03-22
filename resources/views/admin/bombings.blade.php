@extends('admin.layouts.app')
@section('title', 'Running Bombings')

@section('content')

<div class="bg-white border rounded-5 mt-6 pt-2" style="overflow-x:auto;">

    <h3 class="text-center fw-bold">CURRENTLY RUNNING BOMBINGS</h3>

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
                    <td><i class='icon-lg bx @if ($bombing->status == 'pending')
                        {{ 'bx-loader-circle' }}
                    @elseif ($bombing->status == 'stop')
                    {{ 'bx-x' }}
                    @else
                    {{ 'bx-check' }}
                    @endif'></i></td>
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

                    {{-- <td><i class='bx bx-{{ ($bombing->status == ' done') ? 'check' : 'loader-circle' }}'></i></td> --}}
                </tr>
                @empty
                <p class="text-danger">No bombing record found.</p>
                @endforelse

            </tbody>
        </table>
    </section>



</div>

@endsection