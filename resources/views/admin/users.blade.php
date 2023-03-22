@extends('admin.layouts.app')

@section('title')
    Needs Approval
@endsection

@section('content')
    <div class="container d-flex flex-column align-items-center">
        <h2 class="mt-5">Users</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Expiry</th>
                    <th scope="col">Verified</th>
                    <th scope="col">Limit</th>
                    <th scope="col">Set Limit</th>
                    <th scope="col">Verify</th>
                    <th scope="col">UnVerify</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <form action="{{ route('admin.user.permit') }}" method="post">
                            <th scope="row">{{ $user->id }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td id="">
                                <input type="text" name="expiry" id="expiry" value="{{ $user->expires_at }}">
                            </td>
                            <td>{{ $user->approved ? 'Yes' : 'No' }}</td>
                            <td>{{ $user->limit }}</td>
                            <td>
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                <input type="number" class="form-control" value="{{ $user->limit }}" name="limit" placeholder="Enter max limit">
                            </td>
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">Verify</button>
                            </td>
                        </form>
                        <form action="{{ route('admin.user.unpermit') }}" method="post">
                            {{-- <td> --}}
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            {{-- <input type="number" class="form-control" name="limit" placeholder="Enter max limit"> --}}
                            {{--
                    </td> --}}
                            <td>
                                <button type="submit" class="btn btn-sm btn-success">UnVerify</button>
                            </td>
                        </form>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            $('#expiry').datepicker({});
        });
    </script>
@endsection
