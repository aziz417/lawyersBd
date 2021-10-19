<style>
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
<!-- Large modal -->

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="container">
                <table width="100%">
                    <tr>
                        <td width="25%">
                            @if(isset($register))
                                <img src="{{ asset('uploads/applications').'/'.$register->image }}" id="profile_img_exist">
                            @endif
                                <img width="150px" height="200px" class="profile_img display_none">
                        </td>
                        <td width="75%">
                            <table class="primary-info" width="100%">
                                <tr>
                                    <th colspan="2">Personal Information</th>
                                </tr>
                                <tr>
                                    <td>Name of the post</td>
                                    <td class="preview_post_name_en"></td>
                                </tr>
                                <tr>
                                    <td>Applicant's Name</td>
                                    <td class="preview_applicants_name_en"></td>
                                </tr>
                                <tr>
                                    <td>Applicant's Name Banglai</td>
                                    <td class="preview_applicants_name_bn"></td>
                                </tr>
                                <tr>
                                    <td>Father's Name English</td>
                                    <td class="preview_father_name_en"></td>
                                </tr>
                                <tr>
                                    <td>Father's Name Banglai</td>
                                    <td class="preview_father_name_bn"></td>
                                </tr>
                                <tr>
                                    <td>Mother's Name English</td>
                                    <td class="preview_mother_name_en"></td>
                                </tr>
                                <tr>
                                    <td>Mother's Name Banglai</td>
                                    <td class="preview_mother_name_bn"></td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth</td>
                                    <td class="preview_date_Of_birth"></td>
                                </tr>
                                <tr>
                                    <td>Place of birth</td>
                                    <td class="preview_place_of_birth"></td>
                                </tr>
                                <tr>
                                    <td>Nationality</td>
                                    <td class="preview_nationality"></td>
                                </tr>
                                <tr>
                                    <td>Gender</td>
                                    <td class="preview_gender"></td>
                                </tr>
                                <tr>
                                    <td>National ID</td>
                                    <td class="preview_national_id"></td>
                                </tr>
                                <tr>
                                    <td>Birth Registration</td>
                                    <td class="preview_birth_registration"></td>
                                </tr>
                                <tr>
                                    <td>Passport ID</td>
                                    <td class="preview_passport_id"></td>
                                </tr>
                                <tr>
                                    <td>Religion</td>
                                    <td class="preview_religion"></td>
                                </tr>
                                <tr>
                                    <td>Marital Status</td>
                                    <td class="preview_marital_status"></td>
                                </tr>
                                <tr>
                                    <td>Quota</td>
                                    <td class="preview_quota"></td>
                                </tr>
                                <tr>
                                    <td>Contact Mobile</td>
                                    <td class="preview_mobile_number"></td>
                                </tr>
                                <tr>
                                    <td>E-mail</td>
                                    <td class="preview_email"></td>
                                </tr>
                                <tr>
                                    <td>Home District</td>
                                    <td class="preview_permanent_district"></td>
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
                                    <td class="preview_present_care_of"></td>
                                </tr>
                                <tr>
                                    <td>Village/Town/Road/ House/Flat</td>
                                    <td class="preview_present_village"></td>
                                </tr>
                                <tr>
                                    <td>District</td>
                                    <td class="preview_present_district"></td>
                                </tr>
                                <tr>
                                    <td>P.S./Upazila</td>
                                    <td class="preview_present_upazila"></td>
                                </tr>
                                <tr>
                                    <td>Post Office</td>
                                    <td class="preview_present_post_office"></td>
                                </tr>
                                <tr>
                                    <td>Post Code</td>
                                    <td class="preview_present_post_code"></td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            {{--    Permanent Address    --}}
                            <table class="present-address" width="100%">
                                <tr>
                                    <td>Care Of</td>
                                    <td class="preview_permanent_care_of"></td>
                                </tr>
                                <tr>
                                    <td>Village/Town/Road/ House/Flat</td>
                                    <td class="preview_permanent_village"></td>
                                </tr>
                                <tr>
                                    <td>District</td>
                                    <td class="preview_permanent_district"></td>
                                </tr>
                                <tr>
                                    <td>P.S./Upazila</td>
                                    <td class="preview_permanent_upazila"></td>
                                </tr>
                                <tr>
                                    <td>Post Office</td>
                                    <td class="preview_permanent_post_office"></td>
                                </tr>
                                <tr>
                                    <td>Post Code</td>
                                    <td class="preview_permanent_post_code"></td>
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
                        <td class="preview_ssc_examination"></td>
                        <td class="preview_ssc_board"></td>
                        <td class="preview_ssc_group_subject"></td>
                        <td class="preview_ssc_result"></td>
                        <td class="preview_ssc_passing_year"></td>
                        <td class="preview_ssc_roll_no"></td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td class="preview_hsc_examination"></td>
                        <td class="preview_hsc_board"></td>
                        <td class="preview_hsc_group_subject"></td>
                        <td class="preview_hsc_result"></td>
                        <td class="preview_hsc_passing_year"></td>
                        <td class="preview_hsc_roll_no"></td>
                        <td>N/A</td>
                    </tr>
                    <tr>
                        <td class="preview_graduation_examination"></td>
                        <td class="preview_graduation_institute"></td>
                        <td class="preview_graduation_group_subject"></td>
                        <td class="preview_graduation_result"></td>
                        <td class="preview_graduation_passing_year"></td>
                        <td>N/A</td>
                        <td class="preview_graduation_course_duration"></td>
                    </tr>
                    <tr>
                        <td class="preview_masters_examination"></td>
                        <td class="preview_masters_institute"></td>
                        <td class="preview_masters_group_subject"></td>
                        <td class="preview_masters_result"></td>
                        <td class="preview_masters_passing_year"></td>
                        <td>N/A</td>
                        <td class="preview_masters_course_duration"></td>
                    </tr>
                </table>
                <br>
                <b>Professional Experience</b>
                <table style="text-align: center" class="address-info" id="profesinoalExperiancePreview" width="100%">
                    <tr>
                        <th>Designation/Post</th>
                        <th>Organization</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Till Now</th>
                        <th>Responsibilities</th>
                    </tr>
                </table>
                <br>
                <br>
                <br>
                <table align="right" style="text-align: center">

                    <tr>
                        <td>
                            @if(isset($register))
                                <img src="{{ asset('uploads/applications').'/'.$register->signature_img }}" height="30px" width="100px" id="signature_img_exist">
                            @endif
                                <img class="signature_img display_none" height="30px" width="100px">

                            <br>
                            ---- Applicant Signature ----
                        </td>
                    </tr>
                </table>
            </div>
            <button type="submit" class="btn btn-primary modalSubmitBtn">Submit</button>
        </div>

    </div>
</div>