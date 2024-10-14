<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_product extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    protected $table = 'detail_product';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable  = [
      'title',
      'descripts',
      'tacgia',
      'theloai',
      'nguon',
      'trangthai',
      'capnhatmoi',
      'viewers',
    ];
}
