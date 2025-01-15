<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    use HasFactory;

   protected $fillable = [
       'passport', 'passport_id', 'name', 'dob', 'age', 'sex', 'relationship', 'address', 'state_of_origin', 'place_of_birth',
        'nationality', 'type_of_baptism', 'holy_ghost_baptism', 'father_name', 'father_address', 'father_mobile',
        'mother_name', 'mother_address', 'mother_mobile', 'spouse_name', 'spouse_address', 'spouse_mobile', 'church_name', 'church_location', 'pastor_name', 'pastor_mobile', 'commissioned', 'denomination', 'email', 'password', 'matric_no',
    ];

    protected $hidden = [
        'password',
    ];

    protected $table = "students";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->id = (string) Str::uuid();
        });
    }
}
