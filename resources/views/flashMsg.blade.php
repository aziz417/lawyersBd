<style>

    .notificationMsg{
        position: fixed;
        z-index: 99;
        width: 25%;
        right: 0;
        background: #2f9445;
        float: right!important;
        margin: 0;
        padding: 11px 11px 8px 11px;
        opacity: 0.90;
    }
    .notificationErrorMsg{
        position: fixed;
        z-index: 99;
        width: 25%;
        right: 0;
        background: red;
        float: right!important;
        margin: 0;
        padding: 11px 11px 8px 11px;
        opacity: 0.90;
    }
    .notificationwarningMsg{
        position: fixed;
        z-index: 99;
        width: 25%;
        right: 0;
        background: #bbde79;
        float: right!important;
        margin: 0;
        padding: 11px 11px 8px 11px;
        opacity: 0.90;
    }
</style>


@if($message = Session::get('success'))
    <div class="notificationMsg alert alert-success">
        <button aria-hidden="true" data-dismiss="alert" class="close" style="color: #ffffff" type="button">×</button>
        <p style="color: #ffffff; margin-bottom: 7px;">{{ $message }}</p>
    </div>
@endif()
@if($message = Session::get('errorMsg'))
    <div class="notificationErrorMsg alert alert-success">
        <button aria-hidden="true" data-dismiss="alert" class="close" style="color: #ffffff" type="button">×</button>
        <p style="color: #ffffff; margin-bottom: 7px;">{{ $message }}</p>
    </div>
@endif()
@if($message = Session::get('warningMsg'))
    <div class="notificationwarningMsg alert alert-success">
        <button aria-hidden="true" data-dismiss="alert" class="close" style="color: black" type="button">×</button>
        <p style="color: black; margin-bottom: 7px;">{{ $message }}</p>
    </div>
@endif()