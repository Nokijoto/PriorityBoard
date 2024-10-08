<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'description',
        'status',
        'importance',
        'urgency',
        'created_at',
        'updated_at',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
