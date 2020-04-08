<?php

namespace App\Http\Controllers;

use App\Department;
use App\Http\Requests\DepartmentRequest as Request;

class DepartmentController extends Controller
{
    public function index()
    {
        return Department::chunk(10, function($department) {
        return $department;
    });
    }

    public function store(Request $request)
    {
        $department = new Department([
        'dept_no'=> $request->get('dept_no'),
        'dept_name'=> $request->get('dept_name')
        ]);
        $department->save();
    }

    public function show(Department $department)
    {
        return $department;
    }


    public function update(Request $request, Department $department)
    {
        $departments = Department::find($department)->first();
        $departments->dept_name = $request->get('dept_name');
        $departments->save();
    }
}