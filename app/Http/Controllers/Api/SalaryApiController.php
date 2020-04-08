<?php

namespace App\Http\Controllers;

use App\Salary;
use App\Http\Requests\SalaryRequest as Request;
use App\Http\Controllers\Controller;

class SalaryApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Salary::chunk(10, function($salary){
            return $salary;
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
        $salary = new Salary([
        'emp_no'=> $request->get('emp_no'),
        'salary'=> $request->get('salary'),
        'from_date'=> $request->get('from_date'),
        'to_date'=> $request->get('to_date')
        ]);
        $salary->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Salary $salary)
    {
        return $salary;
    }

}
