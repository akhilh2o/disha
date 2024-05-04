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
                    <form action="{{ route('quiz.register.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input name="user_id" value="{{ auth()->check() ? auth()->id() : '' }}" type="hidden">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-12">
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="course_id">Course </label>
                                        <span class="text-danger">(<small>Select course for the registration.</small>)
                                        </span>
                                        <select id="course_id" name="course_id" @class(['form-control', 'is-invalid' => $errors->has('course_id')]) required>
                                            <option value=""> Course </option>
                                            @foreach ($courses ?? [] as $course)
                                                <option value="{{ $course?->id }}" @selected(old('course_id') == $course?->id)>
                                                    {{ $course?->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('course_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="session">Session</label>
                                        <input type="text" id="session" name="session" placeholder="{{ now()->format('Y') }}" value="{{ old('session') }}" required="" @class(['form-control', 'is-invalid' => $errors->has('session')])>
                                        @error('session')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="name">Full name</label>
                                        <input type="text" id="name" name="name" placeholder="Full name"
                                            value="{{ old('name') }}" required="" @class(['form-control', 'is-invalid' => $errors->has('name')])>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email" name="email" id="email" placeholder="Email"
                                            value="{{ old('email') }}" required="" @class(['form-control', 'is-invalid' => $errors->has('email')])>
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="father_name">Father Name</label>
                                        <input type="text" id="father_name" name="father_name" placeholder="Father name"
                                            value="{{ auth()->check() ? auth()?->user()?->father_name : old('father_name') }}"
                                            required="" @class(['form-control', 'is-invalid' => $errors->has('father_name')])>
                                        @error('father_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="mother_name">Mother Name</label>
                                        <input type="text" id="mother_name" name="mother_name" placeholder="Mother name"
                                            value="{{ auth()->check() ? auth()?->user()?->mother_name : old('mother_name') }}"
                                            required="" @class(['form-control', 'is-invalid' => $errors->has('mother_name')])>
                                        @error('mother_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="mobile">Mobile</label>
                                        <input type="number" name="mobile" id="mobile" placeholder="Mobile"
                                            required=""
                                            value="{{ auth()->check() ? auth()?->user()?->mobile : old('mobile') }}"
                                            @class(['form-control', 'is-invalid' => $errors->has('mobile')])>
                                        @error('mobile')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="dob">Date of Birth</label>
                                        <input id="dob" type="hidden" placeholder="DOB" data-toggle="flatpickr"
                                            name="dob"
                                            data-default-date="{{ auth()->check() ? auth()?->user()?->dob : old('dob') }}"
                                            value="{{ auth()->check() ? auth()?->user()?->dob : old('dob') }}"
                                            @class([
                                                'form-control',
                                                'flatpickr-input',
                                                'is-invalid' => $errors->has('dob'),
                                            ])>
                                        @error('dob')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="avatar">Photo</label>
                                        <span class="text-danger">(<small>This image will be used in your
                                                certificate.</small>)
                                            <input type="file" id="avatar" class="form-control" name="avatar">
                                            <div class="text-info"><small>Note:- Photo should be maximum 250x350 pixels.</small>
                                            </div>
                                            @error('avatar')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                    </div>
                                    @if (session()->get('center_id'))
                                        <div class="col-12 col-md-6 mb-3">
                                            <label class="form-label" for="institute_name">Institute Name</label>
                                            <input type="text" id="institute_name" name="institute_name"
                                                placeholder="Institute name" value="{{ old('institute_name') }}"
                                                required="" @class([
                                                    'form-control',
                                                    'is-invalid' => $errors->has('institute_name'),
                                                ])>
                                            @error('institute_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
                                </div>

                                <div class="form-row">
                                    @if (session()->get('center_id'))
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="issue_date">Issue Date</label>
                                        <input id="issue_date" type="hidden" placeholder="Issue Date" data-toggle="flatpickr"
                                            name="issue_date"
                                            data-default-date="{{ old('issue_date') }}"
                                            value="{{ old('issue_date') }}"
                                            @class([
                                                'form-control',
                                                'flatpickr-input',
                                                'is-invalid' => $errors->has('issue_date'),
                                            ])>
                                        @error('issue_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="duration">Duration</label>
                                        <input type="text" id="duration" name="duration" placeholder="1 Year" value="{{ old('duration') }}" @class(['form-control', 'is-invalid' => $errors->has('duration')])>
                                        @error('duration')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @endif
                                </div>
                                <div class="form-row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label class="form-label" for="gender">Gender</label>
                                        <div class="custom-controls-stacked form-row">
                                            <div class="col-6">
                                                <div class="custom-control custom-radio">
                                                    <input id="gender1" name="gender" type="radio"
                                                        class="custom-control-input" value="male" {{ old('gender') === 'male' ? 'checked' : 'checked' }}>
                                                    <label for="gender1" class="custom-control-label">Male</label>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="custom-control custom-radio">
                                                    <input id="gender2" name="gender" type="radio"
                                                        class="custom-control-input" value="female" {{ old('gender') === 'female' ? 'checked' : '' }}>
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
                                        <input class="custom-control-input" type="checkbox" value="1"
                                            id="terms" name="terms" required="" checked="">
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
                    Copyright &copy; {{ date('Y') }} - <a href="{{ route('login') }}">{{ config('app.name') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- <script>
    $('#student_type').on('change', function(){
        if($(this).val()=='internal'){
            let url = '{{ route('login') }}'+'?course='+'{{ $course?->slug }}';
            $('<a href="'+url+'" target="blank"></a>')[0].click();
        }
    });
</script> --}}
@endpush
