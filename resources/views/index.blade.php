<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="/login" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="username">
        <input type="submit" value="Login">
        @error('username')
            <p style="color: red">{{ $message }}</p>
        @enderror
    </form>
</body>

</html>
