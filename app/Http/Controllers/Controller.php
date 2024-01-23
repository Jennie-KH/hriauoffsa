<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\Attendance;
use Rats\Zkteco\Lib\ZKTeco;
use Illuminate\Support\Carbon;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getAttendances()
    {
        $zk = new ZKTeco('172.16.15.184', 4370);
        $zk->connect();
        $zk->disableDevice();
        $attendances = $zk->getAttendance();

        $attendanceModel = Attendance::all()->last();

        $attendanceToday = [];
        foreach ($attendances as $attendance) {

            if ($attendance['timestamp'] > $attendanceModel->timeScan) {
                $attendanceToday[] = [
                    'userId' => $attendance['id'],
                    'timeScan' => $attendance['timestamp']

                ];
            }
        }

        Attendance::insert($attendanceToday);
    }

    public function getDayKhmer($day)
    {
        if ($day == 'Mon') {
            $day = 'ច័ន្ទ';
        } elseif ($day == 'Tue') {
            $day = 'អង្គារ';
        } elseif ($day == 'Wed') {
            $day = 'ពុធ';
        } elseif ($day == 'Thu') {
            $day = 'ព្រហស្បតិ៍';
        } elseif ($day == 'Fri') {
            $day = 'សុក្រ';
        } elseif ($day == 'Sat') {
            $day = 'សៅរ៍';
        } elseif ($day == 'Sun') {
            $day = 'អាទិត្យ';
        }

        return $day;
    }

    public function getMonthKhmer($month)
    {
        if ($month == 'Jan') {
            $month = 'មករា';
        } elseif ($month == 'Feb') {
            $month = 'កុម្ភៈ';
        } elseif ($month == 'Mar') {
            $month = 'មីនា';
        } elseif ($month == 'Apr') {
            $month = 'មេសា';
        } elseif ($month == 'May') {
            $month = 'ឧសភា';
        } elseif ($month == 'Jun') {
            $month = 'មិថុនា';
        } elseif ($month == 'Jul') {
            $month = 'កក្កដា';
        } elseif ($month == 'Aug') {
            $month = 'សីហា';
        } elseif ($month == 'Set') {
            $month = 'កញ្ញា';
        } elseif ($month == 'Oct') {
            $month = 'តុលា';
        } elseif ($month == 'Nov') {
            $month = 'វិច្ឆិការ';
        } else {
            $month = 'ធ្នូរ';
        }

        return $month;
    }

    public function getDatesByPeriodName($period, $currentDate)
    {
        $dates = ["", ""];

        if ($period == 'today') {
            $dates = [$currentDate->format('Y-m-d'), $currentDate->format('Y-m-d')];
        } elseif ($period == 'sat_sun_last_week') {
            $currentDateTime = new DateTime();
            $currentDateTime->modify('last Sunday');
            $saturday = clone $currentDateTime;
            $saturday->modify('last Saturday');
            $sunday = clone $currentDateTime;
            $dates = [$saturday->format('Y-m-d'), $sunday->format('Y-m-d')];
        } elseif ($period == 'yesterday') {

            $yesterday = $currentDate->sub(new DateInterval('P1D'));
            $currentDateTime = new DateTime();

            $dates = [$yesterday->format('Y-m-d'), $currentDateTime->format('Y-m-d')];
        } elseif ($period == 'this_week') {

            $startDate = date('Y-m-d', strtotime('Monday this week'));
            $endDate = date('Y-m-d', strtotime('Sunday this week'));
            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_week') {

            $startDate = date('Y-m-d', strtotime('Monday last week'));
            $endDate = date('Y-m-d', strtotime('Sunday last week'));
            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_month') {

            $year = date('Y');
            $month = $currentDate->subMonths(1)->format('M');

            $endOfMonth = new DateTime("last day of $month $year");
            $endDate = $endOfMonth->format('Y-m-d');

            $startOfMonth = new DateTime("first day of $month $year");
            $startDate = $startOfMonth->format('Y-m-d');

            $dates = [$startDate, $endDate];
        } elseif ($period == 'this_month') {

            $year = date('Y');
            $month = $currentDate->format('M');

            $startOfMonth = new DateTime("first day of $month $year");
            $startDate = $startOfMonth->format('Y-m-d');

            $endOfMonth = new DateTime("last day of $month $year");
            $endDate = $endOfMonth->format('Y-m-d');

            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_30_days') {

            $endDate = $currentDate->format('Y-m-d');
            $startDate = $currentDate->subDays(30)->format('Y-m-d');
            $dates = [$startDate, $endDate];
        } elseif ($period == 'this_year') {

            $year = date('Y');
            $endOfYear = new DateTime("last day of December $year");
            $endDate = $endOfYear->format('Y-m-d');

            $startOfYear = new DateTime("first day of January $year");
            $startDate = $startOfYear->format('Y-m-d');

            $dates = [$startDate, $endDate];
        } elseif ($period == 'last_year') {

            $year = $currentDate->subYears(1)->format('Y');
            $endOfYear = new DateTime("last day of December $year");
            $endDate = $endOfYear->format('Y-m-d');

            $startOfYear = new DateTime("first day of January $year");
            $startDate = $startOfYear->format('Y-m-d');

            $dates = [$startDate, $endDate];
        }
        return $dates;
    }

    public function checkIn($date)
    {
        $checkIn = ['', ''];
        $morningStart = Carbon::parse($date)->format('Y-m-d 06:30:00');
        $morningEnd = Carbon::parse($date)->format('Y-m-d 09:00:00');
        $checkIn = [$morningStart, $morningEnd];
        return $checkIn;
    }
    public function checkOut($date)
    {
        $checkOut = ['', ''];
        $eveningStart = Carbon::parse($date)->format('Y-m-d 16:00:00');
        $eveningEnd = Carbon::parse($date)->format('Y-m-d 17:30:00');
        $checkOut = [$eveningStart, $eveningEnd];
        return $checkOut;
    }
}
