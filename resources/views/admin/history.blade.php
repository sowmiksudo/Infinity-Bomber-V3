@extends('admin.layouts.app')
@section('title', 'History')
@section('content')

<div class="bg-white border rounded-5 mt-6 pt-2" style="overflow-x:auto;">
    <h3 class="text-center fw-bold">ALL TIME BOMBINGS</h3>
    <section class="text-center">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="fw-bold">#</th>
                    <th scope="col" class="fw-bold">TARGET</th>
                    <th scope="col" class="fw-bold">TIME</th>
                    <th scope="col" class="fw-bold">User</th>
                    <th scope="col" class="fw-bold">EMAIL</th>
                    <th scope="col" class="fw-bold">PHONE</th>
                    <th scope="col" class="fw-bold font-italic">IP</th>
                    <th scope="col" class="fw-bold">AMOUNT</th>
                    <th scope="col" class="fw-bold">SENT</th>
                    <th scope="col" class="fw-bold">STATUS</th>
                    <th scope="col" class="fw-bold">NOTE</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($history as $bombing)
                
                <tr>
                    <th scope="row">{{ $bombing->id }}</th>
                    <td>{{ $bombing->target }}</td>
                    <td>{{ \Carbon\Carbon::parse($bombing->created_at)->diffForHumans() }}</td>
                    <td>{{ $bombing->user->name ?? 'ADMIN' }}</td>
                    <td>{{ $bombing->user->email ?? 'NULL' }}</td>
                    <td>{{ $bombing->user->phone ?? 'NULL' }}</td>
                    <td class="font-italic">{{ $bombing->ip }}</td>
                    <td>{{ $bombing->amount }}</td>
                    <td>{{ $bombing->sent }}</td>
                    
                    <td><i class='icon-lg bx 
                        @if ($bombing->status == 'done')
                            bx-check
                        @elseif ($bombing->trashed())
                            bx-x
                        @elseif ($bombing->status == 'pending')
                            bx-loader-circle
                        @endif
                        '></i></td>
                    <td>{{ $bombing->note }}</td>
                    
                </tr>
                @empty
                <p class="text-danger">No bombing record found.</p>
                @endforelse

            </tbody>
        </table>
    </section>



</div>

@endsection