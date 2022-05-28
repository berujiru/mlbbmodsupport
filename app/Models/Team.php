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

    protected $fillable = [
        'team_id',
        'team_name',
        'created_by',
        'created_at',
        'updated_at',
    ];
}
