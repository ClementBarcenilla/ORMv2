<?php

namespace App\Http\Controllers\Api;

use App\Employee;
use App\Http\Requests\EmployeeRequest as Request;
use App\Http\Controllers\Controller;


class EmployeeApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Employee::chunk(10, function($employee){
        return $employee;
          });
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    
        $employee = new Employee([
        'emp_no'=> $request->get('emp_no'),
        'first_name'=> $request->get('first_name'),
        'last_name'=> $request->get('last_name'),
        'birth_date'=> $request->get('birth_date'),
        'hire_date'=> $request->get('hire_date'),
        'gender'=> $request->get('gender')
        ]);
        $employee->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return $employee;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
            $employee = Employee::find($employee)->first();
            $employee->emp_no = $request->get('emp_no');
            $employee->first_name = $request->get('first_name');
            $employee->last_name = $request->get('last_name');
            $employee->birth_date = $request->get('birth_date');
            $employee->hire_date = $request->get('hire_date');
            $employee->gender = $request->get('gender');  
              
        $employee->save();
        return $employee;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $e = $employee;
        $employee->delete();
        return $e->toJson();
    }
}
