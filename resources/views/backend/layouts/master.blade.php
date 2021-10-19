<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="icon" sizes="57x57" href="{{ asset('backend/favicon/favicon_400x400.jpg') }}">

    <title>@yield('title')</title>

    <link href="{{ asset('backend') }}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="{{ asset('backend') }}/css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="{{ asset('backend') }}/js/plugins/gritter/jquery.gritter.css" rel="stylesheet">
    {{--sweet alert--}}
    <link href="{{ asset('backend/css/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/plugins/iCheck/custom.css" rel="stylesheet">


    <link href="{{ asset('backend') }}/css/animate.css" rel="stylesheet">
    <link href="{{ asset('backend/css/coustom_style.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet">
    <link href="{{ asset('backend') }}/css/style.css" rel="stylesheet">

    @stack('style')

</head>

<body>
<div id="wrapper">

    @include('backend.layouts.elements.sidebar')

    <div id="page-wrapper" class="gray-bg dashbard-1">

        {{-- header--}}
        @include('backend.layouts.elements.header')

        {{--main content fluit--}}
        <div class="wrapper wrapper-content">
            @yield('content')
        </div>
        @include('backend.layouts.elements.footer')
    </div>

</div>

<!-- Mainly scripts -->
<script src="{{ asset('backend') }}/js/jquery-3.1.1.min.js"></script>
<script src="{{ asset('backend') }}/js/popper.min.js"></script>
<script src="{{ asset('backend') }}/js/bootstrap.js"></script>
<script src="{{ asset('backend') }}/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="{{ asset('backend') }}/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<script src="{{ asset('backend') }}/js/plugins/dataTables/datatables.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>


<!-- Flot -->
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.spline.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.resize.js"></script>
<script src="{{ asset('backend') }}/js/plugins/flot/jquery.flot.pie.js"></script>

<!-- Peity -->
<script src="{{ asset('backend') }}/js/plugins/peity/jquery.peity.min.js"></script>
<script src="{{ asset('backend') }}/js/demo/peity-demo.js"></script>

<!-- Custom and plugin javascript -->
<script src="{{ asset('backend') }}/js/inspinia.js"></script>
<script src="{{ asset('backend') }}/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
{{--<script src="{{ asset('backend') }}/js/plugins/jquery-ui/jquery-ui.min.js"></script>--}}

<!-- GITTER -->
<script src="{{ asset('backend') }}/js/plugins/gritter/jquery.gritter.min.js"></script>

<!-- Sparkline -->
<script src="{{ asset('backend') }}/js/plugins/sparkline/jquery.sparkline.min.js"></script>

<!-- Sparkline demo data  -->
<script src="{{ asset('backend') }}/js/demo/sparkline-demo.js"></script>

<!-- ChartJS-->
<script src="{{ asset('backend') }}/js/plugins/chartJs/Chart.min.js"></script>

<!-- Toastr -->
<script src="{{ asset('backend') }}/js/plugins/toastr/toastr.min.js"></script>

{{--Sweetalert--}}
<script src="{{ asset('backend/js/plugins/sweetalert/sweetalert.min.js') }}"></script>
<script src="{{ asset('backend/js/plugins/summernote/summernote-bs4.js')}}"></script>


<script>
    var APP_URL = {!! json_encode(url('/')) !!}

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function permission(callBack) {
        swal({
            title: 'Delete',
            text: "Do you want to delete?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: "#1ab394",
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete!'
        }, callBack)
    }


    $(document).ready(function(){

        $('.summernote1').summernote();
        $('.summernote2').summernote();

        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green',
        });
    });

    $(function () {

        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 2500
        };

        //Toastr message for domain event trigger
        @if(session('successMsg'))
        toastr.success('{{ session('successMsg') }}');
        @endif

        @if(session('errorMsg'))
        toastr.error('{{ session('errorMsg') }}');
        @endif
    });
    // show delete massage
    function deleteRow(id) {
        swal({
            title: "Are you sure about that?",
            text: "You will not be able to recover this item!",
            type: "warning",
            showCancelButton: true,
            allowOutsideClick: true,
            confirmButtonColor: "#1ab394",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: true,

        }, function () {
            document.getElementById('row-delete-form'+id).submit();
        });
    }

    function showAlertMessage(res) {
        swal({
            title: res.title,
            text: res.message,
            type: res.type,
            confirmButtonColor: "#1ab394",
        })
    }

  // image preview
    function imagePreview(event){
        var reader = new FileReader();
        var imageField = document.getElementById('image-field')

        reader.onload = function (){
            if(reader.readyState == 2){
                imageField.src = reader.result;
            }
        }
        reader.readAsDataURL(event.target.files[0]);
    }

</script>

<script src="{{ asset('backend') }}/js/plugins/iCheck/icheck.min.js"></script>
{{--Editor--}}

@stack('script')

</body>
</html>
