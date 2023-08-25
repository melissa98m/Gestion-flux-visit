<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = ['visit_start' ,'visit_end','visit_purpose' ,'visit_comment' ,'visitor_id' , 'status_id'];


    public function visitor()
    {
        return $this->BelongsTo(Visitor::class,'visitor_id');
    }
    public function status()
    {
        return $this->BelongsTo(Status::class,'status_id');
    }
}
