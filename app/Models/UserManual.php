<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManual extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_manual';
    protected $primaryKey = 'user_manual_id';

    protected $fillable = [
        'user_manual_id',
        'manual_name',
        'manual_description',
        'file_type',
        'file_name',
        'file_size',
        'uploader_id',
        'updated_by',
        'date_attached',
        'reattached_by',
        'date_reattached',
        'created_at',
        'updated_at'
    ];

    public function uploadedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'uploader_id');
    }

    public function reattachedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'reattached_by');
    }
}
