<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    // put all the required fields here
    protected $fillable = [ "title","budget","user_id","category" ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
