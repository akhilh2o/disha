@extends('layouts.student')

@section('title')
<title>My Certificates - Disha College </title>
@endsection

@section('content')
<div class="page">

    <div class="container page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">My Certificates</li>
        </ol>
        <div class="media mb-headings align-items-center">
            <div class="media-body">
                <h1 class="h2">My Certificates</h1>
            </div>

        </div>
        <div class="card-columns">
            @forelse ($user->courses ?? [] as $courses)
            <div class="card">
                <div class="card-header">
                    <div class="media">
                        <div class="media-left">
                            <a href="javascript:void(0)">
                                <img src="{{ $courses?->course?->image() }}" alt="{{ $courses?->course?->name }}"
                                    width="100" class="rounded">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="card-title m-0">{{ $courses?->course?->name }}</h4>
                            <small class="text-muted">Exam Status: complete</small>
                        </div>
                    </div>
                </div>

                <div class="progress rounded-0">
                    <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: 100%"
                        aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="card-footer bg-white">
                    <a href="javascript:void(0)" class="btn btn-success btn-sm">Download <i
                            class="material-icons btn__icon--right">check</i></a>
                </div>
            </div>
            @empty
            <div>Certificate not found.</div>
            @endforelse
        </div>
    </div>
</div>
@endsection
