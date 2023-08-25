<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = ['vistor_firstname' , 'vistor_lastname' , 'vistor_email' , 'vistor_address' , 'vistor_phone'];

    public function company()
    {
        return $this->BelongsTo(Company::class, 'company_id');
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
}
