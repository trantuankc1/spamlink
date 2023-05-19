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
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Spam Link</th>
            <th>Link Target</th>
            <th>Traffic</th>
            <th>IP</th>
            <th>Time</th>
        </tr>
        </thead>
        <tbody>
            @foreach($links as $link)
                <tr>
                    <td>{{ $link->code }}</td>
                    <td>{{ $link->original_url }}</td>
                    <td>{{ $link->traffic }}</td>
                    <td>{{ $link->ip_address }}</td>
                    <td>{{ $link->timestamp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $links->links('vendor.pagination.bootstrap-4') }}
</div>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>


