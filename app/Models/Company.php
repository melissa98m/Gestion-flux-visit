<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = ['company_name', 'company_address' , 'company_phone', 'company_email'];

    public function visitors()
    {
        return $this->hasMany(Visitor::class);
    }
}
