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
            <th>Time Create Link Target</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($links as $link)
            <tr>
                <td id="myInput"> <a id="myInput" class="btn btn-info" href="{{route('code', $link->code) }}" target="_blank"> {{ $link->code }}</a></td>
                <td>{{ $link->original_url }}</td>
                <td>{{ $link->traffic }}</td>
                <td>{{ $link->created_at }}</td>
                <td><a href="{{ route('edit', $link->id) }}" class="btn btn-info">Edit</a></td>
                <td>
                    <form action="{{ route('delete', $link->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button  onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
{{--            <a class="btn btn-info" href="{{route('code', $link->code) }}" target="_blank"> {{ $link->code }}</a>--}}
        @endforeach
        {{ $links->links('vendor.pagination.bootstrap-4') }}
        </tbody>
    </table>

    <!-- Liên kết tới trang thêm mới đường dẫn -->
    <a class="btn btn-success" href="{{ route('links.create') }}">Thêm mới đường dẫn</a>

</div>
<script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script>
    let text = document.getElementById('myInput').innerHTML;
    const copyContent = async () => {
        try {
            await navigator.clipboard.writeText(text);
            console.log('Content copied to clipboard');
        } catch (err) {
            console.error('Failed to copy: ', err);
        }
    }
</script>
</body>
</html>


