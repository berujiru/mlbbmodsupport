<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserManualAccess extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_manual_access';
    protected $primaryKey = 'user_manual_access_id';

    protected $fillable = [
        'user_manual_access_id',
        'user_type_id',
        'user_manual_id',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    ];

    public function usertype()
    {
        return $this->hasOne(UserType::class, 'user_type_id', 'user_type_id');
    }

    public function createdby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'updated_by');
    }

    public function usermanual()
    {
        return $this->hasOne(UserManual::class, 'user_manual_id', 'user_manual_id');
    }
}
