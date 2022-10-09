<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nteseen extends Model
{
    use HasFactory;

    protected $table = 'nte_seen';

    protected $fillable = [
        'nte_seen_id',
        'id_nte',
        'mod_id',
        'nte_code',
        'is_seen',
        'date_seen',
        'seen_by',
        'created_at',
        'updated_at',
    ];
}
