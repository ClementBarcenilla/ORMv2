<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Title extends Model
{
    
      protected $fillable = [
          'emp_no',
          'title',
          'from_date',
          'to_date'
          ];
          
        public $timestamps = false;
        
        protected $primaryKey = "emp_no";
        protected $table = "titles";
        
        public function empTitle(){
          return $this->belongsTo('App\Employee', 'emp_no', "emp_no"); 
    }
}
