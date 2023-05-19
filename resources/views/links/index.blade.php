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
<a href="{{ route('thong-ke') }}" class="btn btn-success mt-2 mb-3">thống kê</a>
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
                <td>
                    <a class="btn btn-info" href="{{ route('record-click', ['code' => $link->code]) }}" target="_blank">{{ $link->code }}</a>

                    <button class="btn btn-primary" onclick="copyLink('{{ route('code', $link->code) }}')">Copy</button>
                </td>
                <td>{{ $link->original_url }}</td>
                <td>{{ $link->traffic }}</td>
                <td>{{ $link->created_at }}</td>
                <td><a href="{{ route('edit', $link->id) }}" class="btn btn-info">Edit</a></td>
                <td>
                    <form action="{{ route('delete', $link->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Are you sure?')" class="btn btn-danger">Delete</button>
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
    function copyLink(link) {
        const textarea = document.createElement('textarea');
        textarea.value = link;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
    }

    function recordClick(code) {
        const xhr = new XMLHttpRequest();
        console.log(xhr)
        xhr.open('POST', '/record-click', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        const ipAddress = getIpAddress();
        const timestamp = new Date().toISOString();
        const data = JSON.stringify({ code: code, ipAddress: ipAddress, timestamp: timestamp });
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                console.log('Click recorded successfully.');
            }
        };

        xhr.send(data);
    }

    // Hàm lấy địa chỉ IP
    function getIpAddress() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', '/get-ip', false);
        xhr.send();

        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            const response = JSON.parse(xhr.responseText);
            return response.ipAddress;
        }

        return '';
    }
</script>
</body>
</html>


