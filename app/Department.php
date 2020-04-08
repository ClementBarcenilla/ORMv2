<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
      protected $fillable = [
          'dept_no',
          'dept_name',
          ];
          
        public $timestamps = false;
        
        public $incrementing = false;
    
        protected $primaryKey = "dept_no";
        
        protected $keyType = "string";
        
        protected $table = "departments";
        
        public function empD()
    {
  		  return $this->belongsToMany('App\Employee', 'dept_emp', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date'); 

    }       
    
        public function managerD()
    {
  		  return $this->belongsToMany('App\Employee', 'dept_manager', 'dept_no', 'emp_no')->withPivot('from_date', 'to_date'); 

    }
}
