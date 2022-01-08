<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Texas Lawers</title>

    @include('frontend.layout.includes.all-css')
    @yield('style')

</head>
<body data-spy="scroll" data-target="#main-navbar">
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
