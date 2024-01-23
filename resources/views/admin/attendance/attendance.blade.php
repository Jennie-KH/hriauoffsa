@extends('template.main')
@section('content')

@section('content-main')
<div class="card">
    <div class="table-responsive ">
        <table class="table table-bordered   align-middle mb-0 bg-white">
        <thead >
            <tr>
            <th>ឈ្មោះ</th>
            <th>កាត់សម្គាល់</th>
            <th>តួនាទី</th>
            <th>ស្ថានការណ៍</th>
            <th>សកម្មភាព</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $row)
            <tr>
                <td>
                    <div class="d-flex align-items-center">
                    <img
                        src="{{ asset('images/' . $row->img) }}"
                        alt=""
                        style="width: 45px; height: 45px"
                        class="rounded-circle"
                        />
                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{$row->user_name}}</p>
                        <p class="text-muted mb-0">{{$row->email}}</p>
                    </div>
                    </div>
                </td>
                <td>
                    <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1  ">{{$row->card_id}}</p>
                    </div>
                    </div>
                </td>
                <td>
                    <!-- <p class="fw-normal mb-1">Software engineer</p> -->
                    <p class="text-muted mb-0">{{$row->role}}</p>
                </td>
                <td>
                    <span class="badge badge-success rounded-pill d-inline">
                    @if ($row->active == 1)
                        សកម្ម
                    @endif
                    </span>
                </td>
                <td>
                    <button type="button" class="btn btn-primary btn-sm btn-rounded">
                        View
                    </button>
                </td>
            </tr>
            @endforeach
        
        </tbody>
        </table>
    </div>
</div>
  

@endsection
