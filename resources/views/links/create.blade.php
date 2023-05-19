<!-- Biểu mẫu thêm mới đường dẫn -->
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <title>Document</title>
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <form action="{{ route('create_code') }}" method="POST">
            @csrf
            <label for="url">Link Target:</label>
            <input class="form form-control" type="text" name="url" id="url">
            <button class="btn btn-success mt-2" type="submit">Thêm mới</button>
        </form>
    </div>

</div>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
