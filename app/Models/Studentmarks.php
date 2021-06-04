<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studentmarks extends Model
{
    use HasFactory;
    protected $table = 'studentmarks';

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }    
}
