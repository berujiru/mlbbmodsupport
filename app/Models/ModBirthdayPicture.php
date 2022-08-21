<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModBirthdayPicture extends Model
{
    use HasFactory;

    protected $table = 'mod_birthday_pic';

    protected $fillable = [
        'id',
        'mod_id',
        'pic_type',
        'pic_name',
        'pic_size',
        'pic_filename',
        'uploader_id',
        'date_attached',
        're_attached_by',
        'date_reattached',
        'created_at',
        'updated_at',
    ];

    public function profile()
    {
        return $this->hasOne(Dbsc::class, 'modid', 'mod_id');
    }

    public function attachedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'uploader_id');
    }

    public function reattachedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 're_attached_by');
    }
}
