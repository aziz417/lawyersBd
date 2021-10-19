$(document).ready(function () {
    let editable = false;
    let roleData = null;

    $(".roleCreateModalShow").click(function () {

        $(".roleModalTitle").text('Create New Role');

        editable = false
        roleData = null

        $("#roleModalForm")[0].reset() // clear all input field
        $("#roleModal").modal('show')
    })

    $(".roleModalClose").click(function () {

        editable = false
        roleData = null

        $("#roleModal").modal('hide')
    })

    $("#roleModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/roles/';

        let formData = $(this).serializeArray();

        if (editable && roleData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/roles/' + roleData.slug
        }

        $.ajax({
            type: type,
            url: url,
            data: formData,
            timeout: 60000,
            success: function (res) {
                if (res.success) {

                    editable = false
                    roleData = null

                    location.reload();
                    $("#roleModal").modal('hide')
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


    // delete role
    $(".deleteRole").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        permission((res) => {
            if (res) {
                $.ajax({
                    type: "delete",
                    url: APP_URL + '/dashboard/roles/' + slug,
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


    // edit role
    $(".editRole").on('click', function () {
        event.preventDefault()
        let role_slug = $(this).data('role-slug')

        if (role_slug.length > 0){
            $.ajax({
                type: "get",
                url: APP_URL + '/dashboard/roles/'+role_slug+'/edit',
                success: (res) => {
                    if (res.success){
                        editable = true
                        roleData = res.data

                        $("#roleModalForm")[0].reset() // clear all input field
                        $("#roleModalForm #name").val(roleData.name)
                        $("#roleModal").modal('show')

                    }
                }
            });
        }




    })


    $('#roleModal').on('hidden.bs.modal', function () {
        editable = false
        roleData = false
    });

})
