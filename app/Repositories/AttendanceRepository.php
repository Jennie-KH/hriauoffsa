<?php
namespace App\Repositories;
use App\Repositories\interfaces\AttendanceRepositoryInterface;
use App\Models\Attendance;
// use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\DB;
class AttendanceRepository implements AttendanceRepositoryInterface{
    
    public function attendances(){

        $currentDay=date('Y-m-d');

        return DB::table('attendances')->select('users.id',
           
        'users.image AS img',
 
        'users.email AS email',
 
        'roles.roleNameKh as role',
 
        'users.idCard AS card_id',
 
        'users.active AS active',
    
        DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d') as time_scan"),
     
        DB::raw('CONCAT(users.lastNameKh," ",users.firstNameKh) AS user_name'))->join('users','users.id','=','attendances.userId')
 
        ->join('roles','roles.id','=','users.roleId')
        
        ->where(DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d')"),'=',$currentDay)
 
        ->groupBy(DB::raw("DATE_FORMAT(attendances.timeScan, '%Y-%m-%d')"),'users.id')
        
        ->orderByDesc('id')
        
        ->get();
        
    }

    public function getAllUsers(){

        $query = DB::table('users')->select();
        
        if ($request->input('search')) {
        
            $query->where('idCard', $request->input('search'));    
        
        }
    
        $users = $query->get();

        return $users;
    }
}