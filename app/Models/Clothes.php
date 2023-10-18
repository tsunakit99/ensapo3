<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clothes extends Model
{
  use HasFactory;
  protected $fillable = ['name', 'color_id', 'genre_id', 'image'];

  public static function getAllOrderByUpdated_at()
  {
    return self::orderBy('updated_at', 'desc')->get();
  }

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
