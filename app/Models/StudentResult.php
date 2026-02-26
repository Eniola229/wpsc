<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class StudentResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'student_id',
        'session',
        'level',

        // Summary
        'assignment_score',
        'assignment_grade',
        'assignment_position',
        'test_score',
        'test_grade',
        'test_position',
        'total_score',
        'total_grade',
        'total_remark',
        'certificate_date',

        // Class info
        'class_size',
        'class_position',
        'overall_position',
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

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function items()
    {
        return $this->hasMany(ResultItem::class, 'student_result_id');
    }
}