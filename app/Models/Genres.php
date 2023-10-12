<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    use HasFactory;
    protected $fillable = ['name']; // ジャンルの名前を保存する場合

    public function clothes()
    {
        return $this->hasMany(Clothes::class);
    }
}