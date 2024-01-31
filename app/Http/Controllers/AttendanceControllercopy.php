<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Repositories\interfaces\AttendanceRepositoryInterface;


class AttendanceController extends Controller
{
    private $attendanceRepository;

    public function __construct(AttendanceRepositoryInterface $attendanceRepository){

        $this->attendanceRepository=$attendanceRepository;
    }
    // public function getAtt(){
    //     $this->getAttendances();
    // }
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
        $this->getAttendances();

        $currentDay=date('Y-m-d');
        
        $attendances =$this->attendanceRepository->attendances();
        

       $userId=[];
     
       foreach($attendances as $attendance){

         $userId[]=$attendance->id;

        }
        $date=Carbon::today();

        $morning=$this->checkIn($date);

        $evening=$this->checkOut($date);

        $timeLate=$this->time_in_late($date);

        $break_time_evening=Carbon::parse()->format('Y-m-d 12:00:00');

        $time_evening=Carbon::parse()->format('Y-m-d 14:00:00');
        
        // $timeScan1=[];
        // $timeScan2=[];
        
        $uniqueUserId=array_unique($userId);
        
        $time_in=[];

        $time_out=[];

        $total_hours=[];

        $last_time_in='';

        $last_time_out='';
        
        foreach($uniqueUserId as $id){

            $result=Attendance::where('userId','=',$id)->orderByDesc('id')->where(DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d')"),'=',$currentDay)->get();
            
            foreach($result as $r){
            
                if($morning[0]<=$r->timeScan || $r->timeScan<$morning[1]){
                    
                    // echo 
                        $time_in[$id]=$r->timeScan;
                    
                        $last_time_in=$r->timeScan;

                }else if($evening[0]<=$r->timeScan || $r->timeScan<$evening[1]){

                    // echo
                     $time_out[$id]=$r->timeScan;

                    $last_time_out=$r->timeScan;
                }

                if(!empty($last_time_in) && !empty($last_time_out)){
                   
                    $last_timeIn=strtotime($break_time_evening)-strtotime($last_time_in);
                   
                    $last_timeOut=strtotime($last_time_out)-strtotime($time_evening);
                   
                    $total_hour=$last_timeOut+$last_timeIn;
                   
                    $total_hours[$id]=gmdate('H:i:s',$total_hour);

                }
            
            }
        }    
        // die();
        return view('admin.attendance.attendance',compact('attendances','time_in','time_out','total_hours'));
    }

    public function test(){
        echo 'hello';
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
