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
        'user_type_id',
    ];

    public function team()
    {
        return $this->hasOne(Team::class, 'team_id', 'team_id');
    }

    public function deputyteam()
    {
        return $this->hasOne(DeputyTeam::class, 'team_id', 'team_id');
    }

    public function usertype()
    {
        return $this->hasOne(UserType::class, 'user_type_id', 'user_type_id');
    }

    public function getFullname()
    {
        $mi = !empty($this->middlename) ? " ".substr($this->middlename,0,1).". " : " ";
        $fullname = $this->firstname.$mi.$this->lastname;

        return $fullname;
    }
}
