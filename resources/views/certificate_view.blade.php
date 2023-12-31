@extends('layouts.guest')

@section('title')
    <title>Certificate - Disha College</title>
@endsection

@section('content')
    <div class="mdk-header-layout__content d-flex flex-column">
        <div class="page">
            <div class="container page__container">
                <h1 class="h2">Certificate <small>(<span class="text-danger">Please enter your roll number or name to
                            download certificate.</span>)</small></h1>

                <div class="card card-body">
                    <form action="{{ route('certificate-view.search') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-12 mx-auto">
                                <div class="flex">
                                    <div class="form-group">
                                        <label class="form-label" for="query_param">Your Roll number or Name:</label>
                                        <input type="query_param" id="query_param" name="query_param"
                                            placeholder="Enter your roll number or name..." value="{{ old('query_param', request()->get('query_param')) }}"
                                            @class(['form-control', 'is-invalid' => $errors->has('query_param')])>
                                        @error('query_param')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    @if (isset($certificateFiles))
                    <div class="row mt-3">
                        <div class="col-lg-9 col-md-9 col-12 mx-auto">
                            <h2 class="h3">
                                Download Certificates
                            </h2>
                            @foreach ($certificateFiles as $certificateFile)
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ $certificateFile['certificate'] }}" target="_blank">{{ $certificateFile['name'] }}</a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="container page__container text-center">
                <div class="footer">
                    Copyright &copy; {{ date('Y') }} - <a href="{{ route('login') }}">{{ config('app.name') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
