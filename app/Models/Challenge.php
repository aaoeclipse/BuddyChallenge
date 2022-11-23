<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = [
        'starting_date',
        'ending_date',
        'title',
        'description',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot(['points', 'accepted']);
    }

    public function routines()
    {
        return $this->hasMany(Routine::class, 'challenge_id');
    }
}
