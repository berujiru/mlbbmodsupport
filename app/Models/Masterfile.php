<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterfile extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'masterfile';
    protected $primaryKey = 'Merged';

    public function modprofile()
    {
        return $this->hasOne(Dbsc::class, 'modid', 'MOD_ID');
    }
}
