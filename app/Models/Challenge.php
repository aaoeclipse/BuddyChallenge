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
        $this->belongsTo(User::class);
    }

    public function users()
    {
        // $this->belongsToMany('App/Models/User')->withPivot('foo', 'bar');
    }
}
