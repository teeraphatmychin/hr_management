@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="width: 100%;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="Firstname" class="col-md-4 col-form-label text-md-right">{{ __('Firstname') }}</label>

                            <div class="col-md-6">
                                <input id="Firstname" type="text" class="form-control{{ $errors->has('Firstname') ? ' is-invalid' : '' }}" name="Firstname" value="{{ old('Firstname') }}" placeholder="ชื่อ" required autofocus>

                                @if ($errors->has('Firstname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Firstname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Lastname" class="col-md-4 col-form-label text-md-right">{{ __('Lastname') }}</label>

                            <div class="col-md-6">
                                <input id="Lastname" type="text" class="form-control{{ $errors->has('Lastname') ? ' is-invalid' : '' }}" name="Lastname" value="{{ old('Lastname') }}" placeholder="นามสกุล" required autofocus>

                                @if ($errors->has('Lastname'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Lastname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="DOB" class="col-md-4 col-form-label text-md-right">{{ __('DOB') }}</label>

                            <div class="col-md-6">
                                <input id="DOB" type="date" class="form-control{{ $errors->has('DOB') ? ' is-invalid' : '' }}" name="DOB" value="{{ old('DOB') }}" placeholder="วันเกิด" required autofocus>

                                @if ($errors->has('DOB'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('DOB') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                            <div class="col-md-6">
                                {{--<input id="Gender" type="text" class="form-control{{ $errors->has('Gender') ? ' is-invalid' : '' }}" name="Gender" value="{{ old('Gender') }}" placeholder="ชาย / หญิง" required autofocus>--}}
                                <select class="form-control{{ $errors->has('Gender') ? ' is-invalid' : '' }}" id="Gender" name="Gender">
                                    <option>เลือกเพศ</option>
                                    <option value="male">ชาย</option>
                                    <option value="female">หญิง</option>
                                </select>
                                @if ($errors->has('Gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Marital_status" class="col-md-4 col-form-label text-md-right">{{ __('Marital status') }}</label>

                            <div class="col-md-6">
                                <input id="Marital_status" type="text" class="form-control{{ $errors->has('Marital_status') ? ' is-invalid' : '' }}" name="Marital_status" value="{{ old('Marital_status') }}" placeholder="สถานะการแต่งงาน" required autofocus>

                                @if ($errors->has('Marital_status'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Marital_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="Email" type="email" class="form-control{{ $errors->has('Email') ? ' is-invalid' : '' }}" name="Email" value="{{ old('Email') }}" placeholder="อีเมล" required>

                                @if ($errors->has('Email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Tel" class="col-md-4 col-form-label text-md-right">{{ __('Tel') }}</label>

                            <div class="col-md-6">
                                <input id="Tel" type="text" class="form-control{{ $errors->has('Tel') ? ' is-invalid' : '' }}" name="Tel" value="{{ old('Tel') }}" placeholder="เบอร์โทร" required>

                                @if ($errors->has('Tel'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Tel') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Job_ID" class="col-md-4 col-form-label text-md-right">{{ __('Job_ID') }}</label>

                            <div class="col-md-6">
                                <input id="Job_ID" type="text" class="form-control{{ $errors->has('Job_ID') ? ' is-invalid' : '' }}" name="Job_ID" value="1" required>

                                @if ($errors->has('Job_ID'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Job_ID') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Social_link" class="col-md-4 col-form-label text-md-right">{{ __('Social link') }}</label>

                            <div class="col-md-6">
                                <input id="Social_link" type="text" class="form-control{{ $errors->has('Social_link') ? ' is-invalid' : '' }}" name="Social_link" value="{{ old('Social_link') }}" placeholder="ลิ้ง Facebook" required>

                                @if ($errors->has('Social_link'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Social_link') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Education" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                            <div class="col-md-6">
                                <input id="Education" type="text" class="form-control{{ $errors->has('Education') ? ' is-invalid' : '' }}" name="Education" value="{{ old('Education') }}" placeholder="ชื่อสถาบัน" required>

                                @if ($errors->has('Education'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Education') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                            <div class="col-md-6">
                                <input id="Photo" type="text" class="form-control{{ $errors->has('Photo') ? ' is-invalid' : '' }}" name="Photo" value="-" required>

                                @if ($errors->has('Photo'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Emergency_Contact" class="col-md-4 col-form-label text-md-right">{{ __('Emergency Contact') }}</label>

                            <div class="col-md-6">
                                <input id="Emergency_Contact" type="text" class="form-control{{ $errors->has('Emergency_Contact') ? ' is-invalid' : '' }}" name="Emergency_Contact" value="{{ old('Emergency_Contact') }}" placeholder="เบอร์โทรฉุกเฉิน" required>

                                @if ($errors->has('Emergency_Contact'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Work_type" class="col-md-4 col-form-label text-md-right">{{ __('Work type') }}</label>

                            <div class="col-md-6">
                                <input id="Work_type" type="text" class="form-control{{ $errors->has('Work_type') ? ' is-invalid' : '' }}" name="Work_type" value="{{ old('Work_type') }}" placeholder="Parttime / Fulltime" required>

                                @if ($errors->has('Work_type'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Work_type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Hire_day" class="col-md-4 col-form-label text-md-right">{{ __('Hire day') }}</label>

                            <div class="col-md-6">
                                <input id="Hire_day" type="date" class="form-control{{ $errors->has('Hire_day') ? ' is-invalid' : '' }}" name="Hire_day" required>

                                @if ($errors->has('Hire_day'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Hire_day') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Nationality" class="col-md-4 col-form-label text-md-right">{{ __('Nationality') }}</label>

                            <div class="col-md-6">
                                <input id="Nationality" type="text" class="form-control{{ $errors->has('Nationality') ? ' is-invalid' : '' }}" name="Nationality" value="{{ old('Nationality') }}" placeholder="สัญชาติ" required>

                                @if ($errors->has('Nationality'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Nationality') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Data_status" class="col-md-4 col-form-label text-md-right">{{ __('Data_status') }}</label>

                            <div class="col-md-6">
                                <input id="Data_status" type="text" class="form-control{{ $errors->has('Data_status') ? ' is-invalid' : '' }}" name="Data_status" value="{{ old('Nationality') }}" placeholder="ยังทำงานอยู่ / ไม่ทำงานแล้ว" required>

                                @if ($errors->has('Data_status'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Data_status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="User_role" class="col-md-4 col-form-label text-md-right">{{ __('User role') }}</label>

                            <div class="col-md-6">
                                {{--<input id="User_role" type="text" class="form-control{{ $errors->has('User_role') ? ' is-invalid' : '' }}" name="User_role" value="{{ old('Nationality') }}" placeholder="user / admin / hr_admin / head" required>--}}
                                <select class="form-control{{ $errors->has('User_role') ? ' is-invalid' : '' }}" id="User_role" name="User_role">
                                    <option>เลือกสิทธิ์ผู้ใช้งาน</option>
                                    <option value="user">USER</option>
                                    <option value="admin">ADMIN</option>
                                    <option value="hr_admin">HR ADMIN</option>
                                    <option value="head">HEAD</option>
                                </select>
                                @if ($errors->has('User_role'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('User_role') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="รหัสผ่าน" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="รหัสผ่านอีกครั้ง" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4" >
                                <button type="submit" class="btn btn-primary" style="width: 100%;margin: 0px;">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
