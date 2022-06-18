<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeputyTeamHistory extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'deputy_team_history';

    protected $fillable = [
        'deputy_team_history_id',
        'profile_id',
        'team_id',
        'created_by',
        'created_at',
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'team_id', 'team_id');
    }

    public function profile()
    {
        return $this->hasOne(Dbsc::class, 'id', 'profile_id');
    }
}
