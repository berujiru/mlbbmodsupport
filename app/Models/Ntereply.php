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

    protected $fillable = [
        'id',
        'ntecode',
        'content',
        'created_at',
        'updated_at',
    ];

}
