<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<form action="{{url('/test')}}" method="post"  enctype="multipart/form-data">
    @csrf
    <input type="file" name="images[]"  multiple="multiple" />
    <input type="submit" value="上传">
</form>
</body>
</html>