<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{

    public function getAllUsers(Request $request)
    {
        $this->getAttendances();
        $query = DB::table('users')->select();
        if ($request->input('search')) {
            $query->where('idCard', $request->input('search'));
        }
        $users = $query->get();
        return view('hrauoffsa.index', compact('users'));
    }

    public function showUser(Request $request, string $userId)
    {
        // $date = Carbon::now();
        // $d = Carbon::parse($date)->format('Y-m-d 06:30:00');
        // // $gdate = $this->getDatesByPeriodName('sat_sun_last_week', $date);
        // dd($d);

        $user = User::all()->where('id', $userId)->first();

        $morningStart = Carbon::today()->format('Y-m-d 06:30:00');
        $morningEnd = Carbon::today()->format('Y-m-d 09:00:00');

        $eveningStart = Carbon::today()->format('Y-m-d 16:00:00');
        $eveningEnd = Carbon::today()->format('Y-m-d 17:30:00');

        $attendanceFirst = DB::table('attendances')->select('id', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('timeScan', [$morningStart, $morningEnd])->orderBy('id', 'asc')->first();

        $attendanceLast = DB::table('attendances')->select('id', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('timeScan', [$eveningStart, $eveningEnd])->orderBy('id', 'desc')->first();

        if ($attendanceFirst == null) {
            $date1 = Carbon::now();
        } else {
            $date1 = Carbon::parse($attendanceFirst->timeScan);
        }
        if ($attendanceLast == null) {
            $date2 = Carbon::now();
        } else {
            $date2 = Carbon::parse($attendanceLast->timeScan);
        }

        $difference = $date1->diff($date2);

        $d = Carbon::now()->format('D');
        $m = Carbon::now()->format('M');
        $y = Carbon::now()->format("Y");
        $day = $this->getDayKhmer($d);
        $month = $this->getMonthKhmer($m);
        $today = "ថ្ងៃ " . $day . ' ខែ ' . $month . ' ឆ្នាំ ' . $y;
        // dd($d);


        return view('hrauoffsa.show', compact(
            'user',
            'today',
            'attendanceFirst',
            'attendanceLast',
            'difference',

        ));
    }
}
