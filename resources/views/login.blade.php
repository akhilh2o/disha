@extends('layouts.guest')

@section('title')
<title>Login - Disha College</title>
@endsection

@section('content')
<div class="mdk-header-layout__content d-flex flex-column">
    <div class="page">
        <div class="container page__container">
            <h1 class="h2">Login <small>(<span class="text-danger">Please enter you login credential that by the disha college</span>)</small></h1>

            <div class="card card-body">
                <form action="{{ route('authenticate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9 col-md-9 col-12 mx-auto">
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
