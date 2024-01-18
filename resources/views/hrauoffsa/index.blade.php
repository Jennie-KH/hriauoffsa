@extends('hrauoffsa.main')

@section('content')
    <h5 class="card-title">
        <form action="/hr">
            <div class="input-group mb-3">

                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Search</span>
                </div>
                <input type="text" name="search" class="form-control" placeholder="អត្តលេខ" aria-label="Username"
                    aria-describedby="basic-addon1">
            </div>
        </form>
    </h5>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">ឈ្មោះមន្ត្រី</th>
                <th scope="col">អត្តលេខ</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $key => $user)
                <tr>
                    <th scope="row">{{ $key + 1 }}</th>
                    <td>{{ $user->lastNameKh }} {{ $user->firstNameKh }}</td>
                    <td>{{ $user->idCard }}</td>
                    <td><a href="/attendance/{{ $user->id }}">ពិនិត្យ</a></td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endsection
