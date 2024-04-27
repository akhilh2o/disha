@extends('layouts.quiz')

@section('title')
<title>My Exams - Disha College </title>
@endsection

@section('content')
<div class="page">
    <div class="container page__container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('quiz.exams') }}">Home</a></li>
            <li class="breadcrumb-item active">My Exam</li>
        </ol>
        @forelse($exams ?? [] as $exam)
        <div class="media mb-headings align-items-center">
            <div class="media-left">
                {{-- <img src="assets/images/vuejs.png" alt="" width="80" class="rounded"> --}}
                <img src="{{ $exam?->course?->image() }}" alt="{{ $exam?->name }}" width="80" class="rounded">
            </div>
            <div class="media-body">
                <h1 class="h2">{{ $exam?->name }}</h1>
                <p class="text-muted">submitted at {{ $exam?->attempt?->finished_at?->diffForHumans() }}</p>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Result</h4>
            </div>
            <div class="card-body media align-items-center">

                <div class="media-body">
                    <p class="text-muted-light">Status</p>
                    <h5 class="mb-0">Your exam has been submitted. We will publish the results shortly.</h5>
                </div>

                {{-- <div class="media-body">
                    <p class="text-muted-light">Max / Obtain Mark</p>
                    <h4 class="mb-0">{{ $exam?->maximum_mark }}/{{ $exam?->attempt?->score }}</h4>
                    @if ($exam?->attempt?->score>=$exam?->passing_mark)
                    <span class="text-muted-light">Pass</span>
                    @else
                    <span class="text-muted-light">Fail</span>
                    @endif
                </div> --}}
                {{-- <div class="media-right">
                    <a href="{{ route('quiz.exam.result.download',[$exam,auth()->user()]) }}"
                        class="btn btn-primary">Download <i class="material-icons btn__icon--right">cloud_download</i></a>
                </div> --}}
            </div>
        </div>
        @empty
        <div>Result not found.</div>
        @endforelse
    </div>
</div>
@endsection
