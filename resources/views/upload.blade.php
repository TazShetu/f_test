<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload</title>
</head>
<body>

<form action="">
    <input type="text" id="uniqueKey" placeholder="key" style="margin-bottom: 10px;">
    <br>
    <input type="file" id="file">
</form>

<script src="{{asset('js/jquery3.6.js')}}"></script>
<script type="module" src="{{asset('js/firebase_upload.js')}}"></script>

</body>
</html>
