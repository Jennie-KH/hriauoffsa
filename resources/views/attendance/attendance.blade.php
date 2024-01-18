<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>test</title>
</head>

<body>

    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">UID</th>
                        <th scope="col">ID</th>
                        <th scope="col">State</th>
                        <th scope="col">Timestamp</th>
                        <th scope="col">Type
                            <br>
                            0=checkin
                            <br>
                            1=checkout
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $sl = 1;
                    @endphp

                    @foreach ($attendances as $attendance)
                        <tr>
                            <th scope="row">{{ $sl++ }}</th>
                            <td>{{ $attendance['uid'] }}</td>
                            <td>{{ $attendance['id'] }}</td>
                            <td>{{ $attendance['state'] }}</td>
                            <td>{{ $attendance['timestamp'] }}</td>
                            <td>{{ $attendance['type'] }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
