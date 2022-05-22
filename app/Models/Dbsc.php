<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dbsc extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dbsc';

    protected $fillable = [
        'id',
        'modid',
        'firstname',
        'middlename',
        'lastname',
        'contactno',
        'email',
        'fblink',
        'team',
        'designation',
        'birthday',
        'age',
        'sex',
        'location',
        'igname',
        'ignid',
        'igserver',
        'description',
];
}
