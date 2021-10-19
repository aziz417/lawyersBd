$(document).ready(function () {

    let editable = false;
    let instituteData = null;

    $(".instituteCreateModalShow").click(function () {
        $(".instituteModalTitle").text('Institute Create');

        editable = false
        instituteData = null

        $("#instituteModalForm")[0].reset()
        $("#instituteModal").modal('show')
    })

    $(".instituteModalClose").click(function () {
        editable = false
        instituteData = null
        $("#instituteModal").modal('hide')
    })


    $("#instituteModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/institutes/';

        let formData = $(this).serializeArray();

        if (editable && instituteData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/institutes/' + instituteData.slug
        }

        $.ajax({
            type: type,
            url: url,
            data: formData,
            timeout: 60000,
            success: function (res) {
                if (res.success) {
                    editable = false
                    instituteData = null
                    location.reload();
                    $("#instituteModal").modal('hide')
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
    $(".changeInstituteStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')

        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/institute/' + slug + '/change-status',
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

    // delete institute
    $(".deleteInstitute").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        if (slug.length > 0){
            permission((res) => {
                if (res) {
                    $.ajax({
                        type: "delete",
                        url: APP_URL + '/dashboard/institutes/' + slug,
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


    // edit institute
    $(".editInstitute").on('click', function () {
        event.preventDefault()
        let institute_slug = $(this).data('slug')
        if (institute_slug.length > 0){
            $.ajax({
                type: "get",
                url: APP_URL + '/dashboard/institutes/'+institute_slug+'/edit',
                success: (res) => {
                    if (res.success){
                        editable = true
                        instituteData = res.data

                        $("#instituteModalForm")[0].reset() // clear all input field
                        $("#instituteModalForm #institute_name").val(instituteData.institute_name)
                        $('#class_type option').each(function() {
                            if($(this).val() == instituteData.class_type_id) {
                                $(this).prop("selected", true);
                            }
                        });
                        //$("div #class_type select").val(instituteData.class_type_id);
                        $("#instituteModal").modal('show')
                    }
                }
            });
        }

    })


    $('#instituteModal').on('hidden.bs.modal', function () {
        editable = false
        instituteData = null
    });




})
