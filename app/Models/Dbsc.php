<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbsc extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dbsc';

    protected $fillable = [
        'id',
        'modid',
        'firstname',
        'middlename',
        'lastname',
        'contactno',
        'email',
        'fblink',
        'team',
        'team_id',
        'designation',
        'birthday',
        'age',
        'sex',
        'location',
        'igname',
        'ignid',
        'igserver',
        'description',
        'assigned_team_by',
        'date_team_assigned',
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'team_id', 'team_id');
    }

    public function deputyteam()
    {
        return $this->hasOne(DeputyTeam::class, 'team_id', 'team_id');
    }
}
