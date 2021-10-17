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
<a href="{{route('download', ['key' => 'AADZ17'])}}">Download</a>
<hr>
<form action="">
    <input type="text" id="collection" value="smile" style="margin-bottom: 10px;">
    <br>
    <select name="" id="is_new">
        <option value="no">No</option>
        <option value="yes">yes</option>
    </select>
    <hr>
    <input type="file" id="file">
</form>

<script src="{{asset('js/jquery3.6.js')}}"></script>
<script type="module" src="{{asset('js/firebase_upload.js')}}"></script>

</body>
</html>
