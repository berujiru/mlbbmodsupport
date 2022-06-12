<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infractions extends Model
{
    use HasFactory;
    
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'infractions';

    protected $fillable = [
        'id',
        'code',
        'detail',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at',
    ];

    public function createdby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'updated_by');
    }
}
