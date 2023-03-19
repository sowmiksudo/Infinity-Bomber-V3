@extends('admin.layouts.app')

@section('title')
Needs Approval
@endsection

@section('content')

<div class="container d-flex flex-column align-items-center">
    <h2 class="mt-5">Notices</h2>
    <a href="{{ route('admin.notice.create') }}">
        <button class="btn btn-primary text-center w-100 mb-2">ADD</button>
    </a>
    @foreach ($notices as $notice)
    <div class="card m-2" style="min-width: 20vw">
        <div class="card-header">
            <p>{{ $notice->title }}</p>
        </div>
        <div class="card-body">
            <p>
            {{ $notice->content }}            
            </p>
            <hr>
            <p>
                {{ $notice->created_at }} 
            </p>
        </div>
        <div class="card-footer">
            <form action="{{ route('admin.notice.destroy', [
                'notice' => $notice->id
            ]) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">Remove</button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection