@extends('admin.layouts.app')
@section('title', 'Blacklisted Numbers')

@section('content')


<div class="bg-white border rounded-5 mt-6 pt-2" style="overflow-x:auto;">
    <h3 class="text-center fw-bold">BLACKLISTED NUMBERS</h3>
    <section class="text-center">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col" class="fw-bold">#</th>
                    <th scope="col" class="fw-bold">NUMBER</th>
                    <th scope="col" class="fw-bold">ADDED AT</th>
                    <th scope="col" class="fw-bold">MESSAGE</th>
                    <th scope="col" class="fw-bold">ACTION</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blacklists as $blist)

                <tr>
                    <th scope="row">{{ $blist->id }}</th>
                    <td>{{ $blist->number }}</td>
                    <td>{{ $blist->created_at }}</td>
                    <td>{{ $blist->message }}</td>
                    <td><a href="/admin/blacklist/delete/{{ $blist->id }}"><button
                                class="btn btn-primary btn-sm">DELETE</button></a></td>


                    @empty

                    <span class="fw-bold text-danger">No blacklisted numbers found!</span>

                </tr>
                @endforelse

            </tbody>
        </table>
    </section>



</div>



@endsection