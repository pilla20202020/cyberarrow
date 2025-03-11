<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'primary_id',
        'id_seperator',
        'sub_id',
        'applicable',
        'name',
        'description',
        'status',
        'deadline',
        'frequency',
        'responsible_id',
        'approver_id',
    ];

    // Relationship to Project
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Relationship to the responsible Admin
    public function responsibleUser()
    {
        return $this->belongsTo(Admin::class, 'responsible_id');
    }

    // Relationship to the approver Admin
    public function approverUser()
    {
        return $this->belongsTo(Admin::class, 'approver_id');
    }

    // Accessor to build controlId from primary_id, id_seperator and sub_id
    public function getControlIdAttribute()
    {
        if (!is_null($this->id_seperator)) {
            $seperator = ($this->id_seperator == '$nbsp;') ? '' : $this->id_seperator;
            return $this->primary_id . $seperator . $this->sub_id;
        }
        return $this->primary_id . $this->sub_id;
    }
}
