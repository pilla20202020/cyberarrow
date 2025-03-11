<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        // Add any additional admin fields here.
    ];

    // Optional: Relationships to project controls (if needed)
    public function controlsResponsible()
    {
        return $this->hasMany(ProjectControl::class, 'responsible_id');
    }

    public function controlsApprover()
    {
        return $this->hasMany(ProjectControl::class, 'approver_id');
    }
}
