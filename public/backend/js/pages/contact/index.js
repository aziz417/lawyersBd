$(document).ready(function () {
    let editable = false;
    let contactData = null;

    $(".contactCreateModalShow").click(function () {

        $(".contactModalTitle").text('Create Contact');

        editable = false
        contactData = null

        $("#contactModalForm")[0].reset() // clear all input field
        $("#status").parent().removeClass('checked');
        $("#contactModal").modal('show')
    })

    $(".contactModalClose").click(function () {

        editable = false
        contactData = null

        $("#contactModal").modal('hide')
    })

    $("#contactModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/contacts/';

        let formData = $(this).serializeArray();

        if (editable && contactData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/contacts/' + contactData.slug
        }

        $.ajax({
            type: type,
            url: url,
            /*beforeSend: function () {
                // $(".pre-loader").fadeToggle("medium");
                console.log('go')
            },
            complete: function () {
                // $('.pre-loader').fadeOut();
                console.log('res')
            },*/
            data: formData,
            timeout: 60000,
            success: function (res) {
                if (res.success) {

                    editable = false
                    contactData = null

                    location.reload();
                    $("#contactModal").modal('hide')
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
    $(".changeContactStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')


        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/contacts/' + slug + '/change-status ',
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
    $(".deleteContact").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        permission((res) => {
            if (res) {
                $.ajax({
                    type: "delete",
                    url: APP_URL + '/dashboard/contacts/' + slug,
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


    // edit contact
    $(".editContact").on('click', function () {
        event.preventDefault()
        let contact = $(this).data('contact')
        console.log(contact);
        editable = true
        contactData = contact

        $("#contactModalForm")[0].reset() // clear all input field
        $("#status").parent().removeClass('checked');

        $(".contactModalTitle").text('Update Contact');
        $("#address").val(contact.address);
        $("#telephone").val(contact.telephone);
        $("#phone").val(contact.phone);
        $("#email").val(contact.email);

        if (contact.status === 1) {
            $("#status").parent().addClass('checked');
        }
        $("#contactModal").modal('show')
    })


    $('#contactModal').on('hidden.bs.modal', function () {
        editable = false
        contactData = false
    });



})
