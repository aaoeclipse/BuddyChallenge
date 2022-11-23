<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'num_set',
        'repetitions',
        'type',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
