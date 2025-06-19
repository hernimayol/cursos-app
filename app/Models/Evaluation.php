<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    use HasFactory;

    protected $fillable =[
        'enrollment_id',
        'title',
        'grade',
        'date',
    ];
    
    public function enrollment(){
        return $this->belongsTo(\App\Models\Enrollment::class);
    }
}
