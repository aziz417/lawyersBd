$(document).ready(function () {
    let editable = false;
    let userData = null;

    $(".userCreateModalShow").click(function () {

        $("#userModalForm .password_section").removeClass('d-none')

        $(".userModalTitle").text('Create New User');

        editable = false
        userData = null

        $("#userModalForm")[0].reset() // clear all input field
        $("#status").parent().removeClass('checked');
        $("#userModal").modal('show')
    })

    $(".userModalClose").click(function () {

        editable = false
        userData = null

        $("#userModal").modal('hide')
    })

    $("#userModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/users/';

        let formData = $(this).serializeArray();

        if (editable && userData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/users/' + userData.slug
        }

        $.ajax({
            type: type,
            url: url,
            data: formData,
            timeout: 60000,
            success: function (res) {
              if (res.success) {

                    editable = false
                    userData = null

                    location.reload();
                    $("#userModal").modal('hide')
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
    $(".changeUserStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')


        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/users/' + slug + '/change-status ',
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
    // delete user
    $(".deleteUser").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        permission((res) => {
            if (res) {
                $.ajax({
                    type: "delete",
                    url: APP_URL + '/dashboard/users/' + slug,
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


    // edit user
    $(".editUser").on('click', function () {
        event.preventDefault()
        let user_slug = $(this).data('user-slug')

        if (user_slug.length > 0){
            $.ajax({
                type: "get",
                url: APP_URL + '/dashboard/users/'+user_slug+'/edit',
                success: (res) => {
                    if (res.success){
                        editable = true
                        userData = res.data

                        $("#userModalForm .password_section").addClass('d-none')
                        $("#userModalForm")[0].reset() // clear all input field

                        $("#userModalForm #name").val(userData.name)
                        $("#userModalForm #email").val(userData.email)
                        $("#userModalForm #role_id").val(userData.role_id)
                        $("#userModalForm #phone").val(userData.phone)
                        $("#userModalForm #telephone").val(userData.telephone)
                        $("#userModalForm #status").parent().addClass('checked')


                        $("#userModal").modal('show')

                    }
                }
            });
        }




    })


    $('#userModal').on('hidden.bs.modal', function () {
        editable = false
        userData = false
        $("#userModalForm .password_section").removeClass('d-none')
    });



})
