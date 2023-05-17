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
    <h2 class="text-capitalize">create link spam</h2>
    <form action="{{ route('process_create') }}" method="post" class="form form-control">
        @csrf
        @method('POST')
        <label class="col-form-label">link spam</label>
        @error('spam_link')
        <div class="alert alert-danger" role="alert">
            nhập data
        </div>
        @enderror
       <div>
           <input class="form form-control" type="text" name="spam_link" placeholder="nhập link spam"
                  value="{{ old('spam_link') }}">
       </div>

        <button type="submit" class="btn btn-success mt-4">Create</button>
    </form>
</div>


<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
