$(document).ready(function () {

    let editable = false;
    let subjectData = null;

    $(".subjectCreateModalShow").click(function () {
        $(".subjectModalTitle").text('Subject Create');

        editable = false
        subjectData = null

        $("#subjectModalForm")[0].reset()
        $("#subjectModal").modal('show')
    })

    $(".subjectModalClose").click(function () {
        editable = false
        subjectData = null
        $("#subjectModal").modal('hide')
    })


    $("#subjectModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/subjects/';

        let formData = $(this).serializeArray();

        if (editable && subjectData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/subjects/' + subjectData.slug
        }

        $.ajax({
            type: type,
            url: url,
            data: formData,
            timeout: 60000,
            success: function (res) {
                if (res.success) {
                    editable = false
                    subjectData = null
                    location.reload();
                    $("#subjectModal").modal('hide')
                    showAlertMessage(res)
                }
                if (!res.success){
                    showAlertMessage(res)
                }
            },
            error: function (xhr, status, error) {
                if (!$.isEmptyObject(xhr.responseText)) {
                    let jsonResponseText = $.parseJSON(xhr.responseText);
                    let message = jsonResponseText.message;
                    let errors = jsonResponseText.errors;
                    $.each(errors, function (name, val) {
                        $('#' + name).addClass('is-invalid');
                        $('#' + name + '_feedback').text(val);
                    });
                }
            }
        });

    });

    // change status
    $(".changeSubjectStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')

        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/subject/' + slug + '/change-status',
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

    // delete subject
    $(".deleteSubject").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        if (slug.length > 0){
            permission((res) => {
                if (res) {
                    $.ajax({
                        type: "delete",
                        url: APP_URL + '/dashboard/subjects/' + slug,
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
        }
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


    // edit subject
    $(".editSubject").on('click', function () {
        event.preventDefault()
        let subject_slug = $(this).data('slug')
        if (subject_slug.length > 0){
            $.ajax({
                type: "get",
                url: APP_URL + '/dashboard/subjects/'+subject_slug+'/edit',
                success: (res) => {
                    if (res.success){
                        editable = true
                        subjectData = res.data

                        $("#subjectModalForm")[0].reset() // clear all input field
                        $("#subjectModalForm #subject_name").val(subjectData.subject_name)
                        $('#class_type option').each(function() {
                            if($(this).val() == subjectData.class_type_id) {
                                $(this).prop("selected", true);
                            }
                        });
                        //$("div #class_type select").val(subjectData.class_type_id);
                        $("#subjectModal").modal('show')
                    }
                }
            });
        }

    })


    $('#subjectModal').on('hidden.bs.modal', function () {
        editable = false
        subjectData = null
    });




})
