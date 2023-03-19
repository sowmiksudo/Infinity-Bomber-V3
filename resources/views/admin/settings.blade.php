@extends('admin.layouts.app')
@section('title','Application Settings')

@section('content')

<div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
                <div class="card-body p-5 text-center">
                    <h1 class="text-secondaray text-center">SETTINGS</h1>
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
                    <form method="POST" action="">
                        @csrf

                        <div class="form-outline my-4">
                            <input type="text" id="form4Example1" name="app_name" class="form-control" placeholder="Application Name" value="{{ $settings->app_name }}" />
                            <label class="form-label" for="form4Example1">App Name</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="text" id="form4Example1" name="admin_contact" class="form-control" placeholder="Your contact url" value="{{ $settings->admin_contact }}" />
                            <label class="form-label" for="form4Example1">Admin Contact URL</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="text" id="form4Example1" name="facebook_link" class="form-control" placeholder="Your facebook url" value="{{ $settings->facebook_link }}" />
                            <label class="form-label" for="form4Example1">Facebook URL</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="text" id="form4Example1" name="youtube_link" class="form-control" placeholder="Your youtube url" value="{{ $settings->youtube_link }}" />
                            <label class="form-label" for="form4Example1">Youtube URL</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="text" id="form4Example1" name="ga_id" class="form-control" placeholder="Google analytics ID" value="{{ $settings->ga_id }}" />
                            <label class="form-label" for="form4Example1">Google Analytics ID</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="text" id="form4Example1" name="footer" class="form-control" placeholder="Footer" value="{{ $settings->footer }}" />
                            <label class="form-label" for="form4Example1">Footer</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <textarea type="text" id="form4Example1" name="notice" class="form-control" placeholder="Notice for bombing page">{{ $settings->notice }}</textarea>
                            <label class="form-label" for="form4Example1">Notice</label>
                        </div>
                       
                        <div class="form-outline my-4">
                            <textarea type="text" id="form4Example1" name="protect_notice" class="form-control" placeholder="Notice for protect number">{{ $settings->protect_notice }}</textarea>
                            <label class="form-label" for="form4Example1">Protect Notice</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <textarea type="text" id="form4Example1" name="share_text" class="form-control" placeholder="Notice for share dialogue.">{{ $settings->share_text }}</textarea>
                            <label class="form-label" for="form4Example1">Share Message</label>
                        </div>
                        
                        
                        <div class="form-outline my-4">
                            <textarea type="text" id="form4Example1" name="share_text" class="form-control" placeholder="Notice for share dialogue.">{{ $settings->share_text }}</textarea>
                            <label class="form-label" for="form4Example1">Share Message</label>
                        </div>
                        
                        
                        <div class="form-outline my-4">
                            <input type="number" id="form4Example1" name="max_bombing" class="form-control" placeholder="Max amount of bombing per session" value="{{ $settings->max_bombing }}" />
                            <label class="form-label" for="form4Example1">Max amount per Bombing</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <input type="number" id="form4Example1" name="max_load" class="form-control" placeholder="Max amount of bombing per session" value="{{ $settings->max_load }}" />
                            <label class="form-label" for="form4Example1">Server Limit</label>
                        </div>
                        
                        <div class="form-outline my-4">
                            <textarea type="text" id="form4Example1" name="max_load_text" class="form-control" placeholder="Notice for share dialogue.">{{ $settings->max_load_text }}</textarea>
                            <label class="form-label" for="form4Example1">Server Busy Message</label>
                        </div>
                        
                        
                        <div class="form-outline my-4">
                            <textarea type="text" id="form4Example1" name="forbidden_text" class="form-control" placeholder="Notice for share dialogue.">{{ $settings->forbidden_text }}</textarea>
                            <label class="form-label" for="form4Example1">Forbidden Message</label>
                        </div>

                        <div class="form-outline my-4 d-flex justify-content-between">
                            <label for="public_bombing_page" class="form-label">PUBLIC PAGE</label>
                            <select class="form-select" id="public_bombing_page" name="public_bombing_page">
                                <option value="on" {{ ($settings->public_bombing_page == 1) ? 'selected' : ''}}>ENABLED</option>
                                <option value="off" {{ ($settings->public_bombing_page == 0) ? 'selected' : ''}}>DISABLED</option>
                            </select>
                        </div>
                        
                        <div class="form-outline my-4 d-flex justify-content-between">
                            <label for="use_multi_threads" class="form-label">MULTI THREADS</label>
                            <select class="form-select" id="use_multi_threads" name="use_multi_threads">
                                <option value="on" {{ ($settings->use_multi_threads == 1) ? 'selected' : ''}}>ENABLED</option>
                                <option value="off" {{ ($settings->use_multi_threads == 0) ? 'selected' : ''}}>DISABLED</option>
                            </select>   
                        </div>
                        

                        <button class="btn btn-primary btn-lg btn-block mb-4" type="submit">SAVE</button>
                    </form>
                    <hr class="my-4">

                    <a href="{{ route('admin.index') }}">
                        <button class="btn btn-lg mb-2 btn-block btn-primary" style="background-color: #dd4b39;"
                            type="submit"></i> DASHBOARD HOME </button>
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection