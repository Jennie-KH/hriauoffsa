@extends('template.main')


@section('content-main')
    <div id="clock"></div>
    <div class="card-title​​ mb-2">ព័ត៌មានលម្អិតមន្ត្រី</div>

    <div class="row">
        <div class="col-lg-2"></div>
        <div class="col-lg-2 col-sm-12 d-flex justify-content-center align-items-center">
            <div class="box-img-attendance">
                <img src="{{ asset('images/' . $user->image) }}" alt="">
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">គោត្តនាម​ នាម</th>
                        <td>{{ $user->lastNameKh }} {{ $user->firstNameKh }}</td>
                    </tr>
                    <tr>
                        <th scope="row">មុខដំណែង</th>
                        <td>{{ $user->role->roleNameKh }}</td>
                    </tr>
                    <tr>
                        <th scope="row">អត្តលេខ</th>
                        <td>{{ $user->idCard }}</td>
                    </tr>
                    <tr>
                        <th>លេខទំនាក់ទំនង</th>
                        <td colspan="2">{{ $user->phoneNumber }}</td>
                    </tr>
                    <tr>
                        <th>អ៊ីម៉៉ែល</th>
                        <td colspan="2">{{ $user->email }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-lg-2"></div>
    </div>

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button"
                role="tab" aria-controls="nav-home" aria-selected="true">Today</button>
            <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button"
                role="tab" aria-controls="nav-profile" aria-selected="false">Yesterday</button>
            <button class="nav-link" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button"
                role="tab" aria-controls="nav-contact" aria-selected="false">Month</button>
        </div>
    </nav>
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row mt-4">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th rowspan="4" style="text-align: center">ទិន្នន័យស្គេន
                                <span>
                                    @if ($today)
                                        {{ $today }}
                                    @else
                                        ពុំមានការស្កេន
                                    @endif
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th style="text-align: center">ការស្គេនពេលព្រឹក</th>
                            <th style="text-align: center">ការស្គេនពេលថ្ងៃ </th>
                        </tr>
                        <tr>
                            <th style="text-align: center">(ម៉ោងចូល)</th>
                            <th style="text-align: center">(ម៉ោងចេញ)</th>
                        </tr>
                        <tr>

                            <th style="text-align: center">
                                @if ($attendanceFirst)
                                    <?php
                                    $morning = date('h:i:s', strtotime($attendanceFirst->timeScan));
                                    ?>
                                    {{ $morning }}
                                @else
                                    ពុំមានការស្កេន
                                @endif
                            </th>
                            <th style="text-align: center">
                                @if ($attendanceLast)
                                    <?php
                                    $evening = date('h:i:s', strtotime($attendanceLast->timeScan));
                                    ?>
                                    {{ $evening }}
                                @else
                                    ពុំមានការស្កេន
                                @endif
                            </th>
                        </tr>
                    </tbody>
                </table>

                <h1>Total: {{ $difference->h }}h {{ $difference->i }}m {{ $difference->s }}s</h1>

            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            {{-- <div class="row mt-4">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th rowspan="4" style="text-align: center">ទិន្នន័យស្គេនថ្ងៃ
                                {{ $attendanceFirst12 }}</th>
                        </tr>
                        <tr>
                            <th style="text-align: center">ការស្គេនពេលព្រឹក</th>
                            <th style="text-align: center">ការស្គេនពេលថ្ងៃ </th>

                        </tr>
                        <tr>
                            <th style="text-align: center">(ម៉ោងចូល)</th>
                            <th style="text-align: center">(ម៉ោងចេញ)</th>
                        </tr>
                        <tr>
                            <th style="text-align: center">{{ $attendanceFirst12 }}</th>
                            <th style="text-align: center">{{ $attendanceLast12 }}</th>
                        </tr>
                    </tbody>
                </table>

                <h1>Total: {{ $difference12->h }}h {{ $difference12->i }}m {{ $difference12->s }}s</h1>
            </div> --}}
        </div>
        <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div>
@endsection

<script>
    function displayTime() {

        // let h = "{{ $difference->h }}";
        // let i = "{{ $difference->i }}";
        // let s = "{{ $difference->s }}";

        var date = new Date();
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var seconds = date.getSeconds();

        // Convert to 12-hour format
        var ampm = (hours >= 12) ? 'PM' : 'AM';
        hours = hours % 12;
        hours = (hours === 0) ? 12 : hours;

        // Add leading zeros if necessary
        hours = (hours < 10) ? '0' + hours : hours;
        minutes = (minutes < 10) ? '0' + minutes : minutes;
        seconds = (seconds < 10) ? '0' + seconds : seconds;

        var time = hours + ':' + minutes + ':' + seconds + ' ' + ampm;

        document.getElementById('clock').textContent = time;
    }

    setInterval(displayTime, 1000);
</script>
