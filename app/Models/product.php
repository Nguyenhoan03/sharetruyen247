<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $timestamps = FALSE;

    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $guarded = [];
    protected $fillable  = [
      'title',
      'slug',
      'image',
      'tienhiep',
      'ngontinh',
      'quantruong',
      'khoanguyen',
      'huyenhuyen',
      'dinang',
      'kiemhiep',
      'dammy',
      'vongdu',
      'kinhdi',
      'dothi',
      'lichsu',
      'truyenma',
      'truyenngan',
      'tieuthuyet',
      'truyenteen',
      'quansu',
      'xuyenkhong',
      'trinhtham',
      'users_id',
    ];
}
