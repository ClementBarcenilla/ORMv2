<?php

namespace App\Http\Controllers;

use App\Title;
use App\Employee;
use App\Http\Requests\TitleRequest as Request;

class TitleController extends Controller
{

    public function index()
    {
        return Title::chunk(10, function($title) {
		      return $title;
	      });
    }

    public function store(Request $request)
    {
        $emp_check = $request->get('emp_no');
        $emp_checked = Employee::find($emp_check)->emp_no;
    
        if ($emp_checked != $emp_check) {
          return false;
        }
        else {
          $multiple_title = Title::where('emp_no', '=', $emp_check)->where('to_date', '=', '9999-01-01')->first();
          if ($multiple_title == null) {
            $title = new Title([
              'emp_no'=> $request->get('emp_no'),
              'title'=> $request->get('title'),
              'from_date'=> NOW(),
              'to_date'=> '9999-01-01'
            ]);
            $title->save();
            
            return $title;
          }
          else {
            $multiple_title->to_date = NOW();
            $multiple_title->save();
            
            $title = new Title([
              'emp_no'=> $request->get('emp_no'),
              'title'=> $request->get('title'),
              'from_date'=> NOW(),
              'to_date'=> '9999-01-01'
            ]);
            $title->save();
            
            return $title;
          }
        }
    }

    public function show(Title $title)
    {
        $titles = Title::where('emp_no', '=', $title->emp_no)->get();
        return $titles;
    }
}
