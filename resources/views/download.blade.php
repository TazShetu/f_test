<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Download</title>
</head>
<body>
@forelse($documents as $document)
    <img src="{{$document->data()['url']}}" alt="image" style="max-width: 200px; max-height: 200px">
    <hr>
@empty
<h4>Nothing Found</h4>
@endforelse
</body>
</html>
