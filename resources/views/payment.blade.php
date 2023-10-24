@extends('layouts.guest')

@section('title')
<title>Payment - Disha College</title>
@endsection
@section('content')
<style>
    .razorpay-payment-button {
        border-radius: 100px;
        color: #fff;
        text-align: center;
        background-color: transparent;
        border: 1px solid transparent;
        padding: 0.5rem 1rem;
        border-radius: 0.25rem;
        background-color: #2196f3;
        border-color: #2196f3;
        box-shadow: inset 0 1px 0 hsla(0, 0%, 100%, .15), 0 1px 1px rgba(0, 0, 0, .075);
    }
</style>
<div class="mdk-header-layout__content d-flex flex-column">
    <div class="page">
        <div class="container page__container">
            <h1 class="h2">Payment</h1>
            <div class="card card-body">
                <div class="row">
                    <div class="col-lg-12">
                        <h4 class="card-title">{{ $user?->lastest_course?->course?->name }} -</h4>
                        <p>{{ $user?->lastest_course?->course?->short_description }}</p>
                        <div class="form-row">
                            <div class="col-8 mb-3">
                                <strong> Sub total -</strong>
                            </div>
                            <div class="col-4 mb-3">
                                @if ($user->is_insider)
                                <strong>
                                    {{ number_format($user?->lastest_course?->course?->price,2) }}</strong>
                                @else
                                <strong>
                                    {{ number_format($user?->lastest_course?->course?->price_for_other,2) }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-8 mb-3">
                                <strong> Total -</strong>
                            </div>
                            <div class="col-4 mb-3">
                                @if ($user->is_insider)
                                <strong>
                                    {{ number_format($user?->lastest_course?->course?->price,2) }}</strong>
                                @else
                                <strong>
                                    {{ number_format($user?->lastest_course?->course?->price_for_other,2) }}</strong>
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <form action="{{ route('payment.store') }}" method="POST">
                                @csrf
                                @php
                                    if($user->is_insider)
                                    $amount = $user?->lastest_course?->course?->price;
                                    else
                                    $amount = $user?->lastest_course?->course?->price_for_other;
                                @endphp
                                <script src="https://checkout.razorpay.com/v1/checkout.js"
                                    data-key="{{ env('RAZOR_KEY') }}"
                                    data-amount="{{ $amount * 100 }}"
                                    data-buttontext="Pay {{ $amount }} INR"
                                    data-name="Disha College"
                                    data-description="Payment for the course"
                                    data-image="https://dishacollege.com/assets/images/logo.png"
                                    data-prefill.name="{{ $user->name }}"
                                    data-prefill.email="{{ $user->email }}"
                                    data-theme.color="#2196f3">
                                </script>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="container page__container text-center">
            <div class="footer">
                Copyright &copy; {{ date('Y') }} - <a href="{{ route('login') }}">{{ config('app.name')
                    }}</a>
            </div>
        </div>
    </div>
</div>

@endsection
