<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qascore extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'qascores';

    protected $fillable = [
        'moderator',
        'modid',
        'subject',
        'score',
        'weekending_num',
        'merged_num',
        'merged_pos',
        'score',
        'details',
    ];

    public function modprofile()
    {
        return $this->hasOne(Dbsc::class, 'modid', 'modid');
    }
}
