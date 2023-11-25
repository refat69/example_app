<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable=[
        'category_name',
        'user_id',
    ];
    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
}

