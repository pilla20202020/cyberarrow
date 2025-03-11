<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Add other fields as necessary.
    ];

    public function controls()
    {
        return $this->hasMany(ProjectControl::class);
    }
}
