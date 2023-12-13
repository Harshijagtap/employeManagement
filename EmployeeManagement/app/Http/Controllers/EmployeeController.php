<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeFormRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id','ASC')->paginate(10);
        $companies = Company::all();
        return view('employees.index',compact('companies','employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all();
        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeFormRequest $request)
    {
        $validatedData = $request->validated();
        $company = Company::findOrFail($validatedData['company_id']);
        $employee = $company->employees()->create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'company_id' => $validatedData['company_id'],
            'email' => $validatedData['email'],
            'phone' => $validatedData['phone'],
        ]);
        return redirect('admin/employees')->with('message', 'Employee added successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( Employee $employee){
        $companies = Company::all();
        $employee = Employee::findOrFail($employee->id);
        return view('employees.edit',compact('employee','companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeFormRequest $request, int $employee_id)
    {
        $validatedData = $request->validated();

        $employee = Employee::findOrFail($employee_id);

        if ($employee) {
            $employee->update([
                'company_id' => $validatedData['company_id'], 
                'first_name' => $validatedData['first_name'],
                'last_name' => $validatedData['last_name'],
                'email' => $validatedData['email'],
                'phone' => $validatedData['phone'],
            ]);

            return redirect('admin/employees')->with('message', 'Employee Updated Successfully');
        } else {
            return redirect('admin/employees')->with('message', 'No Employee ID found');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $employee_id){
        $employee = Employee::findOrFail($employee_id);
        
        $employee->delete();
        return redirect()->back()->with('message','Employee deleted Successfully');
    }
}
