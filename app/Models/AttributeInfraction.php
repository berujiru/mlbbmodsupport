<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeInfraction extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'attribute_infraction';
    protected $primaryKey = 'attribute_infraction_id';

    public function infraction()
    {
        return $this->hasOne(Infractions::class, 'id', 'infraction_id');
    }

    public function attribute()
    {
        return $this->hasOne(Attribute::class, 'attribute_id', 'attribute_id');
    }

    public function createdby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne(Dbsc::class, 'id', 'updated_by');
    }
}
