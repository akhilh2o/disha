@extends('layouts.guest')

@section('title')
<title>Register | Disha College</title>
@endsection

@section('content')
<div class="mdk-header-layout__content d-flex flex-column">
    <div class="page">
        <div class="container page__container">
            <h1 class="h2">Register</h1>
            <div class="card card-body">
                <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
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
                                    <strong> {{ number_format($course?->price_for_other,2) }}</strong>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-8 mb-3">
                                    <strong> Total -</strong>
                                </div>
                                <div class="col-4 mb-3">
                                    <strong> {{ number_format($course?->price_for_other,2) }}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="form-label" for="student_type">Student Type </label> <span
                                    class="text-danger">
                                    (<small>if you have login credential then select internal.</small>)
                                </span>
                                <select id="student_type" name="student_type" @class(['form-control','is-invalid'=>
                                    $errors->has('student_type')])
                                    required>
                                    <option value=""> Student Type</option>
                                    <option value="internal">Internal</option>
                                    <option value="external" @selected(old('student_type')=='external' )>
                                        External</option>
                                </select>
                                @error('student_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="name">Full name</label>
                                    <input type="text" id="name" name="name" placeholder="Full name"
                                        value="{{ old('name') }}" required="" @class(['form-control','is-invalid'=>
                                    $errors->has('name')])>
                                    @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email"
                                        value="{{ old('email') }}" required="" @class(['form-control','is-invalid'=>
                                    $errors->has('email')])>
                                    @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="mobile">Mobile</label>
                                    <input type="number" name="mobile" id="mobile" placeholder="Mobile" required=""
                                        value="{{ old('mobile') }}" @class(['form-control','is-invalid'=>
                                    $errors->has('mobile')])>
                                    @error('mobile')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="father_name">Father Name</label>
                                    <input type="text" id="father_name" name="father_name" placeholder="Father name"
                                        value="{{ old('father_name') }}" required=""
                                        @class(['form-control','is-invalid'=> $errors->has('father_name')])>
                                    @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="dob">Date of Birth</label>
                                    <input id="dob" type="hidden" placeholder="DOB" data-toggle="flatpickr" name="dob"
                                        value="{{ old('dob') }}" @class(['form-control','flatpickr-input','is-invalid'=>
                                    $errors->has('dob')])>
                                    @error('dob')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 mb-3">
                                    <label class="form-label" for="gender">Gender</label>
                                    <div class="custom-controls-stacked form-row">
                                        <div class="col-6">
                                            <div class="custom-control custom-radio">
                                                <input id="gender1" name="gender" type="radio"
                                                    class="custom-control-input" value="Male">
                                                <label for="gender1" class="custom-control-label">Male</label>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="custom-control custom-radio">
                                                <input id="gender2" name="gender" type="radio"
                                                    class="custom-control-input" value="Female">
                                                <label for="gender2" class="custom-control-label">Female</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gender')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" value="1" id="terms"
                                        name="terms" required="" checked="">
                                    <label class="custom-control-label" for="terms">
                                        Agree to terms and conditions
                                    </label>
                                </div>
                                @error('terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
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

@push('scripts')

<script>
    $('#student_type').on('change', function(){
        if($(this).val()=='internal'){
            let url = '{{ route('login') }}'+'?course='+'{{ $course?->slug }}';
            $('<a href="'+url+'" target="blank"></a>')[0].click();
        }
    });
</script>
@endpush
