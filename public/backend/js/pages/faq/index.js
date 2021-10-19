$(document).ready(function () {
    $(".faqCreateModalShow").click(function () {
        $("#FacModal").modal('show')
    })

    $(".faqModalClose").click(function () {
        $("#FacModal").modal('hide')
    })


    $("#faqModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/faqs';

        let formData = $(this).serializeArray();

        $.ajax({
            type: type,
            url: url,
            data: formData,
            timeout: 60000,
            success: function (res) {
                if (res.success) {
                    location.reload();
                    $("#FacModal").modal('hide')
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
    $(".changeFaqStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')

        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/faq/' + slug + '/change-status',
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
    // delete contact
    $(".deleteFaq").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        permission((res) => {
            if (res) {
                $.ajax({
                    type: "delete",
                    url: APP_URL + '/dashboard/faqs/' + slug,
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

})
