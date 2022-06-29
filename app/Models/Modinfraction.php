<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modinfraction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'mod_infraction';

    protected $fillable = [
        'mod_id',
        'infraction_id',
        'infraction_code',
        'date',
    ];

    public function profile()
    {
        return $this->hasOne(Dbsc::class, 'modid', 'mod_id');
    }
}
