<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentRequest as Request;
use App\Department;

class DepartmentApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Department::chunk(10, function($department){
            return $department;
          });
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return $department;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Department $department)
    {
            $department = Department::find($department)->first();
            $department->dept_name = $request->get('dept_name');

              
        $department->save();
        return $department;
    }
}
