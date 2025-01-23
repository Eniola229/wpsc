<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Sermon extends Model
{
    use HasFactory;

   protected $fillable = [
      "audio_url",
      "audio_id",
      "title",
    ];

    protected $table = "sermons";
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
