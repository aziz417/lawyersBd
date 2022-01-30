<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Find Lawyer</title>

    @include('frontend.layout.includes.all-css')
    @yield('style')
    <style>
        .team-detail > ul > li > h3{
            margin-top: 0 !important;
        }
        .team-detail {
            padding: 12px !important;
        }
        .title-box {
            margin-bottom: 30px !important;
        }
        section {
            padding: 40px 0 10px !important;
        }
    </style>

</head>
<body data-spy="scroll" data-target="#main-navbar" style="height: 100%!important;">
@include('frontend.layout.includes.header')
@yield('content')

@include('frontend.layout.includes.footer')

 @include('frontend.layout.includes.all-js')
@yield('script')

<script>
    function mailForm(lawyer){
        localStorage.setItem("lawyerName", lawyer.applicants_name);
        localStorage.setItem("lawyerEmail", lawyer.email);
        localStorage.setItem("lawyerId", lawyer.id);
        location.reload();
    }

    $(document).ready(function (){
        let name = localStorage.getItem("lawyerName")
        let email = localStorage.getItem("lawyerEmail")
        let id = localStorage.getItem("lawyerId")
        if (email){
            $("#contactTitle").html(name)
            $("#lawyerEmail").val(email)

            localStorage.removeItem("lawyerName");
            localStorage.removeItem("lawyerEmail");
            localStorage.removeItem("lawyerId");
        }else{
            $("#contactTitle").html("Admin")
            $("#lawyerEmail").val("admin@gmail.com")
        }
    })
</script>
</body>
</html>
