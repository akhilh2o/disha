@extends('layouts.student')

@section('title')
<title>My Exams - Disha College </title>
@endsection

@section('content')
<div class="page">
    <div class="container page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('student.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">My Exam</li>
        </ol>
        @forelse($exams ?? [] as $exam)
        <div class="media mb-headings align-items-center">
            <div class="media-left">
                <img src="assets/images/vuejs.png" alt="" width="80" class="rounded">
                <img src="{{ $exam?->course?->image() }}" alt="{{ $exam?->name }}" width="80" class="rounded">
            </div>
            <div class="media-body">
                <h1 class="h2">{{ $exam?->name }}</h1>
                <p class="text-muted">Duration: {{ $exam?->duration }} Min / Max Mark: {{ $exam?->maximum_mark }} / Passing Mark: {{ $exam?->passing_mark }}</p>
            </div>
            <div class="media-right">
                <a href="{{ route('student.exam',[$exam]) }}" class="btn btn-primary">Take Exam <i
                        class="material-icons btn__icon--right">play_circle_outline</i></a>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Detail</h4>
            </div>
            <div class="card-body media align-items-center">
                <div class="media-body">
                    {{-- <h4 class="mb-0">5.8</h4>
                    <span class="text-muted-light">Good</span> --}}
                    <p>{!! $exam->description !!}</p>
                </div>
            </div>
        </div>
        @empty
        <div>Exam not found.</div>
        @endforelse
    </div>
</div>
@endsection
