<!DOCTYPE html>
<html>
<head>
    <style>
        *{
            font-family: sans-serif;
            font-size: 12px;
        }

        th{
            border: 1px solid #FFFFFF;
            background: #A2A2A2;
            padding: 5px 0;
        }
        td{
            padding: 3px 3px;
        }

        table.primary-info , table.address-info{
            background: #DDDDDD;
            border: 2px solid #fff;
            border-collapse: collapse;
        }

        table.primary-info tr :nth-child(1){
            width: 34%;
            border: 1px solid #fff;
        }

        table.primary-info tr :nth-child(2){
            width: 66%;
            border: 1px solid #fff;
        }

        /*  Address table Info  */
        table.address-info td td{
            border: 1px solid #ffffff;
        }

        table.address-info tr td{
            width: 50%;
            border: 1px solid #fff;
        }

        table.present-address , table.present-address{
            border: none;
            background: #FFFFFF;
            border-collapse: collapse;
        }
        table.present-address td , table.present-address td{
            background: #DDDDDD;
        }
    </style>
</head>
<body>


{{-- Primary Info --}}

<table width="100%">
    <tr>
        <td width="25%">
            @if($register->image)
            <img src="uploads/applications/{{ @$register->image }}">
            @endif
        </td>
        <td width="75%">
            <table class="primary-info" width="100%">
                <tr>
                    <th colspan="2">Personal Information</th>
                </tr>
                <tr>
                    <td>Name of the post</td>
                    <td>{{ @$register->name_of_the_post }}</td>
                </tr>
                <tr>
                    <td>Applicant's Name</td>
                    <td>{{ @$register->applicants_name }}</td>
                </tr>
                <tr>
                    <td>Father's Name</td>
                    <td>{{ @$register->father_name }}</td>
                </tr>
                <tr>
                    <td>Mother's Name</td>
                    <td>{{ @$register->mother_name }}</td>
                </tr>
                <tr>
                    <td>Date Of Birth</td>
                    <td>{{ @$register->date_Of_birth }}</td>
                </tr>
                <tr>
                    <td>Place of birth</td>
                    <td>{{ @$register->place_of_birth }}</td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>{{ @$register->gender }}</td>
                </tr>
                <tr>
                    <td>Nationality</td>
                    <td>{{ @$register->nationality }}</td>
                </tr>
                <tr>
                    <td>National ID</td>
                    <td>{{ @$register->national_id }}</td>
                </tr>
                <tr>
                    <td>Birth Registration</td>
                    <td>{{ @$register->birth_registration }}</td>
                </tr>
                <tr>
                    <td>Passport ID</td>
                    <td>{{ @$register->passport_id }}</td>
                </tr>
                <tr>
                    <td>Religion</td>
                    <td>{{ @$register->religion }}</td>
                </tr>
                <tr>
                    <td>Marital Status</td>
                    <td>{{ @$register->marital_status }}</td>
                </tr>
                <tr>
                    <td>Quota</td>
                    <td>
                        @foreach($register->quotas as $quota)
                            {{ @$quota->quota }} ,
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <td>Contact Mobile</td>
                    <td>{{ @$register->mobile_number }}</td>
                </tr>
                <tr>
                    <td>E-mail</td>
                    <td>{{ @$register->email }}</td>
                </tr>
                <tr>
                    <td>Home District</td>
                    <td>{{ @$register->permanent_district  }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
{{-- Address Info --}}
<b>Address Information:</b>
<table class="address-info" width="100%">
    <tr>
        <th>Mailing/Present Address</th>
        <th>Permanent Address</th>
    </tr>
    <tr>
        {{--    Present Address    --}}
        <td>
            <table class="present-address" width="100%">
                <tr>
                    <td>Care Of</td>
                    <td>{{ @$register->applicants_name }}</td>
                </tr>
                <tr>
                    <td>Village/Town/Road/ House/Flat</td>
                    <td>{{ @$register->present_village }}</td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>{{ @$register->present_district }}</td>
                </tr>
                <tr>
                    <td>P.S./Upazila</td>
                    <td>{{ @$register->present_upazila }}</td>
                </tr>
                <tr>
                    <td>Post Office</td>
                    <td>{{ @$register->present_post_office }}</td>
                </tr>
                <tr>
                    <td>Post Code</td>
                    <td>{{ @$register->present_post_code }}</td>
                </tr>
            </table>
        </td>
        <td>
            {{--    Permanent Address    --}}
            <table class="present-address" width="100%">
                <tr>
                    <td>Care Of</td>
                    <td>{{ @$register->applicants_name }}</td>
                </tr>
                <tr>
                    <td>Village/Town/Road/ House/Flat</td>
                    <td>{{ @$register->permanent_village }}</td>
                </tr>
                <tr>
                    <td>District</td>
                    <td>{{ @$register->permanent_district }}</td>
                </tr>
                <tr>
                    <td>P.S./Upazila</td>
                    <td>{{ @$register->permanent_upazila }}</td>
                </tr>
                <tr>
                    <td>Post Office</td>
                    <td>{{ @$register->permanent_post_office }}</td>
                </tr>
                <tr>
                    <td>Post Code</td>
                    <td>{{ @$register->permanent_post_code }}</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<br>
{{-- Academic Info --}}
<b>Academic Qualifications:</b>
<table style="text-align: center" class="address-info" width="100%">
    <tr>
        <th>Examination</th>
        <th>Board/Institute</th>
        <th style="padding: 0 7px">Group/Subject/Degree</th>
        <th>Result</th>
        <th>Year</th>
        <th>Roll</th>
        <th>Duration</th>
    </tr>

    <tr>
        <td>{{ @$register->ssc_examination }}</td>
        <td>{{ @$register->ssc_board }}</td>
        <td>{{ @$register->ssc_group_subject }}</td>
        <td>{{ @$register->ssc_result }}</td>
        <td>{{ @$register->ssc_passing_year }}</td>
        <td>{{ @$register->ssc_roll_no }}</td>
        <td>N/A</td>
    </tr>
    <tr>
        <td>{{ @$register->hsc_examination }}</td>
        <td>{{ @$register->hsc_board }}</td>
        <td>{{ @$register->hsc_group_subject }}</td>
        <td>{{ @$register->hsc_result }}</td>
        <td>{{ @$register->hsc_passing_year }}</td>
        <td>{{ @$register->hsc_roll_no }}</td>
        <td>N/A</td>
    </tr>
    <tr>
        <td>{{ @$register->graduation_examination }}</td>
        <td>{{ @$register->graduation_institute }}</td>
        <td>{{ @$register->graduation_subject_degree }}</td>
        <td>{{ @$register->graduation_result }}</td>
        <td>{{ @$register->graduation_passing_year }}</td>
        <td>N/A</td>
        <td>{{ @$register->graduation_course_duration }}</td>

    </tr>
    <tr>
        <td>{{ @$register->masters_examination }}</td>
        <td>{{ @$register->masters_institute }}</td>
        <td>{{ @$register->masters_subject_degree }}</td>
        <td>{{ @$register->masters_result }}</td>
        <td>{{ @$register->masters_passing_year }}</td>
        <td>N/A</td>
        <td>{{ @$register->masters_course_duration }}</td>
    </tr>
</table>
<br>
{{-- Professional Experience --}}
@if($register->experiences->count() > 0)
    <b>Professional Experience</b>
    <table style="text-align: center" class="address-info" width="100%">
        <tr>
            <th>Designation/Post</th>
            <th>Organization</th>
            <th>Start Date</th>
            <th>End Date</th>
            <th>Till Now</th>
            <th>Responsibilities</th>
        </tr>
        @forelse($register->experiences as $experience)
            <tr>
                <td>{{ @$experience->designation }}</td>
                <td>{{ @$experience->organization_name }}</td>
                <td>{{ @$experience->start_date }}</td>
                <td>{{ @$experience->end_date }}</td>
                <td>{{ @$experience->till_now }}</td>
                <td>{{ @$experience->responsibilities }}</td>
            </tr>
        @empty

        @endforelse
    </table>
@else
    <p style="text-align: center">No Experiences</p>
@endif
<br>
I declare that the information provided in this form are correct, true and complete to the best of my knowledge and belief. If any information is
found false, incorrect, incomplete or if any ineligibility is detected before or after the examination, any action can be taken against me by the
Authority including cancellation of my candidature.
<br>
<br>
<br>
<table align="right" style="text-align: center">


    <tr>
        <td>
            @if($register->signature_img)
            <img height="30px" width="100px" src="uploads/applications/{{ @$register->signature_img }}">
            @endif
                <br>
            ---- Applicant Signature ----
        </td>
    </tr>
</table>
</body>
</html>

