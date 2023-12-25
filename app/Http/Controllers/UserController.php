<?php

namespace App\Http\Controllers;

use App\Enum\Active;
use App\Models\Role;
use App\Models\User;
use App\Enum\RoleUnit;
use App\Models\Office;
use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        $departments = Department::all();
        $offices = Office::all();
        return view('admin.user.create', compact('roles', 'departments', 'offices'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'firstNameKh' => ['bail', 'required', 'max:100'],
                'lastNameKh' => ['bail', 'required', 'max:100'],
                'email' => ['bail', 'required', 'email', Rule::unique('users', 'email')],
                'password' => ['bail', 'required',],
                'phoneNumber' => ['bail', 'required', Rule::unique('users', 'phoneNumber')],
                'idCard' => ['bail', 'required', Rule::unique('users', 'idCard')],
                'dateOfBirth' => ['bail', 'required', 'date', 'before:' . now()->subYears(18)->addDays(1)->format('Y-m-d')],
                'nationality' => ['bail', 'required'],
                'pobAddress' => ['bail', 'required', 'max:255'],
                'currentAddress' => ['bail', 'required', 'max:255'],
                'img' => 'required',
            ],
            [
                'firstNameKh.required' => '',
                'email.unique' => 'អ៊ីម៉ែលមានរួចហើយ',
                'phoneNumber.unique' => 'លេខទូរស័ព្ទមានរួចហើយ',
                'idCard.unique' => 'អត្តលេខមានរួចហើយ',
                'pobAddress.required' => 'សូមបញ្ចូលទីកន្លែងកំណើត',
                'currentAddress.required' => 'សូមបញ្ចូលទីកន្លែងបច្ចុប្បន្ន',
                // 'dateOfBirth.before' => 'អយុរបស់អ្នកមិនទាន់គ្រប់​ ១៨ ទេ',
            ]
        );


        if ($request->hasfile('img')) {
            $file = $request->file('img');
            $extenstion = $file->getClientOriginalExtension();
            $filename = Str::random(30) . '.' . strval($extenstion);
            $file->move('images/', $filename);
        } else {
            $filename = '';
        }

        // $studentImg = Str::random(20) . '.' . $request->file('photo')->getClientOriginalExtension();
        // Storage::disk('public')->put($studentImg, file_get_contents($request->file('img')));

        $user = new User();
        $user->roleId = $request->input('roleId');
        // if ($user->roleId != RoleUnit::HEAD_OF_UNIT)
        $user->departmentId = $request->input('departmentId');
        $user->officeId = $request->input('officeId');
        $user->firstNameKh = $request->input('firstNameKh');
        $user->lastNameKh = $request->input('lastNameKh');
        $user->gender = $request->input('gender');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->phoneNumber = $request->input('phoneNumber');
        $user->idCard = $request->input('idCard');
        $user->dateOfBirth = $request->input('dateOfBirth');
        $user->status = $request->input('status');
        $user->nationality = $request->input('nationality');
        $user->pobAddress = $request->input('pobAddress');
        $user->currentAddress = $request->input('currentAddress');
        $user->image = $filename;
        $user->active = Active::ACTIVE;
        $user->save();
        return redirect('/users');
    }

    public function show(string $id)
    {
        $user = User::findOrFail($id);
        // return $user->role->roleNameKh;
        return view('admin.user.show', compact('user'));
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        if ($user->image) {
            unlink('images/' . $user->image);
        }

        $user->delete();

        return redirect('/users');
    }
}
