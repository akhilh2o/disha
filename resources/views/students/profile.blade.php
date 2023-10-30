@extends('layouts.student')
@section('title')
<title>Disha College - Profile</title>
@endsection

@section('content')

<div class="page">

    <div class="container page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.exams') }}">Home</a></li>
            <li class="breadcrumb-item active">Edit Account</li>
        </ol>
        <h1 class="h2">Edit Account</h1>
        <div class="card">
            <ul class="nav nav-tabs nav-tabs-card">
                <li class="nav-item">
                    <a class="nav-link active" href="#first" data-toggle="tab">Account</a>
                </li>
            </ul>
            <div class="tab-content card-body">
                <div class="tab-pane active" id="first">
                    <form action="{{ route('student.profile.update') }}" method="POST" class="form-horizontal"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="avatar" class="col-sm-3 col-form-label form-label">Avatar</label>
                            <div class="col-sm-9">
                                <div class="media align-items-center">
                                    <div class="media-left">
                                        <div class="icon-block rounded">
                                            <i class="material-icons text-muted-light md-36">photo</i>
                                        </div>
                                    </div>
                                    <div class="media-body">
                                        <div class="custom-file" style="width: auto;">
                                            <input type="file" id="avatar" class="custom-file-input" name="avatar">
                                            <label for="avatar" class="custom-file-label">Choose
                                                file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-3 col-form-label form-label">Full Name</label>
                            <div class="col-sm-6">
                                <input id="name" type="text" class="form-control" placeholder="Full Name" name="name"
                                    value="{{ $user?->name }}">
                            </div>
                        </div>
                </div>
                <div class="form-group row">
                    <label for="email" class="col-sm-3 col-form-label form-label">Email</label>
                    <div class="col-sm-6 col-md-6">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="material-icons md-18 text-muted">mail</i>
                                </div>
                            </div>
                            <input type="text" id="email" class="form-control" placeholder="Email Address"
                                value="{{ $user?->email }}" name="email" disabled>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="website" class="col-sm-3 col-form-label form-label">Mobile</label>
                    <div class="col-sm-6 col-md-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="material-icons md-18 text-muted">phone</i>
                                </div>
                            </div>
                            <input type="number" id="mobile" class="form-control" name="mobile"
                                value="{{ $user?->mobile }}">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="password" class="col-sm-3 col-form-label form-label">Change
                        Password</label>
                    <div class="col-sm-6 col-md-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="material-icons md-18 text-muted">lock</i>
                                </div>
                            </div>
                            <input type="password" id="password" class="form-control" placeholder="Enter new password"
                                name="password">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-8 offset-sm-3">
                        <div class="media align-items-center">
                            <div class="media-left">
                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="container page__container">
    <div class="footer">
        Copyright &copy; {{ date('Y') }} - <a href="{{ config('app.main_url') }}" target="_blank">{{ config('app.name')
            }}</a>
    </div>
</div>
</div>
@endsection
