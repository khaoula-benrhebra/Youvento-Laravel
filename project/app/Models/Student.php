<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // protected $table = 'students';
    protected $fillable = ['member_id', 'student_nbr'];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
