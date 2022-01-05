<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'category',
        "summary",
        "description",
        "author",
        "image",
    ];
    public function user(){
        return  $this->hasOne(User::class,"id","author");
    }
}
