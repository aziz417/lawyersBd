$(document).ready(function () {

    let editable = false;
    let boardData = null;

    $(".boardCreateModalShow").click(function () {
        $(".boardModalTitle").text('Board Create');

        editable = false
        boardData = null

        $("#boardModalForm")[0].reset()
        $("#BoardModal").modal('show')
    })

    $(".boardModalClose").click(function () {
        editable = false
        boardData = null
        $("#BoardModal").modal('hide')
    })


    $("#boardModalForm").submit(function (e) {
        e.preventDefault();

        let type = 'POST';
        let url = APP_URL + '/dashboard/boards/';

        let formData = $(this).serializeArray();

        if (editable && boardData !== null) {
            type = 'put'
            url = APP_URL + '/dashboard/boards/' + boardData.slug
        }

        $.ajax({
            type: type,
            url: url,
            data: formData,
            timeout: 60000,
            success: function (res) {
                if (res.success) {

                    editable = false
                    boardData = null

                    location.reload();
                    $("#BoardModal").modal('hide')
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
    $(".changeBoardStatus").on('click', function () {
        event.preventDefault()
        // $(this).parents('tr').remove()

        let slug = $(this).data('slug')
        let status = $(this).data('status')

        $.ajax({
            type: "get",
            url: APP_URL + '/dashboard/board/' + slug + '/change-status',
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

    // delete board
    $(".deleteBoard").on('click', function () {
        event.preventDefault()
        let slug = $(this).data('slug')
        if (slug.length > 0){
            permission((res) => {
                if (res) {
                    $.ajax({
                        type: "delete",
                        url: APP_URL + '/dashboard/boards/' + slug,
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


    // edit board
    $(".editBoard").on('click', function () {
        event.preventDefault()
        let board_slug = $(this).data('slug')
        if (board_slug.length > 0){
            $.ajax({
                type: "get",
                url: APP_URL + '/dashboard/boards/'+board_slug+'/edit',
                success: (res) => {
                    if (res.success){
                        editable = true
                        boardData = res.data

                        $("#boardModalForm")[0].reset() // clear all input field
                        $("#boardModalForm #board_name").val(boardData.board_name)
                        $("#BoardModal").modal('show')
                    }
                }
            });
        }

    })


    $('#boardModal').on('hidden.bs.modal', function () {
        editable = false
        boardData = null
    });




})
