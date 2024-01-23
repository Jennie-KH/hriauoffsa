@extends('template.master')


@section('content')
    <div class="card" style="margin-top: -30px">
        <div class="card-header card bg-primary text-white m-2 d-flex justify-content-center"
            style="height: 50px;font-size: 18px">
            ប្រព័ន្ធគ្រប់គ្រងធនធានមនុស្សរបស់អង្គភាពសវនកម្មផ្ទៃក្នុង</div>
        <div class="card-body">

            @yield('content-main')

        </div>
    </div>
@endsection
