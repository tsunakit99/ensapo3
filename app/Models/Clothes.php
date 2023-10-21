<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id',
    'name',
    'color_id',
    'genre_id',
    'image'
  ];

  public function color()
  {
    return $this->belongsTo(Colors::class);
  }

  public function genre()
  {
    return $this->belongsTo(Genres::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
