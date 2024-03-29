<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ntereply extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ntereply';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'ntecode',
        'content',
        'created_at',
        'updated_at',
    ];

    public function nte()
    {
        return $this->hasOne(Nte::class, 'UniqueID', 'ntecode');
    }
}
