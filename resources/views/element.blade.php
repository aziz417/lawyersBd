{{--        @if ($errors->any())--}}
{{--            @foreach ($errors->all() as $error)--}}
{{--                <p class="text-danger">{{$error}}</p>--}}
{{--            @endforeach--}}
{{--        @endif--}}

{{--            Basic Info          --}}

<div class="info">
    @include('modal')
    <h2 class="text-center font-bold mb-4">Register For {{ ucfirst($type) }}</h2>
    <div class="info-heading mb-3">
        <p style="font-size: 22px" class="text-center mb-0"><strong>Basic Info</strong></p>
    </div>
    <input type="hidden" name="type" id="type" value="{{ $type }}">
    <div class="info-body">
        @if($type == 'lawyer')
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Category and position <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <select
                        class="custom-select custom-select-sm post_name_en"
                        name="category_id"
                >
                    <option value="">Select category and position</option>
                    @foreach($categories as $category)
                        <option {{ isset($register) && $register->category_id == $category->id ? 'Selected' : '' }}
                                value="{{ @$category->id }}">{{ @$category->title.' '.@$category->position }}</option>
                    @endforeach

                </select>
            </div>
        </div>
        @endif
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Applicant's Name <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="text"
                       value="{{ isset($register) ? $register->applicants_name : old('applicants_name') }}"
                       name="applicants_name" class="form-control form-control-sm applicants_name_en"
                       placeholder="Enter applicants name in English"
                >
            </div>
        </div>
{{--        <div class="form-group row">--}}
{{--            <div class="col-sm-3 col">--}}
{{--                <small>--}}
{{--                    <span class="float-right">:</span>--}}
{{--                </small>--}}
{{--            </div>--}}
{{--            <div class="col-sm-9">--}}
{{--                <input type="text"--}}
{{--                       value="{{ isset($register) ? $register->applicants_name_bn : old('applicants_name_bn') }}"--}}
{{--                       name="applicants_name_bn" class="form-control form-control-sm applicants_name_bn"--}}
{{--                       placeholder="বাংলায় আবেদনকারীর নাম লিখুন"--}}
{{--                >--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Father's Name <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="text"
                       value="{{ isset($register) ? $register->father_name : old('father_name') }}"
                       name="father_name" class="form-control form-control-sm father_name_en"
                       placeholder="Enter applicants father name in English"
                >
            </div>
        </div>
{{--        <div class="form-group row">--}}
{{--            <div class="col-sm-3 col">--}}
{{--                <small>--}}
{{--                    <span class="float-right">:</span>--}}
{{--                </small>--}}
{{--            </div>--}}
{{--            <div class="col-sm-9">--}}
{{--                <input type="text"--}}
{{--                       value="{{ isset($register) ? $register->father_name_bn : old('father_name_bn') }}"--}}
{{--                       name="father_name_bn" class="form-control form-control-sm father_name_bn"--}}
{{--                       placeholder="বাংলায় আবেদনকারীর পিতার নাম লিখুন"--}}
{{--                >--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Mother's Name <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="text"
                       value="{{ isset($register) ? $register->mother_name : old('mother_name') }}"
                       name="mother_name" class="form-control form-control-sm mother_name_en"
                       placeholder="Enter applicants mother's name in English"
                >
            </div>
        </div>
{{--        <div class="form-group row">--}}
{{--            <div class="col-sm-3 col">--}}
{{--                <small>--}}
{{--                    <span class="float-right">:</span>--}}
{{--                </small>--}}
{{--            </div>--}}
{{--            <div class="col-sm-9">--}}
{{--                <input type="text"--}}
{{--                       value="{{ isset($register) ? $register->mother_name_bn : old('mother_name_bn') }}"--}}
{{--                       name="mother_name_bn" class="form-control form-control-sm mother_name_bn"--}}
{{--                       placeholder="বাংলায় আবেদনকারীর মাতার নাম লিখুন"--}}
{{--                >--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Date Of Birth <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input placeholder="Select Date"
                       value="{{ isset($register) ? $register->date_Of_birth : old('date_Of_birth') }}"
                       name="date_Of_birth" class="form-control form-control-sm date_Of_birth">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Place of birth <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="text"
                       value="{{ isset($register) ? $register->place_of_birth : old('place_of_birth') }}"
                       name="place_of_birth" class="form-control form-control-sm place_of_birth"
                       placeholder="Enter your place of birth"
                >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Gender <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <div class="form-check">
                    <div class="row">
                        <div class="col-2">
                            <input class="form-check-input gender"
                                   @if(isset($register) && $register->gender == 'Male')  checked
                                   @endif type="radio" name="gender" value="Male">
                            <small class="form-check-label">
                                Male
                            </small>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input gender"
                                   @if(isset($register) && $register->gender == 'Female')  checked
                                   @endif  type="radio" name="gender" value="Female">
                            <small class="form-check-label">
                                Female
                            </small>
                        </div>
                        <div class="col-2">
                            <input class="form-check-input gender"
                                   @if(isset($register) && $register->gender == 'Other')  checked
                                   @endif type="radio" name="gender" value="Other">
                            <small class="form-check-label">
                                Other
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Nationality <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <select class="custom-select custom-select-sm nationality" name="nationality">
                    <option value="">Select Nationality</option>
                    <option value="{{ isset($register) ? $register->nationality : '' }}"
                            {{ isset($register) ? 'selected' : 'style=display:none' }}
                    >
                        {{ isset($register) ? $register->nationality : '' }}
                    </option>
                    <option value="Bangladeshi">Bangladeshi</option>
                    <option value="Others">Others</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    National ID <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="number"
                       value="{{ isset($register) ? $register->national_id : old('national_id') }}"
                       name="national_id" class="form-control form-control-sm national_id "
                       placeholder="Enter your National ID number"
                >
            </div>

        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Birth Registration <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="number"
                       value="{{ isset($register) ? $register->birth_registration : old('birth_registration') }}"
                       name="birth_registration" class="form-control form-control-sm birth_registration"
                       placeholder="Enter your Birth Registration number"
                >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Passport ID <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="number"
                       value="{{ isset($register) ? $register->passport_id : old('passport_id') }}"
                       name="passport_id" class="form-control form-control-sm passport_id"
                       placeholder="Enter your Passport number"
                >
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Religion <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <select class="custom-select custom-select-sm religion" name="religion">
                    <option value="">Select Religion</option>
                    <option value="{{ isset($register) ? $register->religion : '' }}"
                            {{ isset($register) ? 'selected' : 'style=display:none' }}
                    >
                        {{ isset($register) ? $register->religion : '' }}
                    </option>
                    <option value="Islam">Islam</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="Christianity">Christianity</option>
                    <option value="Buddhism">Buddhism</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Marital Status <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <div class="form-check">
                    <div class="row">
                        <div class="col-2 after_spouse_name_field_append">
                            <input class="form-check-input marital_status"
                                   @if(isset($register) && explode(' ', $register->marital_status)[0] == 'Married')  checked
                                   @endif type="radio" name="marital_status" value="Married">
                            <small class="form-check-label">
                                Married
                            </small>
                        </div>

                        @if(isset($register))
                            <div class="col-5 spouse_name_remove">
                                @php
                                    function after ($t, $inthat){
                                        if (!is_bool(strpos($inthat, $t)))
                                        return substr($inthat, strpos($inthat,$t)+strlen($t));
                                    }

                                    function before ($t, $inthat){
                                        return substr($inthat, 0, strpos($inthat, $t));
                                    };

                                    function between ($t, $that, $inthat){
                                        return before ($that, after($t, $inthat));
                                    }

                                        $thikAche = between ('Name: ', ')', $register->marital_status);

                                @endphp

                                <input value="{{ $thikAche }}" class="form-control form-control-sm spouse_name" type="text" name="spouse_name" placeholder="Spouse Name">
                            </div>
                        @endif

                        <div class="col-2">
                            <input class="form-check-input"
                                   @if(isset($register) && $register->marital_status == 'Single')  checked
                                   @endif type="radio" name="marital_status" value="Single">
                            <small class="form-check-label">
                                Single
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Photo <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-7">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file"
                               accept="image/*"
                               class="custom-file-input form-control-sm"
                               id="inputGroupFile01 imgInp"
                               name="photo"
                               onchange="readURL(this);"
                        >
                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div>
                    @if(isset($register->image) && !empty($register->image))
                        <img id="profile_old_img" src="{{ asset('uploads/applications').'/'.$register->image }}"
                             width="100px" height="100px"
                        >
                    @endif
                    <img id="blah"
                         class="display_none"
                         width="100px" height="100px"
                    >
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Signature Photo <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-7">
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file"
                               accept="image/*"
                               class="custom-file-input form-control-sm"
                               id="inputGroupFile01 imgInp2"
                               name="signature"
                               onchange="readURL2(this);"
                        >
                        <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                    </div>
                </div>
            </div>
            <div class="col-sm-2">
                <div>
                    @if(isset($register->signature_img) && !empty($register->signature_img))
                        <img id="signature_old_img" src="{{ asset('uploads/applications').'/'.$register->signature_img }}"
                             width="100px" height="100px"
                        >
                    @endif
                    <img id="blah2"
                         class="display_none"
                         width="100px" height="100px"
                    >
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
{{--<div class="row mt-2">--}}
{{--    <div class="col-sm-12">--}}
{{--        <div class="info">--}}
{{--            <div class="info-heading mb-3">--}}
{{--                    <p class="text-center mb-0 custom_font_size"><strong>Quota কোটা</strong></p>--}}
{{--            </div>--}}
{{--            <div class="info-body quota">--}}

{{--                <div class="form-group row">--}}
{{--                    @foreach($quotas->chunk(3) as $chunk)--}}
{{--                        <div class="col-sm-4">--}}
{{--                            @foreach($chunk as $quota)--}}
{{--                                <input {{ isset($register) && in_array($quota->quota, $existQuotas) ? 'checked':'' }} type="checkbox"--}}
{{--                                       name="quota[]" class="quota_status {{ $quota->quota === 'Non Quota' ? 'non_quota':'' }}" value="{{ $quota->quota }}"> <small>{{ $quota->quota }}</small>--}}
{{--                                <br>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
            <div class="info-heading mb-3">
                    <p class="text-center mb-0 custom_font_size"><strong>Address</strong></p>
            </div>
{{--            ADDRESS             --}}
<div class="row mt-2">
    <div class="col-sm-6">
        <div class="info">
            <div class="info-heading mb-3">
                <div class="text-left">
                    <p class="text-center mb-0 custom_font_size"><strong>Mailing/Present Address</strong></p>
                </div>
            </div>
            <div class="info-body">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Care Of <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text"
                               value="{{ isset($register) ? $register->present_care_of : old('present_care_of') }}"
                               name="present_care_of" class="form-control form-control-sm present_care_of">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small style="word-wrap: break-word">
                            Village/Town/Road/House/Flat <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                                <textarea name="present_village" class="form-control form-control-sm present_village"
                                          rows="3">{{ isset($register) ? $register->present_village : old('present_village') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            District <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select
                                name="present_district"
                                id="present_upazila_id"
                                data-name="present_upazila"
                                class="custom-select custom-select-sm present_district"
                                onchange="itemChange(this)"
                        >
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option {{ isset($register) && $register->present_district == $district->name ? "selected" : ''}} value="{{ $district->name.",".$district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            P.S./Upazila <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">

                        <select
                                id="present_upazila"
                                name="present_upazila"
                                class="custom-select custom-select-sm present_upazila"
                        >
                            <option value="">Select Upazila</option>
                            <option value="{{ isset($register) ? $register->present_upazila : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->present_upazila : '' }}
                            </option>
                            @if(isset($register))
                                @foreach($upazilas as $upazila)
                                    <option value="{{ $upazila->name.",".$upazila->id }}">{{ $upazila->name }}</option>
                                @endforeach
                            @endif

                        </select>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Post Office <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="text"
                               value="{{ isset($register) ? $register->present_post_office : old('present_post_office') }}"
                               name="present_post_office" class="form-control form-control-sm present_post_office">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Post Code <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="number"
                               value="{{ isset($register) ? $register->present_post_code : old('present_post_code') }}"
                               name="present_post_code" class="form-control form-control-sm present_post_code">
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="info">
            <div class="info-heading mb-3">
                <div class="text-left">
                    <p class="text-center mb-0 custom_font_size"><span style="float: left; text-align: left; padding-left: 3px"><small>Same As Present Address </small>
                            <input id="presentCheck" {{ isset($register) && $register->same_as_present_address == 'true' ? 'checked' : '' }} id="same_as_present" type="checkbox" value="true" name="same_as_present_address"></span><b> Permanent Address</b></p>
                </div>
            </div>
            <div disabled="disabled" class="info-body">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Care Of <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 permanent_address_disable">
                        <input type="text"
                               value="{{ isset($register) ? $register->permanent_care_of : old('permanent_care_of') }}"
                               name="permanent_care_of" class="form-control form-control-sm permanent_care_of">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small style="word-wrap: break-word">
                            Village/Town/Road/House/Flat <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 permanent_address_disable">
                                <textarea name="permanent_village" class="form-control form-control-sm permanent_village"
                                          rows="3">{{ isset($register) ? $register->permanent_village : old('permanent_village') }}</textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            District <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 permanent_address_disable">
                        <select
                                name="permanent_district"
                                id="permanent_upazila_id"
                                data-name="permanent_upazila"
                                class="custom-select custom-select-sm permanent_district"
                                onchange="itemChange(this)"
                        >
                            <option value="">Select District</option>
                            @foreach($districts as $district)
                                <option {{ isset($register) && $register->permanent_district == $district->name ? "selected" : ''}} value="{{ $district->name.",".$district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            P.S./Upazila <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 permanent_address_disable">
                        <select
                                id="permanent_upazila"
                                name="permanent_upazila"
                                class="custom-select custom-select-sm permanent_upazila">
                            <option value="">Select Upazila</option>
                            <option value="{{ isset($register) ? $register->permanent_upazila : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->permanent_upazila : '' }}
                            </option>
                            @if(isset($register))
                                @foreach($upazilas as $upazila)
                                    <option value="{{ $upazila->name.",".$upazila->id }}">{{ $upazila->name }}</option>
                                @endforeach
                            @endif

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Post Office <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 permanent_address_disable">
                        <input type="text"
                               value="{{ isset($register) ? $register->permanent_post_office : old('permanent_post_office') }}"
                               name="permanent_post_office" class="form-control form-control-sm permanent_post_office">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Post Code <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 permanent_address_disable">
                        <input type="number"
                               value="{{ isset($register) ? $register->permanent_post_code : old('permanent_post_code') }}"
                               name="permanent_post_code" class="form-control form-control-sm permanent_post_code">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--            Contact Info        --}}
<div class="info mt-2">
    <div class="info-heading mb-3">
        <div class="text-center">
            <p class="text-center mb-0 custom_font_size"><strong>Contact Info</strong></p>
        </div>
    </div>
    <div class="info-body">
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Mobile Number <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input
                        type="number"
                        value="{{ isset($register) ? $register->mobile_number : old('mobile_number') }}"
                        name="mobile_number" class="form-control form-control-sm mobile_number"
                        placeholder="Enter your mobile number"
                >
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    E-mail <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="email" value="{{ isset($register) ? $register->email : old('email') }}"
                       name="email" class="form-control form-control-sm email"
                       placeholder="Enter Your email"
                >
                @error('email')
                <small id="question_feedback" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3 col">
                <small>
                    Password <span class="float-right">:</span>
                </small>
            </div>
            <div class="col-sm-9">
                <input type="password"
                       name="password" class="form-control form-control-sm password"
                       placeholder="Enter Your password"
                >
                @error('password')
                <small id="question_feedback" class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
    </div>
</div>

@if($type == 'lawyer')
{{--            SSC or Equivalent Info        --}}
<div class="info mt-2">
    <div class="info-heading mb-3">
        <div class="text-center">
            <p class="text-center mb-0 custom_font_size"><strong>SSC or Equivalent Level</strong></p>
        </div>
    </div>
    <div class="info-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Examination <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="ssc_examination" class="custom-select custom-select-sm ssc_examination"
                                id="ssc_examination_id"
                                data-name="ssc"
                                onchange="itemChange(this)"
                        >
                            <option value="">Select Section</option>
                            @foreach($ssc as $section)
                                <option {{ isset($register) && $register->ssc_examination == $section->section_name ? "selected" : ''}} value="{{ $section->section_name.",".$section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Board <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="ssc_board" class="custom-select custom-select-sm ssc_board">
                            <option value="">Select Board</option>
                            <option value="{{ isset($register) ? $register->ssc_board : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->ssc_board : '' }}
                            </option>
                            @foreach($boards as $board)
                                <option value="{{ $board->board_name }}">{{ $board->board_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Roll Number <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="number"
                               value="{{ isset($register) ? $register->ssc_roll_no : old('ssc_roll_no') }}"
                               name="ssc_roll_no" class="form-control form-control-sm ssc_roll_no">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Result <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 ssc_result_append">

                        <select name="ssc_result" onchange="changeResult(this, 'ssc')" class="custom-select custom-select-sm ssc_result">
                            <option value="">Select Result</option>
                            <option value="{{ isset($register) ? $register->ssc_result : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->ssc_result : '' }}
                            </option>
                            <option value="1st Class">1st Class</option>
                            <option value="2nd Class">2nd Class</option>
                            <option value="3rd Class">3rd Class</option>
                            <option value="CGPA(Out of 4)">CGPA(Out of 4)</option>
                            <option value="CGPA(Out of 5)">CGPA(Out of 5)</option>
                            <option value="Pass">Pass</option>
                        </select>

                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Group/Subject <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select
                                id="ssc"
                                name="ssc_group_subject"
                                class="custom-select custom-select-sm ssc ssc_add_other_subject ssc_group_subject">
                            <option value="">Select Subject</option>
                            <option value="{{ isset($register) ? $register->ssc_group_subject : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->ssc_group_subject : '' }}
                            </option>
                            @if(isset($subjects))
                                @foreach($subjects as $subject)
                                    @if($subject->class_id == 3)
                                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <input type="text" placeholder="Add Subject" name="ssc_add_other_subject"
                               class="ssc_add_other_subject ssc_add_other_subject_preview form-control form-control-sm display_none">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Passing Year <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="ssc_passing_year" class="custom-select custom-select-sm ssc_passing_year">
                            <option value="">Select Passing Year</option>
                            <option value="{{ isset($register) ? $register->ssc_passing_year : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->ssc_passing_year : '' }}
                            </option>

                            @php
                                $current_year = date("Y");
                                for ($x = 1970; $x <= $current_year; $x++) {
                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                }
                            @endphp

                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Registration No. <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="number"
                               value="{{ isset($register) ? $register->ssc_registration_no : old('ssc_registration_no') }}"
                               name="ssc_registration_no" class="form-control form-control-sm ssc_registration_no">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--            HSC or Equivalent Info        --}}
<div class="info mt-2">
    <div class="info-heading mb-3">
        <div class="text-center">
            <p class="text-center mb-0 custom_font_size"><strong>HSC or Equivalent Level</strong></p>
        </div>
    </div>
    <div class="info-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Examination <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="hsc_examination" class="custom-select custom-select-sm hsc_examination"
                                id="hsc_examination_id"
                                data-name="hsc"
                                onchange="itemChange(this)"
                        >
                            <option value="">Select Section</option>
                            @foreach($hsc as $section)
                                <option {{ isset($register) && $register->hsc_examination == $section->section_name ? "selected" : ''}} value="{{ $section->section_name.",".$section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Board <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="hsc_board" class="custom-select custom-select-sm hsc_board">
                            <option value="">Select Board</option>
                            <option value="{{ isset($register) ? $register->hsc_board : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->hsc_board : '' }}
                            </option>
                            @foreach($boards as $board)
                                <option value="{{ $board->board_name }}">{{ $board->board_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Roll Number <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="number"
                               value="{{ isset($register) ? $register->hsc_roll_no : old('hsc_roll_no') }}"
                               name="hsc_roll_no" class="form-control form-control-sm hsc_roll_no">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Result <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 hsc_result_append">

                        <select name="hsc_result" onchange="changeResult(this, 'hsc')"
                                class="custom-select custom-select-sm hsc_result">
                            <option value="">Select Result</option>
                            <option value="{{ isset($register) ? $register->hsc_result : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->hsc_result : '' }}
                            </option>
                            <option value="1st Class">1st Class</option>
                            <option value="2nd Class">2nd Class</option>
                            <option value="3rd Class">3rd Class</option>
                            <option value="CGPA(Out of 4)">CGPA(Out of 4)</option>
                            <option value="CGPA(Out of 5)">CGPA(Out of 5)</option>
                            <option value="Pass">Pass</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Group/Subject <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="hsc_group_subject"
                                id="hsc"
                                class="custom-select custom-select-sm hsc hsc_add_other_subject hsc_group_subject"
                        >
                            <option value="">Select Subject</option>
                            <option value="{{ isset($register) ? $register->hsc_group_subject : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->hsc_group_subject : '' }}
                            </option>
                            @if(isset($subjects))
                                @foreach($subjects as $subject)
                                    @if($subject->class_id == 4)
                                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <input type="text" placeholder="Add Subject" name="hsc_add_other_subject"
                               class="hsc_add_other_subject hsc_add_other_subject_preview form-control form-control-sm display_none">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Registration No. <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <input type="number"
                               value="{{ isset($register) ? $register->hsc_registration_no : old('hsc_registration_no') }}"
                               name="hsc_registration_no" class="form-control form-control-sm hsc_registration_no">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Passing Year <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="hsc_passing_year" class="custom-select custom-select-sm hsc_passing_year">
                            <option value="">Select Passing Year</option>
                            <option value="{{ isset($register) ? $register->hsc_passing_year : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->hsc_passing_year : '' }}
                            </option>

                            @php
                                $current_year = date("Y");
                                for ($x = 1970; $x <= $current_year; $x++) {
                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                }
                            @endphp

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--            Graduation or Equivalent Level         --}}
<div class="info mt-2">
    <div class="info-heading mb-3">
        <div class="text-center">
            <p class="text-center mb-0 custom_font_size"><strong>Graduation or Equivalent Level</strong> </p>
        </div>
    </div>
    <div class="info-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Examination <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="graduation_examination" class="custom-select custom-select-sm graduation_examination"
                                id="graduation_examination_id"
                                data-name="graduation"
                                onchange="itemChange(this)"
                        >
                            <option value="">Select Section</option>
                            @foreach($graduations as $graduation)
                                <option {{ isset($register) && $register->graduation_examination == $graduation->section_name ? "selected" : ''}} value="{{ $graduation->section_name.",".$graduation->id }}">{{ $graduation->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Institute <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">

                        <select name="graduation_institute" class="custom-select custom-select-sm graduation_institute">
                            <option value="">Select Institute</option>
                            @foreach($graduation_institutes as $graduation_institute)
                                <option {{isset($register) && $register->graduation_institute == $graduation_institute->institute_name ? 'Selected' : '' }} value="{{ $graduation_institute->institute_name }}">{{ $graduation_institute->institute_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Result<span class="float-right">:</span>
                        </small>
                    </div>

                    <div class="col-sm-8 graduation_result_append">
                        <select name="graduation_result" onchange="changeResult(this, 'graduation')" class="custom-select custom-select-sm graduation_result">
                            <option value="">Select Result</option>
                            <option {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->graduation_result : '' }}
                            </option>
                            <option value="1st Class">1st Class</option>
                            <option value="2nd Class">2nd Class</option>
                            <option value="3rd Class">3rd Class</option>
                            <option value="CGPA(Out of 4)">CGPA(Out of 4)</option>
                            <option value="CGPA(Out of 5)">CGPA(Out of 5)</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Subject/Degree <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="graduation_subject_degree"
                                id="graduation"
                                class="custom-select custom-select-sm graduation graduation_add_other_subject graduation_group_subject"
                        >
                            <option value="">Select Subject</option>
                            <option value="{{ isset($register) ? $register->graduation_subject_degree : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->graduation_subject_degree : '' }}
                            </option>
                            @if(isset($subjects))
                                @foreach($subjects as $subject)
                                    @if($subject->class_id == 5)
                                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <input type="text" placeholder="Add Subject" name="graduation_add_other_subject"
                               class="graduation_add_other_subject graduation_add_other_subject_preview form-control form-control-sm display_none">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Course Duration <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="graduation_course_duration" class="custom-select custom-select-sm graduation_course_duration">
                            <option value="">Select Course Duration</option>
                            <option value="{{ isset($register) ? $register->graduation_course_duration : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->graduation_course_duration : '' }}
                            </option>
                            <option value="4 years">4 years</option>
                            <option value="5 years">5 years</option>
                            <option value="3 years">3 years</option>
                            <option value="2 years">2 years</option>
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Passing Year <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="graduation_passing_year" class="custom-select custom-select-sm graduation_passing_year">
                            <option value="">Select Passing Year</option>
                            <option value="{{ isset($register) ? $register->graduation_passing_year : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->graduation_passing_year : '' }}
                            </option>

                            @php
                                $current_year = date("Y");
                                for ($x = 1970; $x <= $current_year; $x++) {
                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                }
                            @endphp

                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--            Masters or Equivalent Level         --}}
<div class="info mt-2">
    <div class="info-heading mb-3">
        <div class="text-center">
            <p class="custom_font_size text-center mb-0"><strong>Masters or Equivalent Level</strong> </p>
        </div>
    </div>
    <div class="info-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Examination <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="masters_examination" class="custom-select custom-select-sm masters_examination"
                                id="masters_examination_id"
                                data-name="masters"
                                onchange="itemChange(this)"
                        >
                            <option value="">Select Section</option>
                            @foreach($masters as $section)
                                <option {{ isset($register) && $register->masters_examination == $section->section_name ? "selected" : ''}} value="{{ $section->section_name.",".$section->id }}">{{ $section->section_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Institute <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="masters_institute" class="custom-select custom-select-sm masters_institute">
                            <option value="">Select Institute</option>
                            @foreach($master_institutes as $master_institute)
                                <option {{isset($register) && $register->masters_institute == $master_institute->institute_name ? 'Selected' : '' }} value="{{ $master_institute->institute_name }}">{{ $master_institute->institute_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Result<span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8 masters_result_append">
                        <select name="masters_result" onchange="changeResult(this, 'masters')" class="custom-select custom-select-sm masters_result">
                            <option value="">Select Result</option>
                            <option {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->masters_result : '' }}
                            </option>
                            <option value="1st Class">1st Class</option>
                            <option value="2nd Class">2nd Class</option>
                            <option value="3rd Class">3rd Class</option>
                            <option value="CGPA(Out of 4)">CGPA(Out of 4)</option>
                            <option value="CGPA(Out of 5)">CGPA(Out of 5)</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                </div>


            </div>
            <div class="col-sm-6">
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Subject/Degree <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="masters_subject_degree"
                                id="masters"
                                class="custom-select custom-select-sm masters masters_add_other_subject masters_group_subject"
                        >
                            <option value="">Select Subject</option>
                            <option value="{{ isset($register) ? $register->masters_subject_degree : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}
                            >
                                {{ isset($register) ? $register->masters_subject_degree : '' }}
                            </option>
                            @if(isset($subjects))
                                @foreach($subjects as $subject)
                                    @if($subject->class_id == 6)
                                        <option value="{{ $subject->subject_name }}">{{ $subject->subject_name }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                        <input type="text" placeholder="Add Subject" name="masters_add_other_subject"
                               class="masters_add_other_subject masters_add_other_subject_preview form-control form-control-sm display_none">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Course Duration <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="masters_course_duration" class="custom-select custom-select-sm masters_course_duration">
                            <option value="">Select Course Duration</option>
                            <option {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->masters_course_duration : '' }}
                            </option>
                            <option value="2 years">2 years</option>
                            <option value="1 year">1 year</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4 col">
                        <small>
                            Passing Year <span class="float-right">:</span>
                        </small>
                    </div>
                    <div class="col-sm-8">
                        <select name="masters_passing_year" class="custom-select custom-select-sm masters_passing_year">
                            <option value="">Select Passing Year</option>
                            <option value="{{ isset($register) ? $register->masters_passing_year : '' }}"
                                    {{ isset($register) ? 'selected' : 'style=display:none' }}>
                                {{ isset($register) ? $register->masters_passing_year : '' }}
                            </option>

                            @php
                                $current_year = date("Y");
                                for ($x = 1970; $x <= $current_year; $x++) {
                                    echo '<option value="'.$x.'">'.$x.'</option>';
                                }
                            @endphp

                        </select>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="form-group row">
    <div class="col-sm-2 col">
        <small>
            About Say <span class="float-right">:</span>
        </small>
    </div>
    <div class="col-sm-10">
        <textarea type="email" required
               name="about_say_you" class="form-control form-control-sm"
        >{{ isset($register) ? $register->about_say_you : old('about_say_you') }}</textarea>
        @error('about_say_you')
        <small id="question_feedback" class="text-danger">{{ $message }}</small>
        @enderror
    </div>
</div>

{{--            Professional Experience            --}}
@if(isset($register))
    <div class="profession-section appendNewProfession">
        @forelse($register->experiences as $experience)
            <div class="professionSection info mt-2 singleExperienceRow">
                <div style="padding: 6px 8px 12px 0!important; text-align: center" class="info-heading mb-3">
                        <small class="text-center mb-0 custom_font_size"><strong>Professional Experience @if($loop->index < 1) (Current
                                Job Fill Up First) @endif</strong> </small>
                        <span>
                            @if($loop->index >= 1)
                                <a onclick="deleteProfessionForUpdate(this)" data-id="{{ $experience->id }}"
                                   href="javascript:void(0)" class="btn btn-sm btn-danger float-right">Delete</a>
                            @else
                                <a onclick="deleteProfessionForUpdate(this)" data-id="{{ $experience->id }}"
                                   href="javascript:void(0)" class="btn btn-sm btn-danger float-right">Delete</a>
                                <button style="margin-right: 10px!important;" type="button" class="addNewProfession btn btn-sm btn-success float-right">
                                    Add New
                                </button>
                            @endif
                        </span>
                </div>

                <div class="info-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-4 col">
                                    <small>
                                        Designation/Post Name <span class="flot-right">:</span>
                                    </small>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ $experience->designation }}"
                                           name="designation[]" class="form-control form-control-sm designation">
                                </div>
                            </div>
                            <input type="hidden" class="experienceRows" name="experienceRows[]" value="{{ $experience->id }}">

                            <div class="form-group row">
                                <div class="col-sm-4 col">
                                    <small>
                                        Service Start <span class="float-right">:</span>
                                    </small>
                                </div>
                                <div class="col-sm-8">
                                    <input placeholder="Select Date" value="{{ $experience->start_date }}" name="start_date[]"
                                           class="form-control form-control-sm start_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 col">
                                    <small>
                                        Responsibilities <span class="float-right">:</span>
                                    </small>
                                </div>
                                <div class="col-sm-8">
                                            <textarea name="responsibilities[]"
                                                      class="form-control form-control-sm responsibilities">{{ $experience->responsibilities }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group row">
                                <div class="col-sm-4 col">
                                    <small>
                                        Organization Name <span class="float-right">:</span>
                                    </small>
                                </div>
                                <div class="col-sm-8">
                                    <input type="text" value="{{ $experience->organization_name }}"
                                           name="organization_name[]" class="form-control form-control-sm organization_name">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4 col">
                                    <small>
                                        Service End <span class="float-right">:</span>
                                    </small>
                                </div>
                                <div class="col-sm-8">
                                    <input placeholder="Select Date" value="{{ $experience->end_date  }}" name="end_date[]"
                                           class="form-control form-control-sm end_date">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group form-check">
                                        <small class="form-check-label">Till Now <span
                                                    class="float-right">:</span></small>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <select name="till_now[]" class="form-control form-control-sm till_now">
                                            <option value="No">No</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @empty

        @endforelse
    </div>

@else
    <div class="profession-section appendNewProfession">
        <div class="info mt-2 singleExperienceRow">
            <div style="padding: 6px 8px 12px 0!important; text-align: center" class="info-heading mb-3">
                <small class="custom_font_size text-center mb-0"><strong>Professional Experience</strong> </small>
                <button type="button" class="addNewProfession btn btn-sm btn-success float-right">
                    Add New
                </button>
            </div>



            <div class="info-body">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col">
                                <small>
                                    Designation/Post Name <span class="float-right">:</span>
                                </small>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="designation[]"
                                       class="form-control form-control-sm designation">
                            </div>
                        </div>
                        <input type="hidden" class="experienceRows" name="experienceRows[]">

                        <div class="form-group row">
                            <div class="col-sm-4 col">
                                <small>
                                    Service Start <span class="float-right">:</span>
                                </small>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" placeholder="Select Date" name="start_date[]"
                                       class="form-control form-control-sm start_date">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 col">
                                <small>
                                    Responsibilities <span class="float-right">:</span>
                                </small>
                            </div>
                            <div class="col-sm-8">
                                                <textarea name="responsibilities[]"
                                                          class="form-control form-control-sm responsibilities"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group row">
                            <div class="col-sm-4 col">
                                <small>
                                    Organization Name <span class="float-right">:</span>
                                </small>
                            </div>
                            <div class="col-sm-8">
                                <input type="text" name="organization_name[]"
                                       class="form-control form-control-sm organization_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-4 col">
                                <small>
                                    Service End<span class="float-right">:</span>
                                </small>
                            </div>
                            <div class="col-sm-8">
                                <input type="date" placeholder="Select Date" name="end_date[]"
                                       class="form-control form-control-sm end_date">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group form-check">
                                    <small class="form-check-label">Till Now <span class="float-right">:</span></small>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <select name="till_now[]" class="form-control form-control-sm till_now">
                                        <option value="No">No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif
@endif

