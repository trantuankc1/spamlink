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
<div class="container">
    <h2 class="text-capitalize">update link target</h2>
    <form action="{{ route('update', $link->id) }}" method="post" class="form form-control">
        @csrf
        @method('PUT')
        <input type="hidden" name="user_ip">
        <label class="col-form-label">link target</label>
        @error('spam_link')
        <div class="alert alert-danger" role="alert">
            nhập data
        </div>
        @enderror
        <input class="form form-control" type="text" name="target_link" placeholder="nhập link target" value="{{ $link->target_link }}">
        <button type="submit" class="btn btn-success mt-4">Update</button>
    </form>
</div>


<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
