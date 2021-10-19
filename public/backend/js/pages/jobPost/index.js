$(document).ready(function (){
    let editable = false;
    let jobPostData = null;
    $(".jobPostCreateModalShow").click(function (){
        $("#Modal").modal('show')
    })

    $(".ModalClose").click(function (){
        $("#Modal").modal('hide')
    })

    $("#jobPostModalForm").submit(function (e){
        e.preventDefault();
        let formData = $(this).serializeArray();
        let type = "POST";
        let url = APP_URL + '/dashboard/jobposts/';

        if (editable && jobPostData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/jobposts/' + jobPostData.slug
        }
        $.ajax({
            type: type,
            url: url,
            data:formData,
            timeout: 60000,

           success: function (res){
                if (res.success){
                    location.reload();
                    $("#Modal").modal('hide')
                    showAlertMessage(res)
                }
           },
            error:function(xhr, status, error) {
                if (!$.isEmptyObject(xhr.responseText)){
                    let jsonResponseText    = $.parseJSON(xhr.responseText);
                    let message             = jsonResponseText.message;
                    let errors              = jsonResponseText.errors;
                    $.each(errors, function(name, val) {
                        $('#'+name).addClass('is-invalid');
                        $('#'+name+'_feedback').text(val);
                    });
                }
            }
        });
    });

    // edit job post
    $(".editJobPost").on('click', function () {
        event.preventDefault()
        let jobPost = $(this).data('job')

        editable = true
        jobPostData = jobPost

        $("#jobPostModalForm")[0].reset() // clear all input field
        $("#status").parent().removeClass('checked');

        $(".jobPostModalTitle").text('Update Job Post');
        $(".ModalSubmit").text('Update');
        $("#position_name").val(jobPost.position_name);
        $("#vacancy").val(jobPost.vacancy);
        $("#education_skill").val(jobPost.education_skill);
        $("#experience").val(jobPost.experience);
        $("#salary").val(jobPost.salary);
        $("#apply_fee").val(jobPost.apply_fee);
        $("#location").val(jobPost.location);
        $("#description").val(jobPost.description);
        $("#deadline").val(jobPost.deadline);

        if (jobPost.full_time === 1) {
            $("#full_time").parent().addClass('checked');
        }
        if (jobPost.part_time === 2) {
            $("#part_time").attr('checked');
        }
        if (jobPost.remotely === 3) {
            $("#remotely").attr('checked');
        }

        $("#Modal").modal('show')
    })


    $('#Modal').on('hidden.bs.modal', function () {
        editable = false
        jobPostData = false
    });

    // change status
    $(".jobPostStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')


        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/jobposts/' + slug + '/change-status ',
            success: (res) => {
                if (res.success) {
                    changeStatusAttr(status, $(this))
                    showAlertMessage(res);
                }
                if (!res.success) {
                    showAlertMessage(res);
                }

            }
        });
    })

    function changeStatusAttr(status, element) {
        let setBtnColor = ''
        let setRemoveColor = ''
        let setBtnText = ''

        if (status === 0) {
            setBtnColor = 'badge-primary'
            setRemoveColor = 'badge-warning'
            setBtnText = 'Active'
            $(element).data('status', 1)
        } else {
            setBtnColor = 'badge-warning'
            setRemoveColor = 'badge-primary'
            setBtnText = 'Deactivate'
            $(element).data('status', 0)
        }
        $(element).removeClass(setRemoveColor).addClass(setBtnColor)
        $(element).text(setBtnText)
    }

    // delete contact
    $(".deleteJobPost").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        console.log(slug)
        permission( (res) => {
            if (res) {
                $.ajax({
                    type: "delete",
                    url: APP_URL + '/dashboard/jobposts/' + slug,
                    success: (res) => {
                        if (res.success) {
                            $(this).parents('tr').remove()
                            showAlertMessage(res);
                        }
                        if (!res.success) {
                            showAlertMessage(res);
                        }
                    }
                });
            }
        });

    })


})
