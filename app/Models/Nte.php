<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nte extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nte';
    protected $primaryKey = 'id';

    public function profile()
    {
        return $this->hasOne(Dbsc::class, 'modid', 'MODID');
    }

    public function netreply()
    {
        return $this->hasOne(Ntereply::class, 'id', 'id');
    }

    public function nteseen()
    {
        return $this->hasOne(Nteseen::class, 'id_nte', 'id');
    }

}
