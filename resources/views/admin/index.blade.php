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
    <h2>info</h2>
    <a href="{{ route('create_spamlink') }}" class="btn btn-success">create link spam</a>
    <table class="table table-bordered">
        <tr class="text-capitalize">
            <td>#</td>
            <td>spam link</td>
            <td>target link</td>
            <td>traffic</td>
        </tr>
        <tbody>

            @foreach($infors as $infor)

                <tr class="text-capitalize">
                    <td>{{ $infor->id }}</td>
                    <td>
                        <a href="{{ route('click', ['id' => $infor->id]) }}" target="_blank">{{ $infor->spam_link }}</a>

                    </td>
                    <td>{{ $infor->target_link }}</td>
                    <td>{{ $infor->click_count }}</td>
                    <td>
                        <form action="{{ route('delete', $infor->id) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('edit', $infor->id) }}" class="btn btn-info">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $infors->links('vendor.pagination.bootstrap-4') }}

</div>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
