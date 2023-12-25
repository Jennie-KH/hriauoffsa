<?php

namespace App\Http\Controllers;

use App\Enum\Active;
use App\Models\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    public function index()
    {
        $offices = Office::all();
        return view('admin.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.office.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'officeNameKh' => 'bail|required|max:100',
            'description' => 'max:255'
        ], [
            'officeNameKh.required' => 'សូមបញ្ចូលនូវឈ្មោះការិយាល័យ',
            'officeNameKh.max' => 'អក្សរអនុញ្ញាតត្រឹម​ ១០០​ តួរ',
            'description.max' => 'អក្សរអនុញ្ញាតត្រឹម​ ២៥៥​ តួរ'
        ]);
        $office = new Office();
        $office->officeNameKh = $request->input('officeNameKh');
        $office->description = $request->input('description');
        $office->active = Active::ACTIVE;
        $office->save();

        return redirect('/offices');
    }

    /**
     * Display the specified resource.
     */
    public function show(Office $office)
    {
        // $office = Office::findOrFail($officeId);
        return view('admin.office.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $officeId)
    {
        $office = Office::findOrFail($officeId);
        return view('admin.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $officeId)
    {
        $request->validate([
            'officeNameKh' => 'bail|required|max:100',
            'description' => 'max:255'
        ], [
            'officeNameKh.required' => 'សូមបញ្ចូលនូវឈ្មោះនាយកដ្ឋាន',
            'departmentNameKh.max' => 'អក្សរអនុញ្ញាតត្រឹម​ ១០០​ តួរ',
            'description.max' => 'អក្សរអនុញ្ញាតត្រឹម​ ២៥៥​ តួរ'
        ]);
        $office = Office::findOrFail($officeId);
        $office->officeNameKh = $request->input('officeNameKh');
        $office->description = $request->input('description');
        $office->active = $request->input('active');
        $office->save();

        return redirect('/offices');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Office $office)
    {
        //
    }
}
