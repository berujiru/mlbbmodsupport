<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeputyTeam extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deputy_team';
    protected $primaryKey = 'deputy_team_id';

    protected $fillable = [
        'deputy_team_id',
        'profile_id',
        'team_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'team_id', 'team_id');
    }

    public function profile()
    {
        return $this->hasOne(Dbsc::class, 'id', 'profile_id');
    }

    public function createdby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'updated_by');
    }
}
