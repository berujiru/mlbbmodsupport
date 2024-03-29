<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'team';
    protected $primaryKey = 'team_id';

    protected $fillable = [
        'team_id',
        'team_code',
        'team_name',
        'status_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function createdby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'updated_by');
    }

    public function deputy()
    {
        return $this->hasOne(DeputyTeam::class, 'team_id', 'team_id');
    }

    public function teamstatus()
    {
        return $this->hasOne(TeamStatus::class, 'team_status_id', 'status_id');
    }

    public function dbscteam()
    {
        return $this->hasMany(Dbsc::class, 'team_id', 'team_id');
    }
}
