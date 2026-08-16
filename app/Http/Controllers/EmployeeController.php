<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::paginate(5);

        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'string | max:255',
            'email' => 'email',
            'phone' => 'string | max:20',
            'dept' => 'string',
            'salary' => 'integer',
            'image'      => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ]);
        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }
        // dd($validated);
        Employee::create($validated);

        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $emp = Employee::findOrFail($id);
        return view('employees.edit', compact('emp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
         $validated = $request->validate([
            'name' => 'string | max:255',
            'email' => 'email',
            'phone' => 'string | max:20',
            'dept' => 'string',
            'salary' => 'integer',
            'image'      => 'nullable|image|mimes:jpeg,png,webp|max:2048',
        ]);
        if($request->hasFile('image')){
            $validated['image'] = $request->file('image')->store('employees', 'public');
        }
        $emp = Employee::findOrFail($id);

        $emp->update($validated);
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $emp = Employee::findOrFail($id);
        $emp->delete();
        return redirect()->route('employees.index');
    }
}
