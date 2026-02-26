<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ResultItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_result_id',
        'course_name',
        'course_code',          // NEW
        'score',
        'grade',
        'remark',
        'position_in_course',   // NEW
    ];

    // UUID Settings
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }
}