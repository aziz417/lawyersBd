<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Reply</title>
</head>
<body>
<div style="text-align: center">
    <a href="{{ route('home') }}">
        <img width="40%" src="{{ @$globalSettingInfo->image->url }}" alt="">
    </a>
</div>
<h2><strong>Name: </strong>{{ $reply_details['name'] }}</h2>
<hr>
<p><strong>Email: </strong>{{ $reply_details['reply_email'] }}</p>
<p><strong>Subject: </strong>{{ $reply_details['reply_subject'] }}</p>
<hr>
<p><strong>Reply Message Body: </strong>{{ $reply_details['reply_message'] }}</p>
</body>
</html>
