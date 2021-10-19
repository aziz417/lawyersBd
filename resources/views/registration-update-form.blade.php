@extends('welcome')

@section('style')

@endsection

@section('content')
    @include('header')

    @include('flashMsg')

    <section class="section mt-4 mb-4">
        <div class="container">
            <form class="registerForm" action="{{ route('registrations.update', $register->id) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="col-sm-10 offset-1">
                    <div class="form-wrap">
                        @include('element')
                        <div class="updateAndPdfField">

                        </div>
                        <div class="submit-btn text-center mt-4">
                            <button
                                    style="padding: 1px 20px !important"
                                    type="submit"
                                    class="btn btn-success btn-lg">
                                Update
                            </button>
                            <a href="{{ route('search.register', $register->id) }}"
                                    style="padding: 1px 20px !important"
                                    type="submit"
                                    class="btn btn-primary btn-lg">
                                Reset
                            </a>
                            <button formtarget="_blank"
                                    style="padding: 1px 20px !important"
                                    class="btn btn-warning btn-lg updateAndPdfBtn">
                                Update & PDF
                            </button>
                            <button id="preview" type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".bd-example-modal-lg">Preview
                            </button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection
@section('script')

    <script>

        function openNewTab(key) {
            var registerKey = '&search_key='+key;
            window.open(
                'http://dgfp.teletalk.com.bd/dgfp1/form.php?post_id=168'+registerKey+'',
                '_blank',
            );
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    {{--  Permanent Address Hide  --}}
    <script>
        $('#presentCheck').click(function (event) {
            if (this.checked) {
                $('.permanent_address_disable').css("visibility", "hidden");
            }else {
                $('.permanent_address_disable').css("visibility", "visible");
            }

        })
    </script>
    {{--marital status spouse name field show--}}
    <script>
        $('input:radio[name="marital_status"]').change(function(){
            if ($(this).is(':checked') && $(this).val() == 'Married') {
                $('.spouse_name_remove').removeClass('display_none');

            }else{
                $('.spouse_name_remove').addClass('display_none');
            }
        });
    </script>
    <script>

        $(".date_Of_birth").flatpickr({
            dateFormat: "d/m/Y",
            maxDate: "today",
        });

        $(".start_date").flatpickr({
            dateFormat: "d/m/Y",
            maxDate: "today",
        });

        $(".end_date").flatpickr({
            dateFormat: "d/m/Y",
            maxDate: "today",
        });

        // when result cgpa input disable grade result and when result select grade disable cgpa
        function changeResult(e, classType) {
            $('.'+classType+'_other_result').remove();
            let result = e.value;
            if(result === 'CGPA(Out of 4)' || result === 'CGPA(Out of 5)' || result === 'other'){
                if (classType === 'ssc' || classType === 'hsc'){
                    var other_result_placeholder = classType.toUpperCase()
                }else{
                    var other_result_placeholder = classType.substr(0,1).toUpperCase()+classType.substr(1);
                }

                $('.'+classType+'_result_append').append(`<input name="${ classType }_other_result" class="form-control form-control-sm ${ classType }_other_result"
                    type="text" placeholder="Enter Your ${ other_result_placeholder } Result">`);
            }
        }

        // when non quota checked other all quotas disabled
        $('.non_quota').click(function (event) {
            if (this.checked) {
                $(':checkbox').slice(1).each(function () {
                    $(this).attr('disabled', 'disabled');
                });
                $("#presentCheck").removeAttr("disabled");

            } else {
                $(':checkbox').slice(1).each(function () {
                    $(this).removeAttr('disabled');
                })
            }
        })

    </script>

   {{-- //auto suggest--}}
    <script type="text/javascript">
        function getSuggestion(e) {
            var search = $(e).val();

            if (search.trim() === ''){
                $('#show-suggestion').html('').addClass('hidden');
                return;
            }

            $.get('{{ route("register.search.autocomplete") }}', { search : search }, function(response){
                if(response.length > 0){
                    $('#show-suggestion').removeClass('hidden').html(response);
                }else{
                    $('#show-suggestion').addClass('hidden');
                }
            });
        }
    </script>

    <script>

        $('#preview').on('click', function () {

            $('.singleExperienceRow').each(function (index, row) {

                let designation = $(row).find('.designation').val()
                let organization_name = $(row).find('.organization_name').val()
                let start_date = $(row).find('.start_date').val()
                let end_date = $(row).find('.end_date').val()
                let till_now = $(row).find('.till_now').val()
                let responsibilities = $(row).find('.responsibilities').val()

                let html = `<tr>
                    <td>${designation}</td>
                    <td>${organization_name}</td>
                    <td>${start_date}</td>
                    <td>${end_date}</td>
                    <td>${till_now}</td>
                    <td>${responsibilities}</td>
                </tr>`

                $('#profesinoalExperiancePreview').append(html)
            })

            let fieldNames = [
                //basic info
                'post_name_en', 'applicants_name_en', 'applicants_name_bn', 'father_name_en',
                'father_name_bn', 'mother_name_en', 'mother_name_bn', 'date_Of_birth',
                'place_of_birth', 'nationality', 'gender', 'national_id', 'birth_registration',
                'passport_id', 'religion', 'marital_status', 'mobile_number', 'email',

                //address
                'present_care_of', 'present_village', 'present_upazila', 'present_post_office',
                'present_post_code', 'permanent_care_of', 'permanent_village', 'permanent_upazila',
                'permanent_post_office', 'permanent_post_code',

                //education
                'ssc_board', 'ssc_roll_no', 'ssc_passing_year', 'ssc_registration_no',
                'hsc_board', 'hsc_roll_no', 'hsc_passing_year', 'hsc_registration_no',
                'graduation_institute', 'graduation_course_duration', 'graduation_passing_year',
                'masters_institute', 'masters_course_duration', 'masters_passing_year',
            ];

            let radioTypeFieldNames = ['gender', 'marital_status']

            $(fieldNames).each(function (index, fieldName) {
                if (radioTypeFieldNames.includes(fieldName)) {
                    $(".preview_" + fieldName).html($(`input[name=${fieldName}]:checked`).val())
                } else {
                    $(".preview_" + fieldName).html($('.' + fieldName).val())
                }
            })

            // quota
            $(".quota").find(".quota_status").each(function () {
                if ($(this).prop('checked') == true) {
                    $(".preview_quota").append($(this).val() + ', ')
                }
            });

            {{-- Address Info --}}
            $(".preview_present_district").html($('.present_district').val().split(",")[0])
            $(".preview_permanent_district").html($('.permanent_district').val().split(",")[0])

            let sections = ['ssc', 'hsc', 'graduation', 'masters']

            $(sections).each(function (index, section){

                // subject / group
                if ($('.'+section+'_group_subject').val() == 'other') {
                    $('.preview_'+section+'_group_subject').html($('.'+section+'_add_other_subject_preview').val())
                } else {
                    $('.preview_'+section+'_group_subject').html($('.'+section+'_group_subject').val())
                }

                // result
                let result = $('.'+section+'_result').val();
                if(result === 'CGPA(Out of 5)'){
                    $('.preview_'+section+'_result').html($('.'+section+'_other_result').val()+" (Out of 5)")
                } else if (result === 'CGPA(Out of 4)'){
                    $('.preview_'+section+'_result').html($('.'+section+'_other_result').val()+" (Out of 4)")
                }else{
                    $('.preview_'+section+'_result').html(result)
                }

                //examination
                $('.preview_'+section+'_examination').html($('.'+section+'_examination').val().split(",")[0])
            })
        })


        $(".modalSubmitBtn").on('click', function () {
            event.preventDefault();
            $('.registerForm').submit()
        })
    </script>
    <script>
        $(".updateAndPdfBtn").on('click', function (){
            $(".updateAndPdfField").append('<input name="updateAndPdfField" value="updateAndPdfField" type="hidden">');
            $(".updateAndPdf").submit();
        })
        setTimeout(function(){  $(".alert").hide('slow', function(){ $(".alert").remove(); }); }, 5000);

        $("#pdfGenerate").on('click', function (){
             var key = $("#searchKey").val();
            if (key){
                $(".pdfRequestSend").removeAttr("action");
                let url = "{{ route('pdf.view', [':key']) }}".replace(':key', key);
                $(".pdfRequestSend").attr("action", url).submit();
            }
        })

        $(document).ready(function (){
            $(".ssc").change(function (){
                if($(this).val() == 'other'){
                    $(".ssc_add_other_subject").removeClass('display_none')
                }
            })

            $(".hsc").change(function (){
                if($(this).val() == 'other'){
                    $(".hsc_add_other_subject").removeClass('display_none')
                }
            })

            $(".graduation").change(function (){
                if($(this).val() == 'other'){
                    $(".graduation_add_other_subject").removeClass('display_none')
                }
            })

            $(".masters").change(function (){
                if($(this).val() == 'other'){
                    $(".masters_add_other_subject").removeClass('display_none')
                }
            })
        })

        function itemChange(val){
            var id = $(val).val()
            var itemName = id.split(",")[0];
            id = id.split(",")[1];
            var name = $(val).data("name")
            var name = name;
            var appendClassName = '.'+name;

            selectClear(name);
            getData(id, name, itemName, appendClassName);
        }
        function selectClear(name){
            if(name === 'permanent_upazila') {
                $('.'+name).find('option').not(':first').remove();
            }
            if(name === 'present_upazila') {
                $('.'+name).find('option').not(':first').remove();
            }
            if(name === 'ssc') {
                $('.'+name).find('option').not(':first').remove();
            }
            if(name === 'hsc') {
                $('.'+name).find('option').not(':first').remove();
            }
            if(name === 'graduation') {
                $('.'+name).find('option').not(':first').remove();
            }
            if(name === 'masters') {
                $('.'+name).find('option').not(':first').remove();
            }

        }

        function getData(id, name, itemName, appendClassName){
            $.get('{{ route("select.items") }}', {id: id, itemName:itemName, name:name}, function (response) {
                var i = 0;
                for (i; i < response.length; i++) {
                    //var id = response[i].id;
                    var name = response[i].name;
                    $(appendClassName).append(`<option value="${name}"> ${name} </option>`);
                }
                $(appendClassName).append(`<option value="other"> Other </option>`);
            });
        }
    </script>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#profile_old_img").addClass('display_none')
                    $(".profile_img").removeClass('display_none')
                    $("#profile_img_exist").addClass('display_none')
                    $("#blah").removeClass('display_none')
                    $('#blah').attr('src', e.target.result);
                    $('.profile_img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURL2(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $("#signature_old_img").addClass('display_none')
                    $(".signature_img").removeClass('display_none')
                    $("#signature_img_exist").addClass('display_none')
                    $("#blah2").removeClass('display_none')
                    $('#blah2').attr('src', e.target.result);
                    $('.signature_img').attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script>
        $(".addNewProfession").on('click', function () {
            $(".appendNewProfession").append('<div id="experienceInfo" class="info mt-2 singleExperienceRow">\n' +
                '                  <div style="padding: 6px 8px 12px 0!important; text-align: center" class="info-heading mb-3">\n' +
                '<small class="text-center mb-0 custom_font_size"><strong>Professional Experience</strong> </small>\n' +
                '<a onclick="deleteProfession(this)" href="javascript:void(0)" class="btn btn-sm btn-danger float-right">Delete</a>\n' +
                '</div>\n'+
                '                  <div class="info-body">\n' +
                '                      <div class="row">\n' +
                '                          <div class="col-sm-6">\n' +
                '                              <div class="form-group row">\n' +
                '                                  <div class="col-sm-4 col">\n' +
                '                                      <small>\n' +
                '                                          Designation/Post Name <span class="float-right">:</span>\n' +
                '                                      </small>\n' +
                '                                  </div>\n' +
                '                                  <div class="col-sm-8">\n' +
                '                                      <input type="text" name="designation[]" class="form-control form-control-sm designation">\n' +
                '                                  </div>\n' +
                '                              </div>\n' +
                '                                          <input type="hidden" name="experienceRows[]">\n' +

                '                              <div class="form-group row">\n' +
                '                                  <div class="col-sm-4 col">\n' +
                '                                      <small>\n' +
                '                                          Service Start <span class="float-right">:</span>\n' +
                '                                      </small>\n' +
                '                                  </div>\n' +
                '                                  <div class="col-sm-8">\n' +
                '                                      <input placeholder="Select Date" name="start_date[]" class="form-control form-control-sm start_date">\n' +
                '                                  </div>\n' +
                '                              </div>\n' +
                '                              <div class="form-group row">\n' +
                '                                  <div class="col-sm-4 col">\n' +
                '                                      <small>\n' +
                '                                          Responsibilities <span class="float-right">:</span>\n' +
                '                                      </small>\n' +
                '                                  </div>\n' +
                '                                  <div class="col-sm-8">\n' +
                '                                      <textarea name="responsibilities[]" class="form-control form-control-sm responsibilities"></textarea>\n' +
                '                                  </div>\n' +
                '                              </div>\n' +
                '                          </div>\n' +
                '                          <div class="col-sm-6">\n' +
                '                              <div class="form-group row">\n' +
                '                                  <div class="col-sm-4 col">\n' +
                '                                      <small>\n' +
                '                                          Organization Name <span class="float-right">:</span>\n' +
                '                                      </small>\n' +
                '                                  </div>\n' +
                '                                  <div class="col-sm-8">\n' +
                '                                      <input type="text" name="organization_name[]" class="organization_name form-control form-control-sm">\n' +
                '                                  </div>\n' +
                '                              </div>\n' +
                '                              <div class="form-group row">\n' +
                '                                  <div class="col-sm-4 col">\n' +
                '                                      <small>\n' +
                '                                          Service End <span class="float-right">:</span>\n' +
                '                                      </small>\n' +
                '                                  </div>\n' +
                '                                  <div class="col-sm-8">\n' +
                '                                      <input placeholder="Select Date" name="end_date[]" class="end_date form-control form-control-sm">\n' +
                '                                  </div>\n' +
                '                              </div>\n' +
                '                              <div class="row">\n' +
                '                                            <div class="col-sm-4">\n' +
                '                                                <div class="form-group form-check">\n' +
                '                                                    <small class="form-check-label">Till Now <span class="float-right">:</span></small>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                            <div class="col-sm-8">\n' +
                '                                                <div class="form-group">\n' +
                '                                                    <select name="till_now[]" class="till_now form-control form-control-sm">\n' +
                '                                                        <option value="No">No</option>\n' +
                '                                                        <option value="Yes">Yes</option>\n' +
                '                                                    </select>\n' +
                '                                                </div>\n' +
                '                                            </div>\n' +
                '                                        </div>' +
                '                          </div>\n' +
                '                      </div>\n' +
                '                  </div>\n' +
                '              </div>');

            $(".start_date").flatpickr({
                dateFormat: "d/m/Y",
                maxDate: "today",
            });

            $(".end_date").flatpickr({
                dateFormat: "d/m/Y",
                maxDate: "today",
            });
        });

        function deleteProfession(e) {
            $(e).parents('#experienceInfo').remove();
        }

        function deleteProfessionForUpdate(e) {
            var id = $(e).attr("data-id");
            $.get('{{ route('experience.delete') }}', {id: id}, function (response) {
                $(e).parents('.professionSection').remove();
            });
        }
    </script>
@endsection