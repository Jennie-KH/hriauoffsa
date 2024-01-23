{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HR AUOFFSA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <style>
        body {
            font-family: "Khmer", sans-serif;
        }

        /* .table th {
            text-align: center;
        } */

        .box-img {
            display: flex;
            justify-content: start;
            margin: 0;
            width: 100%;
            height: 100%;
        }

        .box-img img {
            height: 200px;
            width: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body> --}}

@extends('template.master')

@section('content')
    <div class="card">
        <div class="card-header card bg-primary text-white m-2 d-flex justify-content-center" style="height: 50px;">
            ប្រព័ន្ធគ្រប់គ្រងធនធានមនុស្សរបស់អង្គភាពសវនកម្មផ្ទៃក្នុង</div>
        <div class="card-body">

            @yield('content-main')

            {{-- <h1>{{ $difference->h }} : {{ $difference->i }}: {{ $difference->s }}</h1> --}}

        </div>
    </div>
@endsection
{{-- </body>

</html> --}}
