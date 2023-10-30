@extends('layouts.guest')

@section('title')
<title>Login - Disha College</title>
@endsection

@section('content')
<div class="mdk-header-layout__content d-flex flex-column">
    <div class="page">
        <div class="container page__container">
            <h1 class="h2">Login <small>(<span class="text-danger">Please enter you login credential that by the
                        disha college</span>)</small></h1>

            <div class="card card-body">
                <form action="{{ route('authenticate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="course" value="{{ $course?->slug }}">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4 class="card-title">{{ $course?->name }} -</h4>
                            <p>{{ $course?->short_description }}</p>
                            <div class="form-row">
                                <div class="col-8 mb-3">
                                    <strong> Sub total -</strong>
                                </div>
                                <div class="col-4 mb-3">
                                    <strong> {{ number_format($course?->price,2) }}</strong>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-8 mb-3">
                                    <strong> Total -</strong>
                                </div>
                                <div class="col-4 mb-3">
                                    <strong> {{ number_format($course?->price,2) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 d-flex align-items-center">
                            <div class="flex">
                                <div class="form-group">
                                    <label class="form-label" for="email">Your email:</label>
                                    <input type="email" id="email" name="email"
                                        placeholder="Enter your email address..." value="{{ old("email") }}"
                                        @class(['form-control','is-invalid'=>$errors->has('email')])>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="password">Your password:</label>
                                    <input type="password" id="password" name="password" value="{{ old('password') }}"
                                        placeholder="Enter your password..." @class(['form-control','is-invalid'=>
                                    $errors->has('password')])>
                                    @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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
