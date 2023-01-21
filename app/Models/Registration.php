<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registration extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'cource_id',
        'score',
        'attempts',
        'approval_date',
    ];

    protected $attributes = [
        'attempts' => 0,
    ];

    protected $casts = [
        'score' => 'integer',
        'attempts' => 'integer'
    ];

    public function stutent()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }

    public function cource()
    {
        return $this->belongsTo(Cource::class, 'cource_id');
    }
}
