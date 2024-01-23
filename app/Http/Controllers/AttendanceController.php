<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
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

    public function attendances(Request $request)
    {
        // $this->getAttendances();

        // $attendances = Attendance::all();
      
        $currentDay=date('Y-m-d');
        
        $attendances =Attendance::join('users','users.id','=','attendances.userId')

        ->join('roles','roles.id','=','users.roleId')
        
        ->where(DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d')"),'=',$currentDay)

        ->groupBy(DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d')"),'users.id')
        
        ->get(
            ['users.id',
            
            'users.image AS img',

            'users.email AS email',

            'roles.roleNameKh as role',

            'users.idCard AS card_id',

            'users.active AS active',
        
            DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d') as time_scan"),

            DB::raw('CONCAT(users.lastNameKh," ",users.firstNameKh) AS user_name')
        ]);
        // echo "<pre>";
        // var_dump($attendances);
        // die();

        return view('admin.attendance.attendance',compact('attendances'));
    }

    public function showAttendanceByUserId(Request $request, string $userId)
    {
        $date = Carbon::today();
        $user = User::all()->where('id', $userId)->first();

        //today
        $morning = $this->checkIn($date);
        $evening = $this->checkOut($date);

        $attendanceFirst = DB::table('attendances')->select('id', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('timeScan', [$morning[0], $morning[1]])->orderBy('id', 'asc')->first();

        $attendanceLast = DB::table('attendances')->select('id', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('timeScan', [$evening[0], $evening[1]])->orderBy('id', 'desc')->first();

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


        //yesterday
        $clonedate = clone $date;
        $dateY = $this->getDatesByPeriodName('yesterday', $clonedate);
        $morningY = $this->checkIn($dateY[0]);
        $eveningY = $this->checkOut($dateY[0]);

        $attendanceFirstY = DB::table('attendances')->select('id', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('timeScan', [$morningY[0], $morningY[1]])->orderBy('id', 'asc')->first();

        $attendanceLastY = DB::table('attendances')->select('id', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('timeScan', [$eveningY[0], $eveningY[1]])->orderBy('id', 'desc')->first();

        if ($attendanceFirstY == null) {
            $firstScanNull = Carbon::parse($dateY[0])->format('Y-m-d 13:00:00');
            $date1Y = Carbon::parse($firstScanNull);
        } else {
            $date1Y = Carbon::parse($attendanceFirstY->timeScan);
        }
        if ($attendanceLastY == null) {
            $date2Y = Carbon::now();
        } else {
            $date2Y = Carbon::parse($attendanceLastY->timeScan);
        }

        $differenceY = $date1Y->diff($date2Y);

        $dayY = $this->getDayKhmer(Carbon::parse($dateY[0])->format('D'));
        $monthY = $this->getMonthKhmer(Carbon::parse($dateY[0])->format('M'));

        $yesterday = "ថ្ងៃ " . $dayY . ' ខែ ' . $monthY . ' ឆ្នាំ ' . $y;

        //last week

        $lastWeekDate = clone $date;
        $lastWeek = $this->getDatesByPeriodName('last_week', $lastWeekDate);
        $attendances = DB::table('attendances')->join('users', 'users.idCard', '=', 'userId')->select('attendances.id', 'users.firstNameKh', 'users.lastNameKh', 'userId', 'timeScan')
            ->where('userId', $user->idCard)
            ->whereBetween('attendances.timeScan', [$lastWeek[0], $lastWeek[1]])->get();

        $week = [];
        foreach ($attendances as $key => $attendance) {

            if($attendance->timeScan){
                
            }

        }

        // dd($attendances);




        return view('hrauoffsa.show', compact(
            'user',
            'today',
            'attendanceFirst',
            'attendanceLast',
            'difference',
            'yesterday',
            'attendanceFirstY',
            'attendanceLastY',
            'differenceY',
            'attendances'

        ));
    }
}
